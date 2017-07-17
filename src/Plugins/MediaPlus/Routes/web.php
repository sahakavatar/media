<?php
$tubs = [
    'module_settings' => [
        [
            'title' => 'MediaPlus',
            'url' => '/admin/media/mediaplus/settings',
        ],
    ]
];
\Eventy::action('my.tab', $tubs);
\Eventy::action('admin.menus', [
    "title" => "Media",
    "custom-link" => "#",
    "icon" => "fa fa-folder-open",
    "is_core" => "yes",
    "main" => true,
    "children" => [
        [
            "title" => "Media Plus",
            "custom-link" => "/admin/media/mediaplus",
            "icon" => "fa fa-angle-right",
            "is_core" => "yes"
        ]
    ]
]);

\Eventy::action('add.sorting', [
    'small' => 'Small to Big Size',
    'big' => 'Big to Small Size',
]);

\Eventy::action('script.groups', "mediaPlus.registerSortby('small', function(json){json.sort(function(a, b) {return (a['size'] > b['size']);}); return json })");
\Eventy::action('script.groups', "mediaPlus.registerSortby('big', function(json){json.sort(function(a, b) {return (b['size'] > a['size']);}); return json })");

Route::get('/', 'Http\Controllers\IndexController@index');
Route::get('/settings', 'Http\Controllers\IndexController@getSettings');
Route::post('/settings', 'Http\Controllers\IndexController@postSettings');
Route::post('/ui-settings', 'Http\Controllers\IndexController@postUISettings');
Route::post('/sorting-settings', 'Http\Controllers\IndexController@postSortingSettings');
Route::post('/search-bar', 'Http\Controllers\IndexController@postSearchSettings');

Route::get('/test-shell', 'Http\Controllers\IndexController@shellTest');

Route::group(
    ['prefix' => '/admin/media-migrations', 'middleware' => ['web']],
    function () {
        Route::get('/migrate', function () {
            $a = new \App\Modules\Media\Plugins\Drive\Autoload();
            $a->up();
        });
        Route::get('/down', function () {
            $a = new \App\Modules\Media\Plugins\Drive\Autoload();
            $a->down();
        });
        // Route::get('/{folder}','Http\Controllers\IndexController@index');


    }
);

