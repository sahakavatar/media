<?php
/**
 * Created by PhpStorm.
 * User: Comp1
 * Date: 12/20/2016
 * Time: 2:24 PM
 */

namespace App\Modules\Media\Plugins\Drive\Http\Controllers;

use App\Core\CmsItemReader;
use App\Http\Controllers\Controller;
use App\Models\Templates\Units;
use App\Modules\Media\Plugins\Drive\Models\Folders;
use App\Modules\Settings\Models\Settings;
use Illuminate\Http\Request;

class MediaApiController extends Controller
{
    public function getFolderChilds(Request $request)
    {
        $data = $request->all();
        $validator = \Validator::make($data, [
            'folder_id' => 'required_without_all:slug|integer|exists:drive_folders,id',
            'slug' => 'required_without_all:folder_id|alpha_dash',
            'access_token' => 'required']);
        if ($validator->fails()) {
            return \Response::json(['error' => true, 'message' => $validator->messages()]);
        }
        if (isset($data['folder_id'])) {
            $folder = Folders::find($data['folder_id']);
        } elseif (isset($data['slug'])) {
            $folder = Folders::where('name', $data['slug'])->first();
        }

        if (!$folder) {
            return \Response::json(['error' => true, 'message' => [0 => 'undefined folder!!!']]);
        }
        return \Response::json(['error' => false, 'data' => $folder->getChilds($request->get('files')), 'settings' => $folder->settings]);
    }

    public function getCreateFolderChild(Request $request)
    {
        $data = $request->all();
        $validator = \Validator::make($data, [
            'folder_id' => 'required_without_all:slug|integer|exists:drive_folders,id',
            'slug' => 'required_without_all:folder_id|alpha_dash',
            'access_token' => 'required',
            'folder_name' => 'required|alpha_dash',
        ]);
        if ($validator->fails()) {
            return \Response::json(['error' => true, 'message' => $validator->messages()]);
        }
        if (isset($data['folder_id'])) {
            $folder = Folders::find($data['folder_id']);
        } elseif (isset($data['slug'])) {
            $folder = Folders::where('path', '/' . $data['slug'])->first();
        }
        if (!$folder) {
            return \Response::json(['error' => true, 'message' => [0 => 'undefined folder!!!']]);
        }
        return $folder->createChild($data);

    }

    public function getEditFolder(Request $request)
    {
        $data = $request->all();
        $validator = \Validator::make($data, [
            'folder_id' => 'required_without_all:slug|integer|exists:drive_folders,id',
            'access_token' => 'required',
            'folder_name' => 'required|alpha_num|not_in:drive,site-media',
        ]);
        if ($validator->fails()) {
            return \Response::json(['error' => true, 'message' => $validator->messages()]);
        }
        if (isset($data['folder_id'])) {
            $folder = Folders::find($data['folder_id']);
        } elseif (isset($data['slug'])) {
            $folder = Folders::where('path', '/' . $data['slug'])->first();
        }
        if (!$folder) {
            return \Response::json(['error' => true, 'message' => [0 => 'undefined folder!!!']]);
        }
        return \Response::json(['error' => false, 'data' => $folder->rename($data)]);

    }

    public function getFolderInfo(Request $request)
    {
        $data = $request->all();
        $validator = \Validator::make($data, [
            'folder_id' => 'required_without_all:slug|integer|exists:drive_folders,id',
            'access_token' => 'required',
        ]);
        if ($validator->fails()) {
            return \Response::json(['error' => true, 'message' => $validator->messages()]);
        }
        if (isset($data['folder_id'])) {
            $folder = Folders::find($data['folder_id']);
        }
        if (!$folder) {
            return \Response::json(['error' => true, 'message' => [0 => 'undefined folder!!!']]);
        }
        return \Response::json(['error' => false, 'data' => $folder->info()]);
    }

    public function getSortFolder(Request $request)
    {
        $data = $request->all();
        $validator = \Validator::make($data, [
            'folder_id' => 'required|integer|exists:drive_folders,id',
            'parent_id' => 'required|integer|exists:drive_folders,id|not_in:' . $data['folder_id'],
            'access_token' => 'required',
        ]);
        if ($validator->fails()) {
            return \Response::json(['error' => true, 'message' => $validator->messages()]);
        }
        return Folders::sort($data);
    }

    public function getRemoveFolder(Request $request)
    {
        $data = $request->all();
        $validator = \Validator::make($data, [
            'folder_id' => 'required|integer|exists:drive_folders,id',
            'trash' => 'required|boolean',
            'access_token' => 'required',
        ]);
        if ($validator->fails()) {
            return \Response::json(['error' => true, 'message' => $validator->messages()]);
        }

        return \Response::json(['error' => false, 'data' => Folders::removeFolder($data)]);
    }

    public function getMediaUploaders()
    {
        $ui_elemements = CmsItemReader::getAllGearsByType('units')->where('place', 'backend')->where('type', 'media')->run();
        return \Response::json(['error' => false, 'data' => $ui_elemements->toArray()]);
    }

    public function getUploaderSettings(Request $request)
    {
        $slug = $request->get('slug');
        $html = Units::find($slug)->renderSettings();
        return \Response::json(['error' => false, 'html' => $html]);
    }

    public function getFolderUploader(Request $request)
    {
        $folder_id = $request->get('folder_id');
        if ($folder_id == 'mediaplus') {
            $folder = Folders::where('name', $folder_id)->where('parent_id', 0)->first();
            $folder->uploader_slug = '5947ae0ba319b';
        } else {
            $folder = Folders::find($folder_id);

        }

        if ($folder) {
            $uploaderSettings = Settings::where('section', 'folder_settings')->pluck('val', 'settingkey');
            $settings = ($folder->settings->uploader_data) ? $folder->settings->uploader_data : $uploaderSettings->toArray();
            $uploader = ($folder->uploader_slug) ? $folder->uploader_slug : (isset($uploaderSettings['directory_default_uploader'])) ? $uploaderSettings['directory_default_uploader'] : null;
            if ($uploader) {
                $settings['uploader_url'] = url('/admin/media/drive/api-media/upload');
                $settings['folder_id'] = $folder->id;
                $html = Units::find($uploader)->render(compact('settings'));
                return \Response::json(['error' => false, 'html' => $html]);
            }
        }

        return \Response::json(['error' => true, 'message' => 'folder not found']);
    }

    public function getEditFolderSettings(Request $request)
    {
        $data = $request->except('_token');
        $folder = Folders::find($data['folder_id']);
        $folder->uploader_slug = $data['folder_settings']['uploader_slug'];
        $folder->settings->uploader_data = $data['uploader_data'];
        $folder->settings->save();
        $folder->save();
        return \Response::json(['error' => false]);

    }
}