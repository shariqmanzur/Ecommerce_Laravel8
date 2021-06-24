@extends('layouts/backend')
@section('page_title', 'Product')
@section('product_select', 'active')
@section('content')

@if($id>0){
    {{ $image_required="" }}
}
@else
{
    {{ $image_required="required" }}
}
@endif

 <!-- MAIN CONTENT-->
 <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Manage Product</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            @if($id>0)
                                            <h3 class="text-center title-2">Update Product</h3>
                                            @else
                                            <h3 class="text-center title-2">Add Product</h3>
                                            @endif     
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-lg-3"></div>
                                            <div class="col-lg-6">
                                            <form action="{{ route('product.manage_product_process') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                                <div class="form-group">
                                                    <label for="category_id" class="control-label mb-1">Category Name</label>
                                                    <select id="category_id" name="category_id" class="form-control" required>
                                                        <option value="">Select Category</option>
                                                        @foreach($category_name as $list)
                                                            @if($category_id==$list->id)
                                                                <option selected value="{{ $list->id }}">{{ $list->category_name }}</option>
                                                            @else
                                                                <option value="{{ $list->id }}">{{ $list->category_name }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    @error('category_id')
                                                    <p class="text-danger text-center">{{$message}}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="product_name" class="control-label mb-1">Product Name</label>
                                                    <input id="product_name" value="{{ $product_name }}" name="product_name" type="text" class="form-control" required>                                            
                                                    @error('product_name')
                                                    <p class="text-danger text-center">{{$message}}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="product_slug" class="control-label mb-1">Product Slug</label>
                                                    <input id="product_slug" value="{{ $product_slug }}" name="product_slug" type="text" class="form-control" required>                                            
                                                    @error('product_slug')
                                                    <p class="text-danger text-center">{{$message}}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="product_image" class="control-label mb-1">Product Image</label>
                                                    <input id="product_image" name="product_image" type="file" class="form-control" {{ $image_required }}>                                            
                                                    @error('product_image')
                                                    <p class="text-danger text-center">{{$message}}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="brand_id" class="control-label mb-1">Brand Name</label>
                                                    <select id="brand_id" name="brand_id" class="form-control" required>
                                                        <option value="">Select Brand</option>
                                                        @foreach($brand_name as $list)
                                                        @if($brand_id==$list->id)
                                                            <option selected value="{{ $list->id }}">{{ $list->brand_name }}</option>
                                                        @else
                                                            <option value="{{ $list->id }}">{{ $list->brand_name }}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                    @error('brand_id')
                                                    <p class="text-danger text-center">{{$message}}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="product_model" class="control-label mb-1">Product Model</label>
                                                    <input id="product_model" value="{{ $product_model }}" name="product_model" type="text" class="form-control" required>                                            
                                                    @error('product_model')
                                                    <p class="text-danger text-center">{{$message}}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="product_shortdesc" class="control-label mb-1">Product Short Description</label>
                                                    <textarea id="product_shortdesc" name="product_shortdesc" class="form-control" required>{{ $product_shortdesc }}</textarea>                                        
                                                    @error('product_shortdesc')
                                                    <p class="text-danger text-center">{{$message}}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="product_desc" class="control-label mb-1">Product Description</label>
                                                    <textarea id="product_desc" name="product_desc" class="form-control" required>{{ $product_desc }}</textarea>                                        
                                                    @error('product_desc')
                                                    <p class="text-danger text-center">{{$message}}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="product_keywords" class="control-label mb-1">Product Keywords</label>
                                                    <textarea id="product_keywords" name="product_keywords" class="form-control" required>{{ $product_keywords }}</textarea>                                        
                                                    @error('product_keywords')
                                                    <p class="text-danger text-center">{{$message}}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="product_technical_spec" class="control-label mb-1">Product Technical Specification</label>
                                                    <textarea id="product_technical_spec" name="product_technical_spec" class="form-control" required>{{ $product_technical_spec }}</textarea>                                        
                                                    @error('product_technical_spec')
                                                    <p class="text-danger text-center">{{$message}}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="product_uses" class="control-label mb-1">Product Uses</label>
                                                    <textarea id="product_uses" name="product_uses" class="form-control" required>{{ $product_uses }}</textarea>                                        
                                                    @error('product_uses')
                                                    <p class="text-danger text-center">{{$message}}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="product_warranty" class="control-label mb-1">Product Warranty</label>
                                                    <textarea id="product_warranty" name="product_warranty" class="form-control" required>{{ $product_warranty }}</textarea>                                        
                                                    @error('product_warranty')
                                                    <p class="text-danger text-center">{{$message}}</p>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <input id="id" value="{{ $id }}" name="id" type="hidden">                                            
                                                </div>
                                                <div>
                                                @if($id>0)
                                                    <button type="submit" class="btn btn-outline-success">Update</button>
                                                @else
                                                    <button type="submit" class="btn btn-outline-success">Add</button>
                                                @endif
                                                <a href="{{ url('admin/product') }}">
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