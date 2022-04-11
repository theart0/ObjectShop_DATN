<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public $category;
    public function __construct(category $category){
        $this->category = $category;
    }
    public function index(){
        $list_category = $this->category->orderBy('id','desc')->paginate(6);
        return view('admin.category.index',compact('list_category'));
    }
    public function create(){
        return view('admin.category.create');
    }
    public function store(Request $request){
        $this->category->create([
            "name"=> $request->name ,
            "desc"=>$request->desc 
        ]);
        return redirect()->route('category.index');
    }
    public function edit($id){
        $item_category=$this->category->find($id);
        return view('admin.category.edit',compact('item_category'));
    }
    public function update(Request $request,$id){
        $arr = array(
            "name"=> $request->name,
            "desc"=>$request->desc 
        );
        $this->category->find($id)->update($arr);
        return redirect()->route('category.index');
    }
    public function delete($id){
        $this->category->find($id)->delete();
        return 1;
    }
}
