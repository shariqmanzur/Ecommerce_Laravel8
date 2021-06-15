@extends('layouts/backend')
@section('page_title', 'Category')
@section('category_select', 'active')
@section('content')

 <!-- MAIN CONTENT-->
 <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Manage Category</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            @if($id>0)
                                            <h3 class="text-center title-2">Update Category</h3>
                                            @else
                                            <h3 class="text-center title-2">Add Category</h3>
                                            @endif     
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-lg-3"></div>
                                            <div class="col-lg-6">
                                            <form action="{{ route('category.manage_category_process') }}" method="post">
                                            @csrf
                                                <div class="form-group">
                                                    <label for="category_name" class="control-label mb-1">Category Name</label>
                                                    <input id="category_name" value="{{ $category_name }}" name="category_name" type="text" class="form-control" required>                                            </div>
                                                    @error('category_name')
                                                    <p class="text-danger text-center">{{$message}}</p>
                                                    @enderror
                                                <div>
                                                <div class="form-group">
                                                    <label for="category_slug" class="control-label mb-1">Category Slug</label>
                                                    <input id="category_slug" value="{{ $category_slug }}" name="category_slug" type="text" class="form-control" required>                                            </div>
                                                    @error('category_slug')
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
                                                <a href="{{ url('admin/category') }}">
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