@extends('layouts.app')

@section('content')
<div class="container">
    <h1>All Products</h1>
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form action="/search" class="d-flex" method="GET">
                <input type="text" name="query" id="search" placeholder="Enter search name" class="form-control">
                <button type="submit" class="btn btn-primary" style="margin-left: 10px;">Search</button>
            </form>

            <table class="table table-striped mt-4">
                <thead class="thead-dark">
                  <tr>
                    {{-- <th scope="col">#</th> --}}
                    <th scope="col">Product Code</th>
                    <th scope="col">Product Title</th>
                    <th scope="col">Product Description</th>
                    <th scope="col">Product Price</th>
                    <th scope="col">Product Category</th>
                    <th scope="col">Display Order Number</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        {{-- <th scope="row">{{$product->id}}</th> --}}
                        <td>{{$product->pcode}}</td>
                        <td>{{$product->ptitle}}</td>
                        <td>{{Str::limit($product->pdescription, 50)}}</td>
                        <td>{{$product->pprice}}</td>
                        <td>{{$product->category->cname}}</td>
                        <td>{{$product->pdon}}</td>
                        <td>
                            <a href="{{route('product.edit', $product->id)}}" class="btn btn-sm btn-warning">Edit</a>
                            <a href="{{route('product.delete', $product->id)}}" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection



