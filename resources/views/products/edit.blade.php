@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Product</h1>
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" action="{{route('product.update', $product->id)}}"  enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label>Product Code</label>
              <input type="text" name='pcode' class="form-control" value="{{$product->pcode}}" required>
            </div>
            <div class="form-group">
              <label>Product Title</label>
              <input type="text" name='ptitle' class="form-control" value="{{$product->ptitle}}" required>
            </div>
            <div class="form-group">
                <label>Product Description</label>
                <textarea class="form-control" name="pdescription" rows="3" required>{{$product->pdescription}}</textarea>
            </div>
            <div class="form-group">
                <label>Product Price</label>
                <input type="text" name='pprice' class="form-control" value="{{$product->pprice}}" required>
              </div>
            <div class="form-group">
                <label>Display Order Number</label>
                <input type="text" name='pdon' class="form-control" value="{{$product->pdon}}" required>
            </div>
            <div class="form-group">
            <label for="category_id">Category</label>
            <select name="category_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->cname }}</option>
                @endforeach
            </select>
            </div>
            <div class="form-group mt-3">
                <input class="form-control" name="pimage" type="file">
            </div>


        <button type="submit" class="btn btn-primary mt-3">Edit Product</button>
        </form>
</div>

@endsection

