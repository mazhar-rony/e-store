@extends('layouts.admin.app')

@section('breadcrumb')
    Category
@endsection

@section('page_name')
    Category
@endsection

@push('css')

  <style>
    .btn-group-xs > .btn, .btn-xs {
      padding: .25rem .4rem;
      font-size: .875rem;
      line-height: .5;
      border-radius: .2rem;
    }
  </style>
  
@endpush

@section('content')
    {{--  <div class="card mx-4 mt-3">
        <div class="card-body">
            <h1>Category</h1>
        </div>
    </div>  --}}
    <div class="container-fluid py-4">
        <div class="row">
          <div class="col-12">
            <div class="card my-4">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                  {{--  <h6 class="text-white text-capitalize ps-3">Category table</h6>  --}}
                  <a href="{{route('categories.create')}}">
                    <button class="btn btn-icon btn-3 btn-dark float-end me-3" type="button">
                      <span class="btn-inner--icon"><i class="material-icons">add</i></span>
                      <span class="btn-inner--text">add new category</span>
                    </button>
                  </a>
                  <h6 class="text-white text-capitalize ps-3">Category table</h6>
                </div>
              </div>
              <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0 table-striped table-hover table-bordered">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Serial#</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Popular</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Image</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($categories as $key => $category)
                        <tr>
                          <td>
                            <div class="d-flex px-2 py-1">
                              <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">{{ $key + 1 }}</h6>
                              </div>
                            </div>
                          </td>
                          <td>
                            <div class="d-flex px-2 py-1">                             
                              <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">{{ $category->name }}</h6>
                              </div>
                            </div>
                          </td>
                          <td>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">{{ $category->description }}</h6>
                            </div>
                          <td class="align-middle text-center text-sm">
                            <span class="badge badge-sm {{ $category->status == 1 ? 'bg-gradient-success' : 'bg-gradient-secondary' }}">{{ $category->status == 1 ? 'Active' : 'Inactive' }}</span>
                          </td>
                          <td class="align-middle text-center text-sm">
                            <span class="badge badge-sm {{ $category->popular == 1 ? 'bg-gradient-success' : 'bg-gradient-secondary' }}">{{ $category->popular == 1 ? 'Active' : 'Inactive' }}</span>
                          </td>
                          <td class="align-middle text-center">
                             <div>
                               <img src="{{ isset($category->image) ? asset('uploads/category/'.$category->image) : '' }}" class="{{ isset($category->image) ? 'avatar avatar-sm me-3 border-radius-lg' : '' }}" alt="{{ $category->image }}">
                              </div>
                          </td>
                          <td class="align-middle">
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm active" role="button" aria-pressed="true">Edit</a> | 
                            <button onclick="deleteCategory({{ $category->id }})" class="btn btn-danger btn-sm active" role="button" aria-pressed="true">Delete</button>
                            <form action="{{ route('categories.destroy', $category->id) }}" id="delete-form-{{ $category->id }}" method="POST">
                              @csrf
                              @method('DELETE')
                            </form>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>                  
                </div>                
              </div>
              <div class="card-footer pagination pagination-sm d-flex justify-content-end">

                {{ $categories->links() }}
    
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection

@push('js')

<script>
  function deleteCategory(id)
  {
    event.preventDefault();
    document.getElementById('delete-form-' + id).submit();
  }
</script>
    
@endpush