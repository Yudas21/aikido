<?php
namespace App\Helpers;
 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Menu;
use App\Akses;
use App\Level;
use App\Page;
use App\Organization;
use App\News;
use App\ImageGallery;
use App\VideoGallery;
 
class Indras {

    public static function data_user($id_user) {
        $data = User::where('id', $id_user)->first();
        return $data;
    }

     public static function get_parent() {
        $menus = Menu::where('parent', 0)->get();
        return $menus;
    }

    public static function get_menu_name($id) {
        $data = Menu::where('id', $id)->first();
        return $data->name;
    }

    public static function get_my_menu($id_level)
    {
        $data_menu = array();
        $menus = Akses::select('menu_id')
                ->where('level_id', $id_level)
                ->get();
        foreach ($menus as $key) {
            if($key->menu_id){
                array_push($data_menu, $key->menu_id);
            }
        }
        return $data_menu;
    }

    public static function get_count_child($id) {
        $menus = Menu::where('parent', $id)
                ->count();
        return $menus;
    }

    public static function get_child($id) {
        $menus = Menu::where('parent', $id)
                ->orderBy('no_urut')
                ->get();
        return $menus;
    }

    public static function get_parent_id($id) {
        $parent = '';
        $menus = Menu::select('parent')->where('id', $id)->get();
        if(Menu::select('parent')->where('id', $id)->count() > 0){
            foreach ($menus as $value) {
                $parent = $value->parent;
            }
        }
        return $parent;
    }

    public static function get_level_name($id) {
        $name = '';
        $menus = Level::select('name')->where('id', $id)->get();
        if(Level::select('name')->where('id', $id)->count() > 0){
            foreach ($menus as $value) {
                $name = $value->name;
            }
        }
        return $name;
    }

    public static function get_page_image($id){
        $name = '';
        $menus = Page::select('page_image')->where('id', $id)->get();
        if(Page::select('page_image')->where('id', $id)->count() > 0){
            foreach ($menus as $value) {
                $name = $value->page_image;
            }
        }
        return $name;
    }

    public static function get_news_image($id){
        $name = '';
        $menus = News::select('news_image')->where('id', $id)->get();
        if(News::select('news_image')->where('id', $id)->count() > 0){
            foreach ($menus as $value) {
                $name = $value->news_image;
            }
        }
        return $name;
    }

    public static function get_gallery_image($id){
        $name = '';
        $menus = ImageGallery::select('image_path')->where('id', $id)->get();
        if(ImageGallery::select('image_path')->where('id', $id)->count() > 0){
            foreach ($menus as $value) {
                $name = $value->image_path;
            }
        }
        return $name;
    }

    public static function get_gallery_video($id){
        $name = '';
        $menus = VideoGallery::select('video_path')->where('id', $id)->get();
        if(VideoGallery::select('video_path')->where('id', $id)->count() > 0){
            foreach ($menus as $value) {
                $name = $value->video_path;
            }
        }
        return $name;
    }

    public static function get_organization_photo($id){
        $name = '';
        $menus = Organization::select('photo')->where('id', $id)->get();
        if(Organization::select('photo')->where('id', $id)->count() > 0){
            foreach ($menus as $value) {
                $name = $value->photo;
            }
        }
        return $name;
    }

}