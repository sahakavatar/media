<?php
namespace Sahakavatar\Media\Plugins\Drive;
/**
 * Created by PhpStorm.
 * User: Edo
 * Date: 8/8/2016
 * Time: 9:11 PM
 */
use App\Modules\Media\Plugins\Drive\Models\Folders;
use App\Modules\Media\Plugins\Drive\Models\Items;
use App\Modules\Media\Plugins\Drive\Models\Settings;
use App\Models\Setting;
class Autoload
{
// this function will coled only install time
    public function up($consig){
        Folders::migrate();
        Settings::migrate();
        Items::migrate();

        Folders::seed();
        Settings::seed();

	//	BBRegisterAdminPages($consig['slug'],"Drive page","/admin/media/drive","media_template_57fg44655ecba");

    }
    // this function will coled only unistall time
    public function down($consig){
        BBUnregisterAdminPages($consig['slug']);
        \Schema::disableForeignKeyConstraints();
        \Schema::dropIfExists('drive_folders');
        \Schema::dropIfExists('drive_settings');
        \Schema::dropIfExists('drive_items');
    }
}