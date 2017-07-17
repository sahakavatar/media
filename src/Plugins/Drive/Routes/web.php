<?php



\Eventy::addAction('add.sorting', function ($what) {
    $sorting = is_array(\Config::get('sorting')) ? \Config::get('sorting') : [];

    if (is_array($what)) {
        $data = array_merge($sorting, $what);
        \Config::set('sorting', $data);
    }
    return (\Config::get('sorting'));
});

\Eventy::addFilter('sorting', function ($what) {
    $settings = \App\Modules\Settings\Models\Settings::where('section','media_plus')->where('settingkey','sorting_settings')->first();
    $options = [];
    if($settings && $settings->val){
        $settings = json_decode($settings->val,true);
        if(isset($settings['sorting']) && count($settings['sorting'])){
            $registeredOptions = \Config::get('sorting');
            foreach ($settings['sorting'] as $key => $data){
                if(isset($registeredOptions[$key]) && $data['enabled'] == 1){
                    $options[$key] = $registeredOptions[$key];
                }
            }
        }
    }

    echo \Form::select('sortby',$options,null,['data-role' => 'sortby','class' => 'form-control']);
});


\Eventy::action('add.sorting', [
    'new' => 'New to Old',
    'old' => 'Old to New',
]);

\Eventy::action('script.groups',"mediaPlus.registerSortby('old', function(json){json.sort(function(a, b) {return (a['updated_at'] > b['updated_at']); }); return json })");
\Eventy::action('script.groups',"mediaPlus.registerSortby('new', function(json){json.sort(function(a, b) {return (b['updated_at'] > a['updated_at']); }); return json })");

$tubs = [
    'module_settings' => [
        [
            'title' => 'Drive',
            'url' => '/admin/media/drive/settings',
        ],
    ]
];
\Eventy::action('my.tab', $tubs);
\Eventy::action('admin.menus', [
    "title" => "Media",
    "custom-link" => "#",
    "icon" => "fa fa-folder-open",
    "is_core" => "yes",
    "main"=>true,
    "children" => [[
    "title" => "drive",
    "custom-link" => "/admin/media/drive",
    "icon" => "fa fa-angle-right",
    "is_core" => "yes"
  ]]
]);

Route::group([
    'middleware' => 'api',
    'prefix'     => 'api-media',
], function ($router) {
    Route::post('/get-folder-childs','Http\Controllers\MediaApiController@getFolderChilds');
    Route::post('/get-create-folder-child','Http\Controllers\MediaApiController@getCreateFolderChild');
    Route::post('/get-edit-folder','Http\Controllers\MediaApiController@getEditFolder');
    Route::post('/get-edit-folder-settings','Http\Controllers\MediaApiController@getEditFolderSettings');
    Route::post('/get-folder-info','Http\Controllers\MediaApiController@getFolderInfo');
    Route::post('/get-sort-folder','Http\Controllers\MediaApiController@getSortFolder');
    Route::post('/get-remove-folder','Http\Controllers\MediaApiController@getRemoveFolder');
    Route::post('/get-media-uploaders','Http\Controllers\MediaApiController@getMediaUploaders');
    Route::post('/get-media-uploaders-settings','Http\Controllers\MediaApiController@getUploaderSettings');
    Route::post('/get-media-uploader-rendered','Http\Controllers\MediaApiController@getFolderUploader');
    Route::post('/download-folder','Http\Controllers\MediaApiController@getDownload');

//ITEMS API
    Route::post('/get-sort-item','Http\Controllers\MediaItemsApiController@getSortItems');
    Route::post('/get-remove-item','Http\Controllers\MediaItemsApiController@getDeleteItems');
    Route::post('/upload','Http\Controllers\MediaItemsApiController@uploadFile');
    Route::post('/replace-item','Http\Controllers\MediaItemsApiController@replaceFile');
    Route::post('/rename-item','Http\Controllers\MediaItemsApiController@renameFile');
    Route::post('/copy-item','Http\Controllers\MediaItemsApiController@getCopyItems');
    Route::post('/transfer-item','Http\Controllers\MediaItemsApiController@getTransferItems');
});
Route::get('/','Http\Controllers\IndexController@index');
Route::get('/settings','Http\Controllers\IndexController@getSettings');
Route::post('/settings','Http\Controllers\IndexController@postSettings');
Route::get('/migrate','Http\Controllers\IndexController@getMigrate');

    Route::group(
        ['prefix' => '/admin/media-migrations','middleware' => ['web']],
        function () {
            Route::get('/migrate',function (){
                $a=new \App\Modules\Media\Plugins\Drive\Autoload();
                $a->up();
            });
            Route::get('/down',function (){
                $a=new \App\Modules\Media\Plugins\Drive\Autoload();
                $a->down();
            });
           // Route::get('/{folder}','Http\Controllers\IndexController@index');


        }
    );

