<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $result['data']=Color::all();
        return view('admin/color', $result);
    }

    public function manage_color($id='')
    {

        if($id>0){
            $arr = Color::where(['id'=>$id])->get();

            $result['color_name']=$arr['0']->color_name;
            $result['status']=$arr['0']->status;
            $result['id']=$arr['0']->id;
        }
        else{
            
            $result['color_name']='';
            $result['status']='';
            $result['id']=0;
        }

        return View('admin.manage_color', $result);
    }

    public function manage_color_process(Request $request)
    {
        //return $request->post();
        
        $request->validate([
            'color_name'=>'required|unique:colors,color_name,'.$request->post('id'),
        ]);

        if($request->post('id')>0){
            $model=Color::find($request->post('id'));
            $msg="Color Updated";
        }
        else
        {
            $model = new Color();
            $msg="Color Inserted";
        }
            $model->color_name=$request->post('color_name');
            $model->status=1;
            $model->save();
            $request->session()->flash('message',$msg);
        
        return redirect('admin/color');

    }

    public function delete(Request $request, $id)
    {
        $model=Color::find($id);
        $model->delete();
        $request->session()->flash('message', 'Color Deleted');
        return redirect('admin/color');
    }

    public function status(Request $request, $status, $id)
    {
        // echo $status;
        // echo $id;

        $model=Color::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('message', 'Color Status Updated');
        return redirect('admin/color');

    }
}
