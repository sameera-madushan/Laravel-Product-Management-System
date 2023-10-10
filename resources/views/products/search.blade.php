@extends('layouts.app')

@section('content')
<div class="container">
    <form class="d-flex" method="GET">
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
            </td>
            </tr>
        @endforeach
    </tbody>
    </table>
        </div>
@endsection
