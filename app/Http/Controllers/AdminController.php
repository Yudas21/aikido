<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Form;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Menu;
use App\Level;
use App\Akses;
use Indras;
use App\User;
use App\Page;
use App\Organization;
use App\News;
use App\Schedule;
use App\ImageGallery;
use App\VideoGallery;
use App\Kurikulum;

class AdminController extends Controller
{

	public function __construct(){
    	$this->middleware('auth');
    }

    public function index(){
    	return $this->dasboard();
    }

    public function dasboard(){
    	return view('admin.dashboard');
    }

    public function profile(){
        $data = User::where('id', session('uid'))->first();
        return view('admin.profile', compact('data'));
    }

    public function profile_update($id, Request $request){
        $this->validate($request, [
            'name' => 'required|string',
            'email' => $request->email == $request->email ? 'required' : 'required|unique:users,email'
        ]);

        User::findOrFail($id)->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        session(['name' => $request->name]);
        session(['email' => $request->email]);
        return redirect('admin/profile')->with('message', 'Update profil berhasil!');
    }

    public function password_update($id, Request $request){
        $this->validate($request, [
            'current_password' => 'required',
            'password' => 'required|string|min:5',
            'confirm_password' => 'required|same:password'
        ]);

        if($request->current_password != session('password')){
           return redirect()->back()->with('error','Password sekarang salah. Silakan coba lagi!');
        }

       if($request->password == $request->current_password) {
           return redirect()->back()->with('error','Password baru sama seperti password sekarang. Silakan coba lagi dengan password yang berbeda.');
        } 

        User::findOrFail($id)->update([
                'password' => Hash::make($request->password)
        ]);

        session(['password' => $request->password]);

        return redirect('admin/profile')->with('message', 'Password berhasil diubah!');
    }

    public function change_photo(Request $request){
        $id = session('userid');
        $this->validate($request, [
            'foto' => 'required|file|max:2000'
        ]);

        $uploadedFile = $request->file('foto'); 
        $path = $uploadedFile->store('public/photo');
        $pecah = explode('/', $path);

        if($request->fotolama != '' || $request->fotolama != NULL){
            unlink(storage_path('app/public/photo/'.$request->fotolama));
        }
        
        User::where('id_user', $id)->update([
            'foto' => trim($pecah[2]),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect('admin/profile')->with('message', 'Foto berhasil diganti!');
    }

    public function menu(){
        $data = Menu::all();
        return view('admin.menu', compact('data'));
    }

    public function menu_add(){
        $menu = Menu::all();
        return view('admin.menu_add', compact('menu'));
    }

    public function menu_update($id){
        $data = Menu::all();
        $menu = Menu::where('id',$id)->first();
        return view('admin.menu_update', compact('data','menu'));
    }

    public function menu_store(Request $request){
        $this->validate($request, [
            'name' => 'required|string'
        ]);

        Menu::create([
            'name' => $request->name,
            'url' => $request->url,
            'parent' => $request->parent
        ]);
        
        return redirect('admin/menu')->with('message', 'Data menu berhasil disimpan');
    }

    public function menu_pupdate($id, Request $request){
        $this->validate($request, [
            'name' => 'required|string'
        ]);

        Menu::findOrFail($id)->update([
            'name' => $request->name,
            'url' => $request->url,
            'parent' => $request->parent
        ]);

        return redirect('admin/menu')->with('message', 'Data menu berhasil diubah');
    }

    public function menu_destroy($id){
        Menu::findOrFail($id)->delete();
        return redirect('admin/menu')->with('message', 'Data menu berhasil dihapus');
    }

    public function level(){
        $data = Level::all();
        return view('admin.level', compact('data'));
    }

    public function level_store(Request $request){
        $this->validate($request, [
            'name' => 'required|unique:level,name'
        ]);

        Level::create($request->all());
        
        return redirect('admin/level')->with('message', 'Level berhasil ditambah!');
    }

    public function level_update($id){
        $level = Level::where('id',$id)->first();
        return view('admin.level_update', compact('level'));
        // return $data;
    }

    public function level_pupdate($id, Request $request){
        
        $this->validate($request, [
            'name' => $request->name_old == $request->name ? 'required' : 'required|unique:level,name' 
        ]);

        Level::findOrFail($id)->update([
            'name' => $request->name
        ]);

        return redirect('admin/level')->with('message', 'Level berhasil diubah!');
    }

    public function level_destroy($id){
        Level::findOrFail($id)->delete();
        return redirect('admin/level')->with('message', 'Level berhasil dihapus!');
    }

    public function level_access($id){
        $access = Akses::where('level_id', $id)->get();
        return view('admin.level_access', compact('access','id'));
    }

    public function level_access_update($id, Request $request){
      
      $id_level = $request->id_level;
      $menu_id = $request->menu_id != '' ? $request->menu_id : array();
      $insert = array();
      $daftar_menu = array();
      $menus = DB::table('akses')->select('menu_id')->where('level_id', $id_level)->get();
      $isi_menu = array();
      foreach ($menus as $value) {
         $isi_menu[] = $value->menu_id;
      }

      for($s=0;$s<count($menu_id);$s++){
        $hitung = DB::table('akses')->where(['menu_id' => $menu_id[$s], 'level_id' => $id_level])->count();
        if($hitung > 0){
             //     
        } else {
            $data = array(
                      'menu_id' => $menu_id[$s],
                      'level_id' => $id_level,
                      'created_at' => date('Y-m-d H:i:s'),
                      'updated_at' => date('Y-m-d H:i:s')
            );
            $insert[] = $data;
        }
      }

      if(count($insert) > 0){
        DB::table('akses')->insert($insert);
      }
      // } else {
      // //   Akses::where('id_level', $id_level)->delete();
      // // }

      for($s=0;$s<count($menu_id);$s++){
         if (($key = array_search($menu_id[$s], $isi_menu)) !== FALSE) {
              unset($isi_menu[$key]);
         }
      }

      array_unique($isi_menu);
      $isi_menu_delete = array();
      foreach ($isi_menu as $key => $value) {
          $isi_menu_delete[] = $value;
      }

      // echo '<pre>';
      // print_r($isi_menu_delete);
      // echo '</pre>';
      // exit();
      if(count($isi_menu_delete) > 0){
        for($s=0;$s<count($isi_menu_delete);$s++){ 
            DB::table('akses')->where('level_id', $id_level)->where('menu_id', $isi_menu_delete[$s])->delete();
        }
      }

      // echo '<pre>';
      // print_r($isi_menu);
      // echo '</pre>';
      // exit(); 
      return redirect('admin/access_level/'.$id)->with('message', 'Akses berhasil diubah!');
        
    }


    public function users(){
        $data = DB::table('users as a')->select('a.id','a.name','a.email', 'a.status', 'b.name as level')->leftJoin('level as b','b.id','=','a.level')->get();
        return view('admin.users', compact('data'));
    }

    public function users_add(){
        $level = Level::all();
        return view('admin.users_add', compact('level'));
    }    

    public function users_store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|string|min:5',
            'password_confirm' => 'required|string|same:password|min:5',
            'level' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'level' => $request->level,
            'status' => '1',
            'password' => Hash::make($request->password),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        return redirect('admin/users')->with('message', 'Tambah user baru berhasil!');
    }

    public function users_update($id){
        $level = Level::all();
        $data = User::where('id', $id)->first();
        return view('admin.users_update', compact('data', 'level'));
    }

    public function users_pupdate($id, Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => $request->email == $request->email_old ? 'required' : 'required|unique:users,email',
            'level' => 'required',
            'status' => 'required'
        ]);

      User::findOrFail($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'level' => $request->level,
            'status' => $request->status,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect('admin/users')->with('message', 'Update user berhasil!');
    }

    public function users_update_password($id){
        return view('admin.users_update_password', compact('id'));
    }

    public function users_pupdate_password($id, Request $request){
        
        $this->validate($request, [
            'password' => 'required|string|min:5',
            'password_confirm' => 'required|string|same:password|min:5'
        ]);

        User::findOrFail($id)->update([
            'password' => Hash::make($request->password),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect('admin/users')->with('message', 'Update password user berhasil!');
    }

    public function users_delete($id){
        User::findOrFail($id)->delete();
        return redirect('admin/users')->with('message', 'Hapus user berhasil!');
    }

    public function pages(){
        $data = Page::all();
        return view('admin.pages', compact('data'));
    }

    public function pages_add(){
        return view('admin.pages_add');
    }

    public function pages_store(Request $request){
        $this->validate($request, [
            'name' => 'required|unique:page,name',
            'page_content' => 'required'
        ]);

        Page::create([
                       'name' => $request->name,
                       'page_content' => $request->page_content
        ]);
        
        return redirect('admin/pages')->with('message', 'Page baru berhasil ditambah!');
    }

    public function pages_update($id){
        $data = Page::where('id',$id)->first();
        return view('admin.pages_update', compact('data'));
        // return $data;
    }

    public function pages_pupdate($id, Request $request){
        
        $this->validate($request, [
            'name' => $request->name_old == $request->name ? 'required' : 'required|unique:page,name',
            'page_content' => 'required' 
        ]);

        Page::findOrFail($id)->update([
            'name' => $request->name,
            'page_content' => $request->page_content
        ]);

        return redirect('admin/pages')->with('message', 'Page berhasil diubah!');
    }

    public function pages_upload($id){
        $data = Page::where('id',$id)->first();
        return view('admin.pages_upload', compact('data'));
    }

    public function pages_pupload($id, Request $request){
        $this->validate($request, [
            'page_image' => 'required|file|max:2000'
        ]);
        $file = Indras::get_page_image($id);
        $uploadedFile = $request->file('page_image'); 
        $path = $uploadedFile->store('public/pages');
        $pecah = explode('/', $path);

        if($file != '' || $file != NULL){
            unlink(storage_path('app/public/pages/'.$file));
        }
        
        Page::findOrFail($id)->update([
            'page_image' => trim($pecah[2]),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect('admin/pages')->with('message', 'Image page berhasil diganti!');
    }

    public function pages_destroy($id){
        Page::findOrFail($id)->delete();
        return redirect('admin/pages')->with('message', 'Page berhasil dihapus!');
    }

    public function news(){
        $data = DB::table('news as a')->select('a.id', 'a.news_title','a.news_publish','b.name as author', 'a.news_image', 'a.news_content')->join('users as b', 'b.id', '=', 'a.created_by')->get();
        return view('admin.news', compact('data'));
    }

    public function news_add(){
        return view('admin.news_add');
    }

    public function news_store(Request $request){
        $this->validate($request, [
            'news_title' => 'required',
            'news_content' => 'required',
            'news_publish' => 'required' 
        ]);

        News::create([
            'news_title' => $request->news_title,
            'news_content' => $request->news_content,
            'news_publish' => $request->news_publish,
            'news_slug' => str_slug($request->news_title, '-'),
            'created_by' => session('uid'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        
        return redirect('admin/news')->with('message', 'Berita baru berhasil ditambah!');
    }

    public function news_update($id){
        $data = News::where('id',$id)->first();
        return view('admin.news_update', compact('data'));
        // return $data;
    }

    public function news_pupdate($id, Request $request){
        
        $this->validate($request, [
            'news_title' => 'required',
            'news_content' => 'required',
            'news_publish' => 'required' 
        ]);

        News::findOrFail($id)->update([
            'news_title' => $request->news_title,
            'news_content' => $request->news_content,
            'news_publish' => $request->news_publish,
            'news_slug' => str_slug($request->news_title, '-'),
            'updated_by' => session('uid'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect('admin/news')->with('message', 'Berita berhasil diubah!');
    }

    public function news_upload($id){
        $data = News::where('id',$id)->first();
        return view('admin.news_upload', compact('data'));
    }

    public function news_pupload($id, Request $request){
        $this->validate($request, [
            'news_image' => 'required|file|max:2000'
        ]);
        $file = Indras::get_news_image($id);
        $uploadedFile = $request->file('news_image'); 
        $path = $uploadedFile->store('public/news');
        $pecah = explode('/', $path);
        // return $pecah;
        // exit();
        if($file != '' || $file != NULL){
            unlink(storage_path('app/public/news/'.$file));
        }
        
        News::findOrFail($id)->update([
            'news_image' => trim($pecah[2]),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect('admin/news')->with('message', 'Gambar berita berhasil diganti!');
    }

    public function news_destroy($id){
        News::findOrFail($id)->delete();
        return redirect('admin/news')->with('message', 'Berita berhasil dihapus!');
    }

    public function schedule(){
        $data = Schedule::all();
        return view('admin.schedule', compact('data'));
    }

    public function schedule_add(){
        return view('admin.schedule_add');
    }

    public function schedule_update($id){
        $data = Schedule::where('id',$id)->first();
        return view('admin.schedule_update', compact('data'));
    }

    public function schedule_store(Request $request){
        $this->validate($request, [
            'from_day' => 'required',
            'from_time' => 'required',
            'to_time' => 'required'
        ]);

        Schedule::create([
            'from_day' => $request->from_day,
            'from_time' => $request->from_time,
            'to_time' => $request->to_time
        ]);
        
        return redirect('admin/schedule')->with('message', 'Jadwal baru berhasil disimpan');
    }

    public function schedule_pupdate($id, Request $request){
        $this->validate($request, [
            'from_day' => 'required',
            'from_time' => 'required',
            'to_time' => 'required'
        ]);

        Schedule::findOrFail($id)->update([
            'from_day' => $request->from_day,
            'from_time' => $request->from_time,
            'to_time' => $request->to_time
        ]);

        return redirect('admin/schedule')->with('message', 'Jadwal berhasil diubah');
    }

    public function schedule_destroy($id){
        Schedule::findOrFail($id)->delete();
        return redirect('admin/schedule')->with('message', 'Jadwal berhasil dihapus');
    }

    public function gallery_image(){
        $data = ImageGallery::all();
        return view('admin.gallery_image', compact('data'));
    }

    public function gallery_image_add(){
        return view('admin.gallery_image_add');
    }

    public function gallery_image_store(Request $request){
        $this->validate($request, [
            'image_title' => 'required',
            'image_path' => 'required|file|max:5000',
            'publish' => 'required'
        ]);

        $uploadedFile = $request->file('image_path'); 
        $path = $uploadedFile->store('public/foto');
        $pecah = explode('/', $path);

        ImageGallery::create([
                       'image_title' => $request->image_title,
                       'image_path' => $pecah[2],
                       'publish' => $request->publish
        ]);
        
        return redirect('admin/image_gallery')->with('message', 'Foto baru berhasil ditambah!');
    }

    public function gallery_image_update($id){
        $data = ImageGallery::where('id',$id)->first();
        return view('admin.gallery_image_update', compact('data'));
        // return $data;
    }

    public function gallery_image_pupdate($id, Request $request){
        
        $this->validate($request, [
            'image_title' => 'required',
            'image_path' => 'file|max:5000',
            'publish' => 'required' 
        ]);

        $file = Indras::get_gallery_image($id);
        $uploadedFile = $request->file('image_path');
        if($uploadedFile!=''){
            $path = $uploadedFile->store('public/foto');
            $pecah = explode('/', $path);
            // return $pecah;
            // exit();
            if($file != '' || $file != NULL){
                unlink(storage_path('app/public/foto/'.$file));
            }

            ImageGallery::findOrFail($id)->update([
                'image_title' => $request->image_title,
                'image_path' => $pecah[2],
                'publish' => $request->publish
            ]);
        } else {
            ImageGallery::findOrFail($id)->update([
                'image_title' => $request->image_title,
                'publish' => $request->publish
            ]);
        }
        
        return redirect('admin/image_gallery')->with('message', 'Foto berhasil diubah!');
    }

    public function gallery_image_destroy($id){
        $file = Indras::get_gallery_image($id);
        if($file != '' || $file != NULL){
            unlink(storage_path('app/public/foto/'.$file));
        }
        ImageGallery::findOrFail($id)->delete();
        return redirect('admin/image_gallery')->with('message', 'Foto berhasil dihapus!');
    }

    public function gallery_video(){
        $data = VideoGallery::all();
        return view('admin.gallery_video', compact('data'));
    }

    public function gallery_video_add(){
        return view('admin.gallery_video_add');
    }

    public function gallery_video_store(Request $request){
        $this->validate($request, [
            'video_title' => 'required',
            'video_path' => 'file|max:50000',
            'publish' => 'required'
        ]);

        $uploadedFile = $request->file('video_path'); 
        if($uploadedFile!=''){
            $path = $uploadedFile->store('public/video');
            $pecah = explode('/', $path);

            VideoGallery::create([
                           'video_title' => $request->video_title,
                           'video_path' => $pecah[2],
                           'video_url' => $request->video_url != '' ? $request->video_url : NULL,
                           'publish' => $request->publish
            ]);
        } else {
            VideoGallery::create([
                           'video_title' => $request->video_title,
                           'video_url' => $request->video_url != '' ? $request->video_url : NULL,
                           'publish' => $request->publish
            ]);
        }
        
        
        return redirect('admin/video_gallery')->with('message', 'Video baru berhasil ditambah!');
    }

    public function gallery_video_update($id){
        $data = VideoGallery::where('id',$id)->first();
        return view('admin.gallery_video_update', compact('data'));
        // return $data;
    }

    public function gallery_video_pupdate($id, Request $request){
        
        $this->validate($request, [
            'video_title' => 'required',
            'video_path' => 'file|max:50000',
            'publish' => 'required' 
        ]);

        $file = Indras::get_gallery_video($id);
        $uploadedFile = $request->file('video_path'); 
        
        if($uploadedFile!=''){
            $path = $uploadedFile->store('public/video');
            $pecah = explode('/', $path);
            VideoGallery::findOrFail($id)->update([
                'video_title' => $request->video_title,
                'video_path' => $pecah[2],
                'video_url' => $request->video_url == '' ? NULL : $request->video_url,
                'publish' => $request->publish
            ]);
            if($file != '' || $file != NULL){
                unlink(storage_path('app/public/video/'.$file));
            }
        } else {
            VideoGallery::findOrFail($id)->update([
                'video_title' => $request->video_title,
                'video_url' => $request->video_url == '' ? NULL : $request->video_url,
                'publish' => $request->publish
            ]);
        }

        return redirect('admin/video_gallery')->with('message', 'Video berhasil diubah!');
    }

    public function gallery_video_destroy($id){
        $file = Indras::get_gallery_video($id);
        if($file != '' || $file != NULL){
            unlink(storage_path('app/public/video/'.$file));
        }
        VideoGallery::findOrFail($id)->delete();
        return redirect('admin/video_gallery')->with('message', 'Video berhasil dihapus!');
    }

    public function organization(){
        $data = Organization::all();
        return view('admin.organization', compact('data'));
    }

    public function organization_add(){
        return view('admin.organization_add');
    }

    public function organization_store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'photo' => 'file|max:1024',
            'position' => 'required'
        ]);

        $uploadedFile = $request->file('photo'); 
        if($uploadedFile!=''){
            $path = $uploadedFile->store('public/org');
            $pecah = explode('/', $path);

            Organization::create([
                           'name' => $request->name,
                           'photo' => $pecah[2],
                           'position' => $request->position
            ]);
        } else {
            Organization::create([
                           'name' => $request->name,
                           'position' => $request->position
            ]);
        }
        
        
        return redirect('admin/organization')->with('message', 'Kepengurusan baru berhasil ditambah!');
    }

    public function organization_update($id){
        $data = Organization::where('id',$id)->first();
        return view('admin.organization_update', compact('data'));
        // return $data;
    }

    public function organization_pupdate($id, Request $request){
        
        $this->validate($request, [
            'name' => 'required',
            'photo' => 'file|max:1024',
            'position' => 'required' 
        ]);

        $file = Indras::get_organization_photo($id);
        $uploadedFile = $request->file('photo'); 
        
        if($uploadedFile!=''){
            $path = $uploadedFile->store('public/org');
            $pecah = explode('/', $path);
            Organization::findOrFail($id)->update([
                'name' => $request->name,
                'position' => $request->position,
                'photo' => $pecah[2]
            ]);
            if($file != '' || $file != NULL){
                unlink(storage_path('app/public/org/'.$file));
            }
        } else {
            Organization::findOrFail($id)->update([
                'name' => $request->name,
                'position' => $request->position
            ]);
        }

        return redirect('admin/organization')->with('message', 'Data organisasi berhasil diubah!');
    }

    public function organization_destroy($id){
        $file = Indras::get_organization_photo($id);
        if($file != '' || $file != NULL){
            unlink(storage_path('app/public/org/'.$file));
        }
        Organization::findOrFail($id)->delete();
        return redirect('admin/organization')->with('message', 'Data organisasi berhasil dihapus!');
    }

    public function kurikulum(){
        $data = Kurikulum::all();
        return view('admin.kurikulum', compact('data'));
    }

    public function kurikulum_add(){
        return view('admin.kurikulum_add');
    }

    public function kurikulum_update($id){
        $data = Kurikulum::where('id',$id)->first();
        return view('admin.kurikulum_update', compact('data'));
    }

    public function kurikulum_store(Request $request){
        $this->validate($request, [
            'name' => 'required'
        ]);

        Kurikulum::create([
            'name' => $request->name,
            'description' => $request->description
        ]);
        
        return redirect('admin/kurikulum')->with('message', 'Kurikulum baru berhasil disimpan');
    }

    public function kurikulum_pupdate($id, Request $request){
        $this->validate($request, [
            'name' => 'required'
        ]);

        Kurikulum::findOrFail($id)->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect('admin/kurikulum')->with('message', 'Kurikulum berhasil diubah');
    }

    public function kurikulum_destroy($id){
        Kurikulum::findOrFail($id)->delete();
        return redirect('admin/kurikulum')->with('message', 'Kurikulum berhasil dihapus');
    }

    public function logout(){
    	Auth::logout();
    	return redirect('login');
    }
}
