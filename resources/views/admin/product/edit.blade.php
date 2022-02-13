@extends('layouts.admin.app')

@section('breadcrumb')
    Product
@endsection

@section('page_name')
    Product
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
          <div class="col-12">
            <div class="card my-4">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                  <h6 class="text-white text-capitalize ps-3">Edit Product</h6>
                </div>
              </div>
              <div class="card-body px-5 pb-3">
                <form action="{{route('products.update', $product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label" for="name">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ !empty(old('name')) ? old('name') : $product->name }}" id="name" name="name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <label class="form-label" for="category">Category</label>
                    <div class="mb-4">
                        <select id="selectCategory" class="form-control @error('category') is-invalid @enderror" name="category" aria-label="Default select example">
                                @foreach ($categories as $category)
                                    <option {{ $product->category_id == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                        </select>
                        @error('category')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <label class="form-label" for="short_description">Short Description</label>
                    <div class="input-group input-group-dynamic mb-3">
                        <textarea name="short_description" rows="3" class="form-control @error('short_description') is-invalid @enderror" placeholder="Write Short Description Here...">{{ !empty(old('short_description')) ? old('short_description') : $product->short_description }}</textarea>
                        @error('short_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> 
                    <label class="form-label" for="description">Description</label>
                    <div class="input-group input-group-dynamic mb-3">
                        <textarea name="description" rows="3" class="form-control @error('description') is-invalid @enderror" placeholder="Write Description Here...">{{ !empty(old('description')) ? old('description') : $product->description }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>                    
                    <div class="form-check form-check-info text-start ps-0 mb-3">
                        <input class="form-check-input" type="checkbox" id="status" value="" name="status" {{ $product->status == 1 ? 'checked' : '' }}>
                        <label class="form-check-label" for="status">
                             <span class="text-dark font-weight-bolder">Status</span>
                        </label>&emsp;&emsp;
                        <input class="form-check-input" type="checkbox" id="trending" value="" name="trending" {{ $product->trending == 1 ? 'checked' : '' }}>
                        <label class="form-check-label" for="trending">
                             <span class="text-dark font-weight-bolder">Trending</span>
                        </label>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-3">
                            <div class="input-group input-group-outline">
                                <label class="form-label" for="qty">Quantity</label>
                                <input type="number" class="form-control @error('qty') is-invalid @enderror" value="{{ !empty(old('qty')) ? old('qty') : $product->qty }}" id="qty" name="qty">
                                @error('qty')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="input-group input-group-outline">
                                <label class="form-label" for="tax">TAX</label>
                                <input type="number" class="form-control @error('tax') is-invalid @enderror" value="{{ !empty(old('tax')) ? old('tax') : $product->tax }}" id="tax" name="tax">
                                @error('tax')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col-6 mb-3">
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label" for="original_price">Original Price</label>
                                <input type="number" class="form-control @error('original_price') is-invalid @enderror" value="{{ !empty(old('original_price')) ? old('original_price') : $product->original_price }}" id="original_price" name="original_price">
                                @error('original_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label" for="selling_price">Selling Price</label>
                                <input type="number" class="form-control @error('selling_price') is-invalid @enderror" value="{{ !empty(old('selling_price')) ? old('selling_price') : $product->selling_price }}" id="selling_price" name="selling_price">
                                @error('selling_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>              
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label" for="meta_title">Meta Title</label>
                        <input type="text" class="form-control @error('meta_title') is-invalid @enderror" value="{{ !empty(old('meta_title')) ? old('meta_title') : $product->meta_title }}" id="meta_title" name="meta_title">
                        @error('meta_title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <label class="form-label" for="meta_keywords">Meta Keywords</label>
                    <div class="input-group input-group-dynamic mb-3">
                        <textarea name="meta_keywords" rows="3" class="form-control @error('meta_keywords') is-invalid @enderror" placeholder="Write Meta Keywords Here...">{{ !empty(old('meta_keywords')) ? old('meta_keywords') : $product->meta_keywords }}</textarea>
                        @error('meta_keywords')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <label class="form-label" for="meta_description">Meta Description</label>
                    <div class="input-group input-group-dynamic mb-3">
                        <textarea name="meta_description" rows="3" class="form-control @error('meta_description') is-invalid @enderror" placeholder="Write Meta Description Here...">{{ !empty(old('meta_description')) ? old('meta_description') : $product->meta_description }}</textarea>
                        @error('meta_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <label class="form-label" for="name">Image</label>
                    <div class="input-group input-group-outline mb-3">
                        {{--  <label class="form-label" for="name">Image</label>  --}}
                        <input type="file" onchange="loadFile(event)" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-group">
                        <img id="preview" class="img-fluid {{ isset($product->image) ? '' : 'd-none' }}" src="{{ isset($product->image) ? asset('uploads/product/'.$product->image) : '' }}"
                            height="100" width="100">
                    </div>
                    
                    <div class="text-center">
                        <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-5">UPDATE</button>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>
@endsection

@push('js')

    <script>
        // Image Preview Start
        let loadFile = function(event) {
            let preview = document.getElementById('preview');
            preview.src = URL.createObjectURL(event.target.files[0]);
            preview.onload = function() {
                preview.style.height = '100px';
                preview.style.width = '100px';
               
            URL.revokeObjectURL(preview.src) // free memory
            }
        };
        // Image Preview End

        $(document).ready(function() {
            $('#selectCategory').select2({
                placeholder: 'Select a Category',
                allowClear: true
            });
        });  
    </script>
    
@endpush