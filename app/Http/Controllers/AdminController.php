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
        $profile = User::where('id', session('uid'))->first();
        return view('admin.profile', compact('profile'));
    }

    public function settings(){
        $id = session('uid');
        $settings = User::where('id', $id)->get();
        return view('admin.settings', compact('settings'));
    }

    public function profile_update($id, Request $request){
        $this->validate($request, [
            'name' => 'required|string'
        ]);

        User::where('id_user', $id)->update([
            'name' => $request->name,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        session(['name' => $request->name]);

        return redirect('admin/profile')->with('message', 'Update profil berhasil!');
    }

    public function password_update($id, Request $request){
        $this->validate($request, [
            'current_password' => 'required',
            'password' => 'required|string|min:5',
            'confirm_password' => 'required|same:password'
        ]);

        if($request->current_password != session('password')) {
           return redirect()->back()->with('error','Password sekarang salah. Silakan coba lagi!');
        }

       if($request->password == $request->current_password) {
           return redirect()->back()->with('error','Password baru sama seperti password sekarang. Silakan coba lagi dengan password yang berbeda.');
        } 

        User::where('id_user', $id)->update([
                'password' => Hash::make($request->password),
                'updated_at' => date('Y-m-d H:i:s')
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
        $menu = Menu::findOrFail($id)->first();
        return view('admin.menu_update', compact('data','menu'));
    }

    public function menu_store(Request $request){
        $this->validate($request, [
            'name' => 'required|string'
        ]);

        $create = Menu::create([
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

        $update = Menu::findOrFail($id)->update([
            'name' => $request->name,
            'url' => $request->url,
            'parent' => $request->parent
        ]);

        return redirect('admin/menu')->with('message', 'Data menu berhasil diubah');
    }

    public function menu_destroy($id){
        $delete = Menu::findOrFail($id)->delete();
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

    public function level_update($id, Request $request){
        
        $this->validate($request, [
            'name' => $request->deskripsi == $request->deskripsiold ? 'required' : 'required|unique:level,name' 
        ]);

        Level::where('id', $id)->update([
            'name' => $request->deskripsi
        ]);

        return redirect('admin/level/'.$id)->with('message', 'Level berhasil diubah!');
    }

    public function level_destroy($id){
        $delete = Level::findOrFail($id)->delete();
        return redirect('admin/level/'.$id)->with('message', 'Level berhasil dihapus!');
    }

    public function level_access($id){
        $access = DB::table('akses')->where('level_id', $id)->get();
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

    public function users_store(Request $request){
        $this->validate($request, [
            'nama_lengkap' => 'required',
            'username' => 'required|unique:users,username',
            'id_branch' => 'required',
            'password' => 'required|string|min:5',
            'password_confirm' => 'required|string|same:password|min:5',
            'id_level' => 'required'
        ]);

        $create = User::create([
            'username' => $request->username,
            'nama_lengkap' => $request->nama_lengkap,
            'tgl_lahir' => $request->tgl_lahir,
            'tempat_lahir' => $request->tempat_lahir,
            'alamat' => $request->alamat,
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password),
            'id_branch' => $request->id_branch,
            'kode_branch' => Brimc::get_branch_code($request->id_branch),
            'nama_branch' => Brimc::get_branch_name($request->id_branch),
            'id_level' => $request->id_level,
            'user_type'  => $request->user_type,
            'active' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        return response()->json($create);
    }

    public function users_update($id, Request $request){
        $this->validate($request, [
            'nama_lengkap' => 'required',
            'username' => $request->username == $request->usernameold ? 'required' : 'required|unique:users,username',
            'id_branch' => 'required',
            'id_level' => 'required',
            'active' => 'required'
        ]);

      $edit = User::where('id_user', $id)->update([
            'username' => $request->username,
            'nama_lengkap' => $request->nama_lengkap,
            'tgl_lahir' => $request->tgl_lahir,
            'tempat_lahir' => $request->tempat_lahir,
            'alamat' => $request->alamat,
            'mobile' => $request->mobile,
            'id_branch' => $request->id_branch,
            'kode_branch' => Brimc::get_branch_code($request->id_branch),
            'nama_branch' => Brimc::get_branch_name($request->id_branch),
            'id_level' => $request->id_level,
            'user_type' => $request->user_type,
            'active' => $request->active,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return response()->json($edit);
    }

    public function users_update_password($id, Request $request){
        
        $this->validate($request, [
            'password' => 'required|string|min:5',
            'password_confirm' => 'required|string|same:password|min:5'
        ]);

        $edit = User::where('id_user', $id)->update([
            'password' => Hash::make($request->password),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return response()->json($edit);
    }

    public function users_delete($id){
        $delete = User::where('id_user', $id)->delete();
        return response()->json($delete);
    }

    public function logout(){
    	Auth::logout();
    	return redirect('login');
    }
}
