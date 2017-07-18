<?php

namespace Sahakavatar\Media\Http;

use App\helpers\helpers;
use App\Models\Setting;
use App\Models\Term;
use App\Modules\Media\Models\Media;
use App\Modules\Media\Models\MediaVariation;
use App\Modules\Settings\Models\Settings;
use File;
use Image;
use Validator;

/**
 * Class mediahelper
 * @package App\Modules\Media\Http
 */
class mediahelper
{

    /**
     * @var helpers|null
     */
    private $helpers = null;
    /**
     * @var null
     */
    private $folder = null;
    /**
     * @var null
     */
    private $media_settings = null;
    /**
     * @var null
     */
    private $media_type = null;
    /**
     * @var int
     */
    private $media_count = 0;
    /**
     * @var null
     */
    private $max_allowed_size = null;
    /**
     * @var mixed|null
     */
    private $media_path = null;

    /**
     * mediahelper constructor.
     */
    public function __construct ()
    {
        $this->helpers = new helpers;
        $this->media_path = Config('config.MEDIA_PATH');
    }

    /**
     * @param $request
     * @return array
     */
    public function checkSettingsAndUplaod ($request)
    {
        $folder_id = $request->get('active_id', null);
        $settings = Settings::media()->where('settingkey', $folder_id)->first();

        if (! $settings) return ['msg' => 'folder is not valid', 'code' => '401'];

        $extension = strtolower($request->file('file')[0]->getClientOriginalExtension()); // getting image extension
        $file_name = $request->file('file')[0]->getClientOriginalName();
        $this->media_settings = @json_decode($settings->val, true);

        $check = $this->setMediaChecks($extension);

        if (! $check) return ['msg' => 'You cann\'t upload this media type,Please Check settings of your media section', 'code' => '401'];

        if (! $this->media_type) return ['msg' => 'File is not valid, Please Check settings of your media section', 'code' => '401'];

        $term = false;
        if ($folder_id) $term = Term::find($folder_id);

        if ($term) {
            $this->folder = $this->_mkFolder($term->description);
        } else {
            $this->folder = Config('config.MEDIA_PATH');
        }

        $file = ['file' => $request->file('file')[0]];
        $rules = ['file' => 'max:' . $this->max_allowed_size * 1024]; //mimes:jpeg,bmp,png and for max size max:10000
        $validator = Validator::make($file, $rules);
        if ($validator->fails()) {
            return [
                'msg'  => 'File size is largeer then allowed, Please Check settings of your media section',
                'code' => '401'
            ];
        }

        if (count($term->media) >= $this->media_count)
            return ['msg' => 'You can\'t uplaod any file to this folder, space is full, increase number of uplaods from Settings', 'code' => '401'];


        $file_name = str_replace($extension, '', $file_name);
        $name = preg_replace('/[^A-Za-z0-9\-]/', '', $file_name);
        $name = str_slug($name, "-");

        $name = $name . "." . $extension;
        $request->file('file')[0]->move($this->folder . "/", $name); // uploading file to given path

        return [
            'title'     => preg_replace('/[^A-Za-z0-9\-]/', '', $file_name),
            'type'      => $this->media_type,
            'name'      => $name,
            'folder_id' => $folder_id,
            'image'     => $this->getImage($name, $extension),
            'ext'       => $extension,
            'path'      => $this->folder . "/" . $name,
            'code'      => '200'
        ];
    }

    /**
     *
     * @param type $ext
     */
    private function setMediaChecks ($ext)
    {
        $allowed_img = $this->strToArr($this->media_settings['allowed_img_ext']);
        if (in_array($ext, $allowed_img)) {
            if (! $this->media_settings['allowimage']) return false;

            $this->media_type = Config('config.img');
            $this->max_allowed_size = $this->media_settings['img_max_size'];
            $this->media_count = $this->media_settings['img_no_size'];

            return true;
        }

        $allowed_docs = $this->strToArr($this->media_settings['allowed_doc_ext']);
        if (in_array($ext, $allowed_docs)) {
            if (! $this->media_settings['allowdoc']) return false;

            $this->media_type = Config('config.doc');
            $this->max_allowed_size = $this->media_settings['doc_max_size'];
            $this->media_count = $this->media_settings['doc_no_size'];

            return true;
        }

        $allowed_music = $this->strToArr($this->media_settings['allowed_music_ext']);
        if (in_array($ext, $allowed_music)) {
            if (! $this->media_settings['allowmusic']) return false;

            $this->media_type = Config('config.music');
            $this->max_allowed_size = $this->media_settings['music_max_size'];
            $this->media_count = $this->media_settings['music_no_size'];

            return true;
        }

        $allowed_vid = $this->strToArr($this->media_settings['allowed_vid_ext']);
        if (in_array($ext, $allowed_vid)) {
            if (! $this->media_settings['allowvideo']) return false;

            $this->media_type = Config('config.vid');
            $this->max_allowed_size = $this->media_settings['vid_max_size'];
            $this->media_count = $this->media_settings['video_no_size'];

            return true;
        }
    }

    /**
     *
     * @param type $str
     * @return type
     */
    public function strToArr ($str)
    {
        $str = strtolower($str);
        $str = preg_replace('/\s+/', '', $str);

        return explode(',', $str);
    }

    /**
     * Generate The Media Folder against given name and return back its path
     * If Folder Already exists return back its path
     *
     * @param $title of Folder
     * @return path of folder as string
     */
    public function _mkFolder ($title)
    {

        $path = Config('config.MEDIA_PATH') . $title;
        if (! File::exists($path)) {
            File::makeDirectory($path, 0777, true);
        }

        return $path;
    }

    /**
     * @param $name
     * @param $extension
     * @return mixed|string
     */
    public function getImage ($name, $extension)
    {
        $path = '';
        $path = Config('config.MEDIA_ICONS') . $this->media_type . "/" . $extension . ".png";
        if (! File::exists($path)) {
            $path = Config('config.DEF_IMG');
        }

        return $path;
    }

    /**
     * @param $id
     * @return mixed|string
     */
    public function originalImage ($id)
    {
        $path = Config('config.DEF_IMG');
        if ($id) {
            $media = Media::find($id);
            if ($media) {
                $path = Config('config.MEDIA_PATH') . $media->term->description . "/" . $media->name;
            }
        }

        return $path;

    }

    /**
     * @param $media_id
     * @param $variation_id
     * @param $response
     * @return string
     */
    public function mkThumbs ($media_id, $variation_id, $response)
    {
        $name = $response['name'];
        if ($this->allowedthumb($this->media_type, $response['ext'])) {
            $media_path = $this->folder . "/" . Config('config.img') . "/" . $media_id;
            $variation_path = $this->folder . "/" . Config('config.img') . "/" . $media_id . "/" . $variation_id;
            File::makeDirectory($media_path);
            File::makeDirectory($variation_path);
            if (! File::move($this->folder . "/" . $this->media_type . "/" . $name, $variation_path . "/" . $name)) {
                dd("Couldn't rename file");
            } else {
                $width = Image::make($variation_path . "/" . $name)->width();
                $height = Image::make($variation_path . "/" . $name)->height();
                $scale = ($width > $height) ? 'w' : 'h';
                $this->makeSizes($variation_path, $name, $scale);
            }

            return $variation_path . "/sm_" . $name;
        } else {
            return '';
        }
    }

    /**
     * @param $type
     * @param $ext
     * @return bool
     */
    public function allowedthumb ($type, $ext)
    {
        if ($type == Config('config.img') && $ext != 'svg') {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $folder
     * @param $name
     * @param $scale
     */
    public function makeSizes ($folder, $name, $scale)
    {
        $sizes = ['lg', 'md', 'sm'];
        foreach ($sizes as $size) {
            if ($scale = 'w') {
                $img = Image::make($folder . "/" . $name)->resize(
                    $this->media_settings[$size . '_thumb_width'],
                    null,
                    function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    }
                );
            } else {
                $img = Image::make($folder . "/" . $name)->resize(
                    null,
                    $this->media_settings[$size . '_thumb_height'],
                    function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    }
                );
            }
            $img->save($folder . "/" . $size . "_" . $name);
        }
    }

    /**
     * @param $req
     * @param $variation
     * @return array
     */
    public function saveVariation ($req, $variation)
    {

        $path = Config('config.MEDIA_PATH') . $req['folderId'] . "/" . Config('config.img') . "/" . $req['imageId'];
        $variation_path = $path . "/" . $variation->id;
        File::makeDirectory($variation_path);

        $img = $req['imagedata'];
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $name = helpers::randWithTime() . '.png';
        file_put_contents($variation_path . "/" . $name, $data);

        $width = Image::make($variation_path . "/" . $name)->width();
        $height = Image::make($variation_path . "/" . $name)->height();
        $scale = ($width > $height) ? 'w' : 'h';
        $this->makeSizes($variation_path, $name, $scale);

        return ['path' => $variation_path . "/sm_" . $name, 'name' => $name];
    }

    /**
     *
     * @param type $media
     * @param type $new_media
     * @param type $variation
     * @return string
     */
    public function copyFolders ($media, $new_media, $variation)
    {
        $folder = $media->folder_id;
        $path = Config('config.MEDIA_PATH') . $folder;

        $new_media_path = $path . "/" . Config('config.img') . "/" . $new_media->id;
        $new_variation_path = $path . "/" . Config('config.img') . "/" . $new_media->id . "/" . $variation->id;
        $old_variation_path = $path . "/" . Config('config.img') . "/" . $media->id . "/" . $media->active_variation;

        File::makeDirectory($new_media_path);
        File::makeDirectory($new_variation_path);

        File::copyDirectory($old_variation_path, $new_variation_path);

        return $new_variation_path;
    }

    /**
     *
     * @param type $media
     * @param type $new_folder_id
     */
    public function ChangeFolder ($media, $new_folder_id)
    {
        $media_path = "";
        $term = Term::find($new_folder_id);
        if ($term) {
            $des_path = $this->_mkFolder($term->description) . "/";
        } else {
            $des_path = Config('config.MEDIA_PATH');
        }

        $src = Config('config.MEDIA_PATH') . $media->term->description . "/";
        File::move($src . $media->name, $des_path . $media->name);

    }

    /**
     *
     * @param type $media
     */
    public function deleteMedia ($media)
    {
        $src_folder = Config('config.MEDIA_PATH') . $media->term->description . "/";
        File::delete($src_folder . $media->name);

    }

    /**
     *
     * @param type $media
     * @return type
     */
    public function formatLinks ($media)
    {
        $path = url() . "/" . $this->media_path . $media->folder_id . "/" . $media->media_type . "/";

        return [
            'path'   => $path,
            'file'   => $media->name,
            'folder' => $media->folder_id,
            'type'   => $media->media_type
        ];
    }

    /**
     *
     * @param type $media
     * @return type
     */
    public function links ($media)
    {
        $links = [];
        $path = base_path($this->media_path . $media->folder_id . "/" . $media->media_type . "/");
        $links['core'] = [
            'direct'   => $path . $media->name,
            'download' => $path . "media/download/" . $media->id,
            'href'     => $path . $media->name,
            'form'     => '[URL=' . $path . $media->name . '][/URL]',
        ];
        if ($media->media_type == 'images') {
            $links['sm'] = [
                'direct'   => $path . 'sm/' . $media->name,
                'download' => $path . "media/download/" . $media->id . '/sm',
                'href'     => $path . 'sm/' . $media->name,
                'form'     => '[URL=' . $path . 'sm/' . $media->name . '][/URL]',
            ];

            $links['md'] = [
                'direct'   => $path . 'md/' . $media->name,
                'download' => $path . "media/download/" . $media->id . '/md',
                'href'     => $path . 'md/' . $media->name,
                'form'     => '[URL=' . $path . 'md/' . $media->name . '][/URL]',
            ];

            $links['lg'] = [
                'direct'   => $path . 'lg/' . $media->name,
                'download' => $path . "media/download/" . $media->id . '/lg',
                'href'     => $path . 'md/' . $media->name,
                'form'     => '[URL=' . $path . 'lg/' . $media->name . '][/URL]',
            ];
        }

        return $links;
    }

    /**
     * @param $attr
     * @param $val
     */
    public function set ($attr, $val)
    {
        $this->$attr = $val;
    }

    /**
     * @param $media
     * @return string
     */
    public function mediapath ($media)
    {
        $folder = $media->term;
        $main_path = $folder->description;

        if ($media->media_type == 'images') {
            $variation = MediaVariation::find($media->active_variation);

            return $this->media_path . $main_path . "/" . $variation->name;
        } else {
            return $this->media_path . $main_path . "/" . $media->name;
        }
    }

    /**
     * @param $path
     * @return string
     */
    public function filesize ($path)
    {
        return $this->helpers->formatBytes(filesize($path));
    }

    /**
     * @param $media
     * @return array
     */
    public function format_media ($media)
    {
        $media_arr = [];
        foreach ($media as $sngl_rec) {
            $sngl_rec['path'] = $this->getPath($sngl_rec);
            $media_arr[] = $sngl_rec;
        }

        return $media_arr;
    }

    /**
     * @param $sngl_media_arr
     * @return mixed|string
     */
    public function getPath ($sngl_media_arr)
    {
        $path = '';
        $path = Config('config.MEDIA_ICONS') . $sngl_media_arr['media_type'] . "/" . $sngl_media_arr['ext'] . ".png";
        if ($sngl_media_arr['media_type'] == 'images') {
            $path = $this->mkThumb($sngl_media_arr['id']);
        }
        if (! File::exists($path)) {
            $path = Config('config.DEF_IMG');
        }

        return $path;
    }

    /**
     * @param $media_id
     * @param null $resize_width
     * @param null $resize_height
     * @return string
     */
    public function mkThumb ($media_id, $resize_width = null, $resize_height = null)
    {
        $resize_width = ($resize_width == null) ? Config('config.t_width') : $resize_width;
        $resize_height = ($resize_height == null) ? Config('config.t_height') : $resize_height;

        $media = Media::find($media_id);
        if ($media) {
            // Media Folder Where actual image exists
            $src_folder = Config('config.MEDIA_PATH') . $media->term->description . "/";
            //Cache folder
            $des_folder = config('paths.CACHE') . "media/";
            if (! File::exists($des_folder)) {
                File::makeDirectory($des_folder);
            }

            if ($this->allowedthumb($media->media_type, $media->ext)) {
                if (File::exists($src_folder . $media->name)) {
                    File::copy($src_folder . $media->name, $des_folder . $media->name);
                    $width = Image::make($des_folder . $media->name)->width();
                    $height = Image::make($des_folder . $media->name)->height();
                    $scale = ($width > $height) ? 'w' : 'h';

                    return $this->makeSize(
                        $des_folder,
                        $media->name,
                        $scale,
                        $media->active_variation,
                        $resize_width,
                        $resize_height
                    );
                }
            }
        }

        return '';
    }

    /**
     * Get Image From Cache Folder and resize it according to the required hight / width
     *
     * @param $folder
     * @param $name
     * @param $scale
     * @param $variation_id
     * @param $width
     * @param $height
     * @return string
     * @internal param $variation_id
     */
    public function makeSize ($folder, $name, $scale, $variation_id, $width, $height)
    {
        if ($scale = 'w') {
            $img = Image::make($folder . "/" . $name)->resize(
                $width,
                null,
                function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                }
            );
        } else {
            $img = Image::make($folder . "/" . $name)->resize(
                null,
                $height,
                function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                }
            );
        }
        $new_name = $variation_id . "_" . $width . "x" . $height . "_" . $name;
        $img->save($folder . "/" . $new_name);
        File::delete($folder . "/" . $name);

        return Config('paths.CACHE_MEDIA_URL') . $new_name;
    }

    /**
     *
     */
    private function setMediaSettings ()
    {
        $media_settings = [];
        $rs = Setting::where('section', 'media')->get();
        foreach ($rs as $sngl_setting) {
            $media_settings[$sngl_setting->settingkey] = $sngl_setting->val;
        }
        $this->media_settings = $media_settings;
    }

}
