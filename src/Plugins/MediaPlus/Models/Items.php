<?php
/**
 * Created by PhpStorm.
 * User: Comp1
 * Date: 12/19/2016
 * Time: 4:33 PM
 */

namespace Sahakavatar\Media\Plugins\Drive\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;

class Items extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'drive_items';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
    /**
     * The attributes which using Carbon.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];


    public static function migrate()
    {
        \Schema::create('drive_items', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('original_name')
                ->index('drive_items_original_name');
            $table->string('real_name')
                ->index('drive_items_real_name');
            $table->string('extension')
                ->index('drive_items_extension');
            $table->string('size');
            $table->integer('folder_id')->unsigned();
            $table->timestamps();
            $table->foreign('folder_id')
                ->references('id')
                ->on('drive_folders')
                ->onDelete('cascade');
        });
    }

    public static function removeItem($data)
    {
        if ($data['trash']) {
            $trash = Folders::where('name', 'trash')->first();
            $data['folder_id'] = $trash->id;
            return self::sort($data);
        } else {
            if (is_array($data['item_id'])) {
                return self::whereIn('id', $data['item_id'])->delete();
            }
            return self::find($data['item_id'])->delete();
        }

    }

    public static function sort($data)
    {
        if (is_array($data['item_id'])) {
            $items = self::whereIn('id', $data['item_id'])->get();
            foreach ($items as $item) {
                $item->folder_id = $data['folder_id'];
                $item->save();
            }
            return $items->toArray();
        }
        $item = self::find($data['item_id']);
        $item->folder_id = $data['folder_id'];
        $item->save();
        return $item->toArray();

    }
}