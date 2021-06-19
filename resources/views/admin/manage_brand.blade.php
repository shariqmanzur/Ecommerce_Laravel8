@extends('layouts/backend')
@section('page_title', 'Brand')
@section('brand_select', 'active')
@section('content')

 <!-- MAIN CONTENT-->
 <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Manage Brand</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            @if($id>0)
                                            <h3 class="text-center title-2">Update Brand</h3>
                                            @else
                                            <h3 class="text-center title-2">Add Brand</h3>
                                            @endif     
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-lg-3"></div>
                                            <div class="col-lg-6">
                                            <form action="{{ route('brand.manage_brand_process') }}" method="post">
                                            @csrf
                                                <div class="form-group">
                                                    <label for="brand_name" class="control-label mb-1">Brand Name</label>
                                                    <input id="brand_name" value="{{ $brand_name }}" name="brand_name" type="text" class="form-control" required>                                            </div>
                                                    @error('brand_name')
                                                    <p class="text-danger text-center">{{$message}}</p>
                                                    @enderror
                                                <div>
                                                <div class="form-group">
                                                    <label for="brand_slug" class="control-label mb-1">Brand Slug</label>
                                                    <input id="brand_slug" value="{{ $brand_slug }}" name="brand_slug" type="text" class="form-control" required>                                            </div>
                                                    @error('brand_slug')
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
                                                <a href="{{ url('admin/brand') }}">
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