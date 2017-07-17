<?php
/**
 * Created by PhpStorm.
 * User: Comp1
 * Date: 12/22/2016
 * Time: 3:46 PM
 */

namespace App\Modules\Media\Plugins\Drive\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Media\Plugins\Drive\Models\Folders;
use App\Modules\Media\Plugins\Drive\Models\Items;
use Illuminate\Http\Request;

class MediaItemsApiController extends Controller
{
    // ITEMS Functions
    public function getSortItems(Request $request)
    {
        $data = $request->all();
        $validator = \Validator::make($data, [
            'folder_id' => 'required|integer|exists:drive_folders,id',
            'item_id' => 'required',
        ]);
        if ($validator->fails()) {
            return \Response::json(['error' => true, 'message' => $validator->messages()]);
        }
        if (isset($data['item_id']) and is_array($data['item_id'])) {
            $vdata = $data['item_id'];
            foreach ($data['item_id'] as $k => $v) {

                $rule[$k] = 'required|integer|exists:drive_items,id|not_in:' . $data['folder_id'];
            }
        } else {
            $vdata = $data;
            $rule['item_id'] = 'required|integer|exists:drive_items,id|not_in:' . $data['folder_id'];
        }
        $validator = \Validator::make($vdata, $rule);
        if ($validator->fails()) {
            return \Response::json(['error' => true, 'message' => $validator->messages()]);
        }
        return \Response::json(['error' => false, 'data' => Items::sort($data)]);

    }

    public function getDeleteItems(Request $request)
    {
        $data = $request->all();
        $validator = \Validator::make($data, [
            'item_id' => 'required',
            'trash' => 'required|boolean',
        ]);
        if ($validator->fails()) {
            return \Response::json(['error' => true, 'message' => $validator->messages()]);
        }
        if (isset($data['item_id']) and is_array($data['item_id'])) {
            $vdata = $data['item_id'];
            foreach ($data['item_id'] as $k => $v) {

                $rule[$k] = 'required|integer|exists:drive_items,id';
            }
        } else {
            $vdata = $data;
            $rule['item_id'] = 'required|integer|exists:drive_items,id';
        }
        $validator = \Validator::make($vdata, $rule);
        if ($validator->fails()) {
            return \Response::json(['error' => true, 'message' => $validator->messages()]);
        }
        return \Response::json(['error' => false, 'data' => Items::removeItem($data)]);

    }

    public function uploadFile(Request $request)
    {

        $validator = \Validator::make($request->all(), [
            'folder_id' => 'required_without_all:slug|integer|exists:drive_folders,id',
            'item.*' => 'required',
        ]);
        if ($validator->fails()) {
            return \Response::json(['error' => true, 'message' => $validator->messages()]);
        }
        $folder = Folders::find($request->folder_id);
        if ($folder && \File::isDirectory($folder->path())) {
            foreach ($request->item as $item) {
                $realName = $request->item_name ? $request->item_name : $item->getClientOriginalName();
                $originalName = md5(uniqid()) . '.' . $item->getClientOriginalExtension();
                if ($item->move($folder->path(), $originalName)) {
                    $item = Items::create([
                        'original_name' => $originalName,
                        'real_name' => $realName,
                        'extension' => $item->getClientOriginalExtension(),
                        'size' => $item->getClientSize(),
                        'folder_id' => $folder->id
                    ]);
                }
            }
            return \Response::json(['error' => false, 'message' => 'File has been uploaded successfully.']);
        }
        if ($validator->fails()) {
            return \Response::json(['error' => true, 'message' => 'Could not upload file.']);
        }
    }

    public function replaceFile(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'item_id' => 'required|exists:drive_items,id',
            'item.*' => 'required',
        ]);
        if ($validator->fails()) {
            return \Response::json(['error' => true, 'message' => $validator->messages()]);
        }
        $oldItem = Items::find($request->item_id);
        if ($oldItem) {
            if (\File::delete($oldItem->folder->path() . '/' . $oldItem->real_name)) {
                foreach ($request->item as $item) {
                    $realName = $request->item_name ? $request->item_name : $item->getClientOriginalName();
                    if ($item->move($oldItem->folder->path(), $item->getClientOriginalName())) {
                        $oldItem->original_name = $item->getClientOriginalName();
                        $oldItem->real_name = $realName;
                        $oldItem->extension = $item->getClientOriginalExtension();
                        $oldItem->size = $item->getClientSize();
                        $oldItem->save();
                    }

                }
                return \Response::json(['error' => false, 'message' => 'File has been replaced successfully.']);
            }

            return \Response::json(['error' => true, 'message' => 'Could not replace file.']);
        }
        if ($validator->fails()) {
            return \Response::json(['error' => true, 'message' => 'Could not replace file.']);
        }
    }

    public function renameFile(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'item_id' => 'required|exists:drive_items,id',
            'item_name' => 'required'
        ]);
        if ($validator->fails()) {
            return \Response::json(['error' => true, 'message' => $validator->messages()]);
        }
        $oldItem = Items::find($request->item_id);
        if ($oldItem) {
            $filename = (str_contains($request->item_name, '.' . $oldItem->extention)) ? $request->item_name : $request->item_name . '.' . $oldItem->extension;
            if (rename($oldItem->folder->path() . '/' . $oldItem->real_name,
                $oldItem->folder->path() . '/' . $filename)) {
                $oldItem->real_name = $filename;
                $oldItem->save();
                return \Response::json(['error' => false, 'message' => 'File name has been changed successfully.']);
            }
            return \Response::json(['error' => true, 'message' => 'Could not change file name.']);
        }
        if ($validator->fails()) {
            return \Response::json(['error' => true, 'message' => 'Could not change file name.']);
        }
    }

    public function getCopyItems(Request $request)
    {
        $data = $request->all();
        $validator = \Validator::make($data, [
            'item_id' => 'required'
        ]);
        if ($validator->fails()) {
            return \Response::json(['error' => true, 'message' => $validator->messages()]);
        }
        if (isset($data['item_id']) and is_array($data['item_id'])) {
            $vdata = $data['item_id'];
            foreach ($data['item_id'] as $k => $v) {
                $result = Items::copy($v);
                if ($result == true) {
                    break;
                }
            }
        } else {
            $result = Items::copy($data['item_id']);
        }

        return \Response::json(['error' => $result]);

    }

    public function getTransferItems(Request $request)
    {
        ini_set('allow_url_fopen',"On");
        ini_set('allow_url_include',"On");

        $data = $request->all();
        $validator = \Validator::make($data, [
            'item_id' => 'required',
            'folder_id' => 'required_without_all:slug|integer|exists:drive_folders,id'
        ]);

        if ($validator->fails()) {
            return \Response::json(['error' => true, 'message' => $validator->messages()]);
        }

        if (isset($data['item_id']) and is_array($data['item_id'])) {
            $vdata = $data['item_id'];
            foreach ($data['item_id'] as $k => $v) {
                $result = Items::transfer($v, $data['folder_id']);
                if ($result == true) {
                    break;
                }
            }
        } else {
            $result = Items::transfer($data['item_id'], $data['folder_id']);
        }

        return \Response::json(['error' => $result]);
    }
}