<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function index()
    {
        $result['data']=Size::all();
        return view('admin/size', $result);
    }

    public function manage_size($id='')
    {

        if($id>0){
            $arr = Size::where(['id'=>$id])->get();

            $result['size_name']=$arr['0']->size_name;
            $result['status']=$arr['0']->status;
            $result['id']=$arr['0']->id;
        }
        else{
            
            $result['size_name']='';
            $result['status']='';
            $result['id']=0;
        }

        return View('admin.manage_size', $result);
    }

    public function manage_size_process(Request $request)
    {
        //return $request->post();
        
        $request->validate([
            'size_name'=>'required|unique:sizes,size_name,'.$request->post('id'),
        ]);

        if($request->post('id')>0){
            $model=Size::find($request->post('id'));
            $msg="Size Updated";
        }
        else
        {
            $model = new Size();
            $msg="Size Inserted";
        }
            $model->size_name=$request->post('size_name');
            $model->status=1;
            $model->save();
            $request->session()->flash('message',$msg);
        
        return redirect('admin/size');

    }

    public function delete(Request $request, $id)
    {
        $model=Size::find($id);
        $model->delete();
        $request->session()->flash('message', 'Size Deleted');
        return redirect('admin/size');
    }

    public function status(Request $request, $status, $id)
    {
        // echo $status;
        // echo $id;

        $model=Size::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('message', 'Size Status Updated');
        return redirect('admin/size');

    }
}
