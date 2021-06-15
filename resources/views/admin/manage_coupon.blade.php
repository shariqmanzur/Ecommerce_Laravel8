@extends('layouts/backend')
@section('page_title', 'Coupon')
@section('counpon_select', 'active')
@section('content')

 <!-- MAIN CONTENT-->
 <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Manage Coupon</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            @if($id>0)
                                            <h3 class="text-center title-2">Update Coupon</h3>
                                            @else
                                            <h3 class="text-center title-2">Add Coupon</h3>
                                            @endif     
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-lg-3"></div>
                                            <div class="col-lg-6">
                                            <form action="{{ route('coupon.manage_coupon_process') }}" method="post">
                                            @csrf
                                                <div class="form-group">
                                                    <label for="coupon_title" class="control-label mb-1">Coupon Title</label>
                                                    <input id="coupon_title" value="{{ $coupon_title }}" name="coupon_title" type="text" class="form-control" required>                                            </div>
                                                    @error('coupon_title')
                                                    <p class="text-danger text-center">{{$message}}</p>
                                                    @enderror
                                                <div>
                                                <div class="form-group">
                                                    <label for="coupon_code" class="control-label mb-1">Coupon Code</label>
                                                    <input id="coupon_code" value="{{ $coupon_code }}" name="coupon_code" type="text" class="form-control" required>                                            </div>
                                                    @error('coupon_code')
                                                    <p class="text-danger text-center">{{$message}}</p>
                                                    @enderror
                                                <div>
                                                <div class="form-group">
                                                    <label for="coupon_value" class="control-label mb-1">Coupon Value</label>
                                                    <input id="coupon_value" value="{{ $coupon_value }}" name="coupon_value" type="text" class="form-control" required>                                            </div>
                                                    @error('coupon_value')
                                                    <p class="text-danger text-center">{{$message}}</p>
                                                    @enderror
                                                    <div>
                                                <div class="form-group">
                                                    <input id="id" value="{{ $id }}" name="id" type="hidden">                                            
                                                </div>
                                                <div>
                                                @if($id>0)
                                                    <button type="submit" class="btn btn-outline-success">Update</button>
                                                @else
                                                    <button type="submit" class="btn btn-outline-success">Add</button>
                                                @endif
                                                <a href="{{ url('admin/coupon') }}">
                                                    <button type="button" class="btn btn-outline-secondary">Back</button>
                                                </a>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-lg-3"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection()