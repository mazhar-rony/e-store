@extends('layouts.admin.app')

@section('breadcrumb')
    Category
@endsection

@section('page_name')
    Category
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
          <div class="col-12">
            <div class="card my-4">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                  <h6 class="text-white text-capitalize ps-3">Create New Category</h6>
                </div>
              </div>
              <div class="card-body px-5 pb-3">
                <form action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label" for="name">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name" name="name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <label class="form-label" for="description">Description</label>
                    <div class="input-group input-group-dynamic mb-3">
                        <textarea name="description" rows="3" class="form-control @error('description') is-invalid @enderror" placeholder="Write Description Here...">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-check form-check-info text-start ps-0 mb-3">
                        <input class="form-check-input" type="checkbox" id="status" value="" name="status">
                        <label class="form-check-label" for="status">
                             <span class="text-dark font-weight-bolder">Status</span>
                        </label>&emsp;&emsp;
                        <input class="form-check-input" type="checkbox" id="popular" value="" name="popular">
                        <label class="form-check-label" for="popular">
                             <span class="text-dark font-weight-bolder">Popular</span>
                        </label>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label" for="meta_title">Meta Title</label>
                        <input type="text" class="form-control @error('meta_title') is-invalid @enderror" value="{{ old('meta_title') }}" id="meta_title" name="meta_title">
                        @error('meta_title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <label class="form-label" for="meta_keywords">Meta Keywords</label>
                    <div class="input-group input-group-dynamic mb-3">
                        <textarea name="meta_keywords" rows="3" class="form-control @error('meta_keywords') is-invalid @enderror" placeholder="Write Meta Keywords Here...">{{ old('meta_keywords') }}</textarea>
                        @error('meta_keywords')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <label class="form-label" for="meta_description">Meta Description</label>
                    <div class="input-group input-group-dynamic mb-3">
                        <textarea name="meta_description" rows="3" class="form-control @error('meta_description') is-invalid @enderror" placeholder="Write Meta Description Here...">{{ old('meta_description') }}</textarea>
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
                        <img id="preview" class="img-fluid">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-5">SUBMIT</button>
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
        // Image Preview
        let loadFile = function(event) {
            let preview = document.getElementById('preview');
            preview.src = URL.createObjectURL(event.target.files[0]);
            preview.onload = function() {
                preview.style.height = '100px';
                preview.style.width = '100px';
               
            URL.revokeObjectURL(preview.src) // free memory
            }
        };
    </script>
    
@endpush