<?php

Breadcrumbs::register('media_gsettings', function ($breadcrumbs) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('General Settings', url('admin/media/setting'));
});

Breadcrumbs::register('media_albums', function ($breadcrumbs) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Albums', url('admin/media/setting/albums'));
});

Breadcrumbs::register('media_album', function ($breadcrumbs) {
    $breadcrumbs->parent('media_gsettings');
    $breadcrumbs->push('Album Setting');
});

Breadcrumbs::register('media_seo', function ($breadcrumbs) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('SEO', url('admin/media/seo'));
});

Breadcrumbs::register('media_impexp', function ($breadcrumbs) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Import/Export ', url('admin/media/setting/impexp'));
});
