<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $result['data']=Brand::all();
        return view('admin/brand', $result);
    }

    public function manage_brand($id='')
    {

        if($id>0){
            $arr = Brand::where(['id'=>$id])->get();

            $result['brand_name']=$arr['0']->brand_name;
            $result['brand_slug']=$arr['0']->brand_slug;
            $result['id']=$arr['0']->id;
        }
        else{
            
            $result['brand_name']='';
            $result['brand_slug']='';
            $result['id']=0;
        }

        return View('admin.manage_brand', $result);
    }

    public function manage_brand_process(Request $request)
    {
        //return $request->post();
        
        $request->validate([
            'brand_name'=>'required',
            'brand_slug'=>'required|unique:brands,brand_slug,'.$request->post('id'),
        ]);

        if($request->post('id')>0){
            $model=Brand::find($request->post('id'));
            $msg="Brand Updated";
        }
        else
        {
            $model = new Brand();
            $msg="Brand Inserted";
        }
            $model->brand_name=$request->post('brand_name');
            $model->brand_slug=$request->post('brand_slug');
            $model->status=1;
            $model->save();
            $request->session()->flash('message',$msg);
        
        return redirect('admin/brand');

    }

    public function delete(Request $request, $id)
    {
        $model=Brand::find($id);
        $model->delete();
        $request->session()->flash('message', 'Brand Deleted');
        return redirect('admin/brand');
    }

    public function status(Request $request, $status, $id)
    {
        // echo $status;
        // echo $id;

        $model=Brand::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('message', 'Brand Status Updated');
        return redirect('admin/brand');

    }
}
