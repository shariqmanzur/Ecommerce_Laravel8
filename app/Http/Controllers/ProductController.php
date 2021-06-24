<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $result['data']=Product::all();
        return view('admin/product', $result);
    }

    public function manage_product($id='')
    {

        if($id>0){
            $arr = Product::where(['id'=>$id])->get();

            $result['category_id']=$arr['0']->category_id;
            $result['product_name']=$arr['0']->product_name;
            $result['product_slug']=$arr['0']->product_slug;
            $result['product_image']=$arr['0']->product_image;
            $result['brand_id']=$arr['0']->brand_id;
            $result['product_model']=$arr['0']->product_model;
            $result['product_shortdesc']=$arr['0']->product_shortdesc;
            $result['product_desc']=$arr['0']->product_desc;
            $result['product_keywords']=$arr['0']->product_keywords;
            $result['product_technical_spec']=$arr['0']->product_technical_spec;
            $result['product_uses']=$arr['0']->product_uses;
            $result['product_warranty']=$arr['0']->product_warranty;
            $result['id']=$arr['0']->id;
        }
        else{
            
            $result['category_id']='';
            $result['product_name']='';
            $result['product_slug']='';
            $result['product_image']='';
            $result['brand_id']='';
            $result['product_model']='';
            $result['product_shortdesc']='';
            $result['product_desc']='';
            $result['product_keywords']='';
            $result['product_technical_spec']='';
            $result['product_uses']='';
            $result['product_warranty']='';
            $result['status']='';
            $result['id']=0;
        }

        $result['category_name']=DB::table('categories')->where(
            ['status'=>1])->get();
            // echo "<pre>";
            // print_r($result['category_name']);
            // echo "</pre>";
            // die();

        $result['brand_name']=DB::table('brands')->where(
            ['status'=>1])->get();
            // echo "<pre>";
            // print_r($result['brand_name']);
            // echo "</pre>";
            // die();

        return View('admin.manage_product', $result);
    }

    public function manage_product_process(Request $request)
    {
        //return $request->post();

        if($request->post('id')>0){
            $image_validation = "mimes:jpeg,jpg,png";
        }
        else
        {
            $image_validation = "required|mimes:jpeg,jpg,png";
        }
        
        $request->validate([
            'product_name'=>'required',
            'product_image'=> $image_validation,
            'product_slug'=>'required|unique:products,product_slug,'.$request->post('id'),
        ]);

        if($request->post('id')>0){
            $model=Product::find($request->post('id'));
            $msg="Product Updated";
        }
        else
        {
            $model = new Product();
            $msg="Product Inserted";
        }

        if($request->hasfile('product_image')){
            $product_image=$request->file('product_image');
            $ext=$product_image->extension();
            $image_name=time().'.'.$ext;
            $product_image->storeAs('/public/media', $image_name);
            $model->product_image=$image_name;
        }

            $model->category_id=$request->post('category_id');
            $model->product_name=$request->post('product_name');
            $model->product_slug=$request->post('product_slug');
            //$model->product_image=$request->post('product_image');
            $model->brand_id=$request->post('brand_id');
            $model->product_model=$request->post('product_model');
            $model->product_shortdesc=$request->post('product_shortdesc');
            $model->product_desc=$request->post('product_desc');
            $model->product_keywords=$request->post('product_keywords');
            $model->product_technical_spec=$request->post('product_technical_spec');
            $model->product_uses=$request->post('product_uses');
            $model->product_warranty=$request->post('product_warranty');
            $model->status=1;
            $model->save();
            $request->session()->flash('message',$msg);
        
        return redirect('admin/product');

    }

    public function delete(Request $request, $id)
    {
        $model=Product::find($id);
        $model->delete();
        $request->session()->flash('message', 'Product Deleted');
        return redirect('admin/product');
    }

    public function status(Request $request, $status, $id)
    {
        // echo $status;
        // echo $id;

        $model=Product::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('message', 'Product Status Updated');
        return redirect('admin/product');

    }
}
