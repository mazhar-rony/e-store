@extends('layouts.admin.app')

@section('breadcrumb')
    Product
@endsection

@section('page_name')
    Product
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
                  <a href="{{route('products.create')}}">
                    <button class="btn btn-icon btn-3 btn-dark float-end me-3" type="button">
                      <span class="btn-inner--icon"><i class="material-icons">add</i></span>
                      <span class="btn-inner--text">add new product</span>
                    </button>
                  </a>
                  <h6 class="text-white text-capitalize ps-3">product table</h6>
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
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Category</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">QTY</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Trending</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Image</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($products as $key => $product)
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
                                <h6 class="mb-0 text-sm">{{ $product->name }}</h6>
                              </div>
                            </div>
                          </td>
                          <td>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">{{ $product->description }}</h6>
                            </div>
                          </td>
                          <td>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">{{ $product->category->name }}</h6>
                            </div>
                          </td>
                          <td class="align-middle text-center text-sm">
                            <span class="badge badge-sm bg-gradient-danger">{{ $product->qty }}</span>
                          </td>
                          <td class="align-middle text-center text-sm">
                            <span class="badge badge-sm {{ $product->status == 1 ? 'bg-gradient-success' : 'bg-gradient-secondary' }}">{{ $product->status == 1 ? 'Active' : 'Inactive' }}</span>
                          </td>
                          <td class="align-middle text-center text-sm">
                            <span class="badge badge-sm {{ $product->trending == 1 ? 'bg-gradient-success' : 'bg-gradient-secondary' }}">{{ $product->trending == 1 ? 'Active' : 'Inactive' }}</span>
                          </td>
                          <td class="align-middle text-center">
                             <div>
                               <img src="{{ isset($product->image) ? asset('uploads/product/'.$product->image) : '' }}" class="{{ isset($product->image) ? 'avatar avatar-sm me-3 border-radius-lg' : '' }}" alt="{{ $product->image }}">
                              </div>
                          </td>
                          <td class="align-middle">
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm active" role="button" aria-pressed="true">Edit</a> | 
                            <button onclick="deleteProduct({{ $product->id }})" class="btn btn-danger btn-sm active" role="button" aria-pressed="true">Delete</button>
                            <form action="{{ route('products.destroy', $product->id) }}" id="delete-form-{{ $product->id }}" method="POST">
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

                {{ $products->links() }}
    
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection

@push('js')

<script>
  function deleteProduct(id)
  {
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        event.preventDefault();
        document.getElementById('delete-form-' + id).submit();
        Swal.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
        )
      }
    })
  }
</script>
    
@endpush