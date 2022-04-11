<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\color;
use App\Models\product;
use App\Models\size;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class productController extends Controller
{
    //
    public $category;
    public $product;
    public $size;
    public $color;
    public function __construct(category $category,product $product,size $size,color $color)
    {
        $this->category=$category;
        $this->product=$product;
        $this->size=$size;
        $this->color=$color;
    }
        public function index()
        {
            $list_product= $this->product->latest()->paginate(6);
            return view('admin.product.index',compact('list_product'));
        }

    public function create(){
        $list_category = $this->category->all();
        return view('admin.product.create',compact('list_category'));
    }
    public function store(Request $request){
            $insertData =[
                "name"=>$request->name,
                "price_origin"=>$request->price_origin,
                "price_current"=>$request->price_current,
                "desc"=>$request->desc,
                "quantity"=>$request->quantity,
                "user_id"=>auth()->user()->id,
                "category_id"=>$request->category,
            ];
            if($request->hasFile('image')){
                $file = $request->file('image');
                $FileNameHash = Str::random($length=20).'.'.$file->extension();
                $path = $file->storeAs('public/product',$FileNameHash);
                $insertData['image_path'] =  Storage::url($path);

            }
           $product = $this->product->create($insertData);

           if (!empty($request->colors)){
            foreach($request->colors as $colorName){
                $this->color->create([
                    'name' => $colorName,
                    'product_id' => $product->id
                ]);
               }
           }
           if (!empty($request->sizes)){
            foreach($request->sizes as $sizeName){
                $this->size->create([
                    'name' => $sizeName,
                    'product_id' => $product->id
                ]);
               }
           }
           return redirect()->route('product.index');

    }

    public function edit($id){
        $item_product= $this->product->find($id);
        $list_category = $this->category->all();
        return view('admin.product.edit',compact('list_category','item_product'));
    }

    public function update($id,Request $request){
        $insertData =[
            "name"=>$request->name,
            "price_origin"=>$request->price_origin,
            "price_current"=>$request->price_current,
            "desc"=>$request->desc,
            "user_id"=>1,
            "quantity"=>$request->quantity,
            // "user_id"=>auth()->id(),
            "category_id"=>$request->category,
        ];
        if($request->hasFile('image')){
            $file = $request->file('image');
            $FileNameHash = Str::random($length=20).'.'.$file->extension();
            $path = $file->storeAs('public/product',$FileNameHash);
            $insertData['image_path'] =  Storage::url($path);

        }
       $this->product->find($id)->update($insertData);

       $product = $this->product->find($id);

       if (!empty($request->colors)){
            $colors = collect($request->colors);
            foreach($product->color as $item_color){
                if($colors->contains($item_color->name)){

                }else{
                    $item_color->delete();
                }
            }

            foreach($request->colors as $colorName){

                if($product->color->contains('name',$colorName)){

                }else{
                    $this->color->create([
                        'name' => $colorName,
                        'product_id' => $product->id
                    ]);
                }
            }
       }

       if (!empty($request->sizes)){
            $sizes = collect($request->sizes);
            foreach($product->size as $item_size){
                if($sizes->contains($item_size->name)){

                }else{
                    $item_size->delete();
                }
            }
            foreach($request->sizes as $sizeName){
                if($product->size->contains('name',$sizeName)){

                }else{
                    $this->size->create([
                        'name' => $sizeName,
                        'product_id' => $product->id
                    ]);
                }
           }
       }
       return redirect()->route('product.index');
    }

    public function delete($id){
        $product = $this->product->find($id);
        $product->color()->delete();
        $product->size()->delete();
        $this->product->find($id)->delete();
        return 1;
    }
}
