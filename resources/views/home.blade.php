@extends('layouts.app')

@section('content')
<div class="container">
    <form class="d-flex" method="GET">
        <input type="text" name="query" id="search" placeholder="Enter search name" class="form-control">
        <button type="submit" class="btn btn-primary" style="margin-left: 10px;">Search</button>
    </form>
<div class="row mb-2">
    @foreach ($products as $product)
    <div class="col-md-6 mt-4">
      <div class="card flex-md-row mb-4 box-shadow">
        <div class="card-body d-flex flex-column align-items-start">
            <div class="image-container">
              <img class="img-thumbnail" src="{{asset('thumbnails/' . $product->pimage)}}"  alt="thumbnail" style="width:100%;height: 370px;">
            </div>
          <h3 class="mb-0 mt-2">
            <a class="text-dark" style="text-decoration: none; href="#">{{$product->ptitle}}</a>
          </h3>
          <div class="mb-1 text-muted">{{date('Y-m-d', strtotime($product->created_at))}}</div>
          <p class="card-text mb-auto">{{$product->pdescription}}.</p>
          <a href="{{ route('product.view', $product->id) }}" class="btn btn-primary mt-3">
            <button type="button" class="btn btn-sm btn-primary">View Product</button>
        </a>
        </div>
      </div>
    </div>
    @endforeach
    {{ $products->links() }}
  </div>
</div>

@endsection
