<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\permission;
use Illuminate\Http\Request;

class permissionController extends Controller
{
    public $permission;
    public function __construct(permission $permission){
        $this->permission = $permission;
    }
    public function index(){
        $list_permission = $this->permission->orderBy('id','desc')->paginate(6);
        return view('admin.permission.index',compact('list_permission'));
    }
    public function create(){
        $list_permission=$this->permission->all();
        return view('admin.permission.create',compact('list_permission'));
    }
    public function store(Request $request){
        $key_code = "";
        $permission_parent = $this->permission->find($request->resource_id);
        if(!$permission_parent = $this->permission->find($request->resource_id)){
            $key_code = $request->name;
        }else{
            $key_code = $permission_parent->name.'_'.$request->name;
        }
        $this->permission->create([
            "name"=> $request->name,
            "parent_id"=>$request->resource_id, 
            "key_code"=> $key_code
        ]);
        return redirect()->route('permission.index');
    }

    public function edit($id){
        $item_permission=$this->permission->find($id);
        $list_permission=$this->permission->all();
        return view('admin.permission.edit',compact('item_permission','list_permission'));
    }
    public function update(Request $request,$id){
        $key_code = "";
        $permission_parent = $this->permission->find($request->resource_id);
        if(!$permission_parent = $this->permission->find($request->resource_id)){
            $key_code = $request->name;
        }else{
            $key_code = $permission_parent->name.'_'.$request->name;
        }
        $this->permission->find($id)->update([
            "name"=> $request->name,
            "parent_id"=>$request->resource_id, 
            "key_code"=> $key_code
        ]);
        return redirect()->route('permission.index');
    }
    public function delete($id){
        $this->permission->find($id)->delete();
        return 1;
    }
}
