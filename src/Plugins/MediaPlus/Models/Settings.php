<?php
/**
 * Created by PhpStorm.
 * User: Comp1
 * Date: 12/19/2016
 * Time: 3:55 PM
 */

namespace  App\Modules\Media\Plugins\Drive\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;


class Settings extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'drive_settings';
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

    protected $casts = ['uploader_data' => 'json'];


    public static function migrate()
    {
        \Schema::create('drive_settings', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('function')->nullable();
            $table->string('slug')->nullable();
            $table->integer('folder_id')->unsigned();
            $table->string('action')->default('all_access');
            $table->text('uploader_data')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('folder_id')
                ->references('id')->on('drive_folders')
                ->onDelete('cascade');
        });
    }

    public function folder()
    {
        return $this->belongsTo('App\Modules\Media\Plugins\Drive\Models\Folders','folder_id');
    }
    public static function seed(){
        self::create(['slug'=>'drive','folder_id'=>1]);
    }
}