<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class userController extends Controller
{
    //
    public $users;
    public $roles;
    public function __construct(User $user,role $role)
    {
        $this->users=$user;
        $this->roles =$role;
        
    }
    public function index(){
       $list_user= $this->users->latest()->paginate(6);
        return view('admin.user.index',compact('list_user'));
    }
    public function create(){
      $list_role=  $this->roles->all();
        return view('admin.user.create',compact('list_role'));
    }
    public function store(Request $request){
        if($request->password == $request->password2){
            $image_path = "";
            if($request->hasFile('image')){
                $file = $request->file('image');
                $image_hash_name = Str::random(20).'.'.$file->extension();
                $store = $file->storeAs('public/user/1',$image_hash_name);    
                $image_path = Storage::url($store);
            }
            $new_user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'password' => Hash::make( $request->password),
                'image_path' => $image_path]);

            $list_role = $request->roles;

            if(!empty($list_role)){
               foreach($list_role as $item_role){
                $new_user->role()->attach($item_role);
               }
            }
            return redirect()->route('user.index');
        }else{
            return redirect()->route('user.create')->with('message','Nhập lại mật khẩu không khớp !');
        }
    }
    public function edit($id){
        $item_user =$this->users->find($id);
        $list_role=  $this->roles->all();
        return view('admin.user.edit',compact('item_user','list_role'));
    }
    public function form_login(){
        return view('admin.login.signIn');
    }
    public function sign_in(Request $request){
        if(auth()->check()){
            return redirect()->route('dashboard.index');
        }else{
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                return redirect()->route('dashboard.index');
            }else{
                return redirect()->route('login.form_login')->with('message','Tài khoản hoặc mật khẩu không đúng !');
            }
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login.form_login');
    }
    public function update(Request $request,$id){

        if($request->hasFile('image')){
            $file = $request->file('image');
            $image_hash_name = Str::random(20).'.'.$file->extension();
            $store = $file->storeAs('public/user/1',$image_hash_name);    
            $image_path = Storage::url($store);
            User::find($id)->update(['image_path' => $image_path]);
        }
        User::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address]);

        $list_role = $request->roles;
        $arr_role = [];
        if(!empty($list_role)){
            foreach($list_role as $item_role){
                $arr_role[] = $item_role;
            }
        }
        $item_user = User::find($id);
        $item_user->role()->sync($arr_role);
        return redirect()->route('user.index');
    }
    public function delete($id){
        $this->users->find($id)->delete();
        return 1;
    }
}
