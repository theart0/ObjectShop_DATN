<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\permission;
use App\Models\role;
use Illuminate\Http\Request;

class roleController extends Controller
{
    public $role;
    public $permission;
    public function __construct(role $role,permission $permission){
        $this->role = $role;
        $this->permission = $permission;
    }
    public function index(){
        $list_role = $this->role->orderBy('id','desc')->paginate(6);
        return view('admin.role.index',compact('list_role'));
    }
    public function create(){
        $list_permission_parent=$this->permission->where('parent_id',0)->get();
        return view('admin.role.create',compact('list_permission_parent'));
    }
    public function store(Request $request){
        $new_role = $this->role->create([
            "name"=> $request->name
        ]);
        if(!empty( $request->permissions)){
            foreach ( $request->permissions as $permission_id) {
                $new_role->permission()->attach($permission_id);
            }
        }
        return redirect()->route('role.index');
    }
    public function edit($id){
        $list_permission_parent=$this->permission->where('parent_id',0)->get();
        $item_role=$this->role->find($id);
        return view('admin.role.edit',compact('item_role','list_permission_parent'));
    }
    public function update(Request $request,$id){
        $this->role->find($id)->update([
            "name"=> $request->name
        ]);
        $item_role = $this->role->find($id);
        $arr_permission = [];
        if(!empty( $request->permissions)){
            foreach ( $request->permissions as $permission_id) {
                $arr_permission[] =  $permission_id;
            }
        }
        $item_role->permission()->sync($arr_permission);
        return redirect()->route('role.index');
    }
    public function delete($id){
        $this->role->find($id)->delete();
        return 1;
    }
}
