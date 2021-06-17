@extends('layouts/backend')
@section('page_title', 'Size')
@section('size_select', 'active')
@section('content')

 <!-- MAIN CONTENT-->
 <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Manage Size</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            @if($id>0)
                                            <h3 class="text-center title-2">Update Size</h3>
                                            @else
                                            <h3 class="text-center title-2">Add Size</h3>
                                            @endif     
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-lg-3"></div>
                                            <div class="col-lg-6">
                                            <form action="{{ route('size.manage_size_process') }}" method="post">
                                            @csrf
                                                <div class="form-group">
                                                    <label for="size_name" class="control-label mb-1">Size Name</label>
                                                    <input id="size_name" value="{{ $size_name }}" name="size_name" type="text" class="form-control" required>                                            </div>
                                                    @error('size_name')
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
                                                <a href="{{ url('admin/size') }}">
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