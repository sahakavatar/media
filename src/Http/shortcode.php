<?php

use App\Models\Setting;
use App\Models\Term;
use App\Modules\Media\Http\mediahelper;
use App\Modules\Media\Media;

if (!function_exists('BBMediaSettings')) {

    /**
     * Provide all Media Settings
     *
     * @return array
     */
    function BBMediaSettings()
    {
        $media_settings = [];
        $rs = Setting::where('section', 'media')->get();
        foreach ($rs as $sngl_setting) {
            $media_settings[$sngl_setting->settingkey] = $sngl_setting->val;
        }

        return $media_settings;
    }
}

if (!function_exists('BBAlbums')) {

    /**
     * Provide all Media Albums
     *
     * @return array
     */
    function BBAlbums()
    {
        $term = new Term;

        return $term->mediaFolders();
    }
}

if (!function_exists('BBAlbum')) {

    /**
     * Provide all Media Album Details
     *
     * @param null $id
     * @return collection | null
     */
    function BBAlbum($id = null)
    {
        $album = null;
        if ($id) {
            $rs = Term::find($id);
            if ($rs) {
                $album = $rs;
            }
        }

        return $album;
    }

}

if (!function_exists('BBMediaLists')) {

    /**
     * Provide all Media against some media type
     *
     * @param string $type
     * @param string $response_style
     * @return array|collection
     */
    function BBMediaLists($type = 'images', $response_style = 'collection')
    {
        $data = Media::where('media_type', $type)->get();

        return ($response_style == 'collection') ? $data : $data->toArray();
    }

}

if (!function_exists('BBMedia')) {

    /**
     * Provide all Media details
     *
     * @param null $id
     * @param string $response_style
     * @return array|collection
     */
    function BBMedia($id = null, $response_style = 'collection')
    {
        $response = null;
        if ($id) {
            $data = Media::find($id);
            $response = ($response_style == 'collection') ? $data : $data->toArray();
        }

        return $response;
    }

}


if (!function_exists('BBMediaThumb')) {

    /**
     * Get Media Thumb
     *
     * @param null $id
     * @param null $w
     * @param null $h
     * @return array|collection
     */
    function BBMediaThumb($id = null, $w = null, $h = null)
    {
        $mediahelper = new mediahelper();
        $w = ($w != null) ? $w : Config('config.t_width');
        $h = ($h != null) ? $h : Config('config.t_height');
        $img = $mediahelper->mkThumb($id, $w, $h);
        return $img;
    }

}



