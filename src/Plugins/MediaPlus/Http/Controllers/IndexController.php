<?php namespace Sahakavatar\Media\Plugins\MediaPlus\Http\Controllers;

/**
 * Created by PhpStorm.
 * User: Comp1
 * Date: 12/19/2016
 * Time: 2:58 PM
 */
use App\Core\CmsItemReader;
use App\Http\Controllers\Controller;
use App\Modules\Media\Plugins\Drive\Autoload;
use App\Repositories\AdminsettingRepository as Settings;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public $settings;

    public function __construct(Settings $settings)
    {
        $this->settings = $settings;
    }

    public function index()
    {
        $settings = \App\Modules\Settings\Models\Settings::where('section', 'media_plus')
            ->where('settingkey', 'ui_settings')->first();

        $roleAccess = \App\Modules\Media\Plugins\Drive\Models\Settings::getCurrentRoleAccess($settings);
        return view('MediaPlus::index', compact(['settings', 'roleAccess']));
    }

    public function getSettings()
    {
        $savedSorting = null;
        $uploaders = CmsItemReader::getAllGearsByType('units')
            ->where('place', 'backend')
            ->where('type', 'media')
            ->run();
        $uploaders = $uploaders ? $uploaders->pluck('title', 'slug') : NULL;
        $settings = $this->settings->getSettingsBySection('folder_settings')
            ? $this->settings->getSettingsBySection('folder_settings')->pluck('val', 'settingkey')
            : null;

        $sortingSettings = \App\Modules\Settings\Models\Settings::where('section', 'media_plus')
            ->where('settingkey', 'sorting_settings')->first();
        if($sortingSettings && $sortingSettings->val){
            $savedSorting = json_decode($sortingSettings->val,true)['sorting'];
        }
        return view('MediaPlus::settings', compact(['uploaders', 'settings','savedSorting']));
    }

    public function postSettings(Request $request)
    {
        $validator = \Validator::make($request->except('_token'), [
            'directory_default_max_size' => 'required',
            'directory_default_extension' => 'required',
            'directory_default_uploader' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->messages());
        }

        $this->settings->updateSystemSettings($request->except('_token'), 'folder_settings');
        return redirect()->back()->with('message', 'Settings has been stored successfully.');
    }

    public function postUISettings(Request $request) {
//        dd(json_encode($request->except('_token')));
        $this->settings->updateSystemSettings(['ui_settings' => json_encode($request->except('_token'))], 'media_plus');
        return redirect()->back()->with('message', 'Settings has been stored successfully.');
    }

    public function postSortingSettings(Request $request) {
        $this->settings->updateSystemSettings(['sorting_settings' => json_encode($request->except('_token'))], 'media_plus');
        return redirect()->back()->with('message', 'Settings has been stored successfully.');
    }

    public function postSearchSettings(Request $request) {
        $this->settings->updateSystemSettings(['search_bar_media' => $request->search_bar], 'media_plus');
        return redirect()->back()->with('message', 'Settings has been stored successfully.');
    }


    public function getMigrate()
    {
        $autoload = new Autoload();
        $autoload->up([]);
    }

    public function shellTest() {
        ini_set('max_execution_time', -1);
        $sc = shell_exec('cd '. base_path() . ' && php composer.phar update 2>&1');
        echo '<pre>'.$sc.'</pre>';die;
    }
}