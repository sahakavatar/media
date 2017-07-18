<?php
/**
 * Created by PhpStorm.
 * User: Comp1
 * Date: 12/22/2016
 * Time: 3:46 PM
 */

namespace Sahakavatar\Media\Plugins\Drive\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Media\Plugins\Drive\Models\Items;
use App\Modules\Media\Plugins\Drive\Models\Folders;
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
            'access_token' => 'required',
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
            'access_token' => 'required',
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

    public function uploadFile(Request $request) {

        $validator = \Validator::make($request->all(), [
            'folder_id' => 'required_without_all:slug|integer|exists:drive_folders,id',
            'item.*' => 'required',
        ]);
        if ($validator->fails()) {
            return \Response::json(['error' => true, 'message' => $validator->messages()]);
        }
        $folder = Folders::find($request->folder_id);
        if($folder && \File::isDirectory($folder->path())) {
            foreach($request->item as $item) {
                $realName = $request->item_name ? $request->item_name : $item->getClientOriginalName();
                if($item->move($folder->path(), $item->getClientOriginalName())) {
                    $item = Items::create([
                        'original_name' => $item->getClientOriginalName(),
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
}