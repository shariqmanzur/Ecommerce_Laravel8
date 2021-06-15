<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        $result['data']=Coupon::all();
        return view('admin/coupon', $result);
    }

    public function manage_coupon($id='')
    {

        if($id>0){
            $arr = Coupon::where(['id'=>$id])->get();

            $result['coupon_title']=$arr['0']->coupon_title;
            $result['coupon_code']=$arr['0']->coupon_code;
            $result['coupon_value']=$arr['0']->coupon_value;
            $result['id']=$arr['0']->id;
        }
        else{
            
            $result['coupon_title']='';
            $result['coupon_code']='';
            $result['coupon_value']='';
            $result['id']=0;
        }

        return View('admin.manage_coupon', $result);
    }

    public function manage_coupon_process(Request $request)
    {
        //return $request->post();
        
        $request->validate([
            'coupon_title'=>'required',
            'coupon_code'=>'required|unique:coupons,coupon_code,'.$request->post('id'),
            'coupon_value'=>'required',
        ]);

        if($request->post('id')>0){
            $model=Coupon::find($request->post('id'));
            $msg="Coupon Updated";
        }
        else
        {
            $model = new Coupon();
            $msg="Coupon Inserted";
        }
            $model->coupon_title=$request->post('coupon_title');
            $model->coupon_code=$request->post('coupon_code');
            $model->coupon_value=$request->post('coupon_value');
            $model->status=1;
            $model->save();
            $request->session()->flash('message',$msg);
        
        return redirect('admin/coupon');

    }

    public function delete(Request $request, $id)
    {
        $model=Coupon::find($id);
        $model->delete();
        $request->session()->flash('message', 'Coupon Deleted');
        return redirect('admin/coupon');
    }

    public function status(Request $request, $status, $id)
    {
        // echo $status;
        // echo $id;

        $model=Coupon::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('message', 'Coupon Status Updated');
        return redirect('admin/coupon');

    }    
}
