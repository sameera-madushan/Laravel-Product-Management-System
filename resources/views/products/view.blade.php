@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card text-center mt-5 mb-5">
        <div class="card-body">
            <h2 class="card-title">{{$product->ptitle}}</h2>
            <p class="card-text user">Created by {{$product->user->name}}</p>
            <img class="img-thumbnail" src="{{asset('thumbnails/' . $product->pimage)}}"  alt="thumbnail">
            <p class="card-text pdescription">{{$product->pdescription}}</p>
            <p class="card-text pprice">Rs.{{$product->pprice}}</p>
            <p class="card-text category">Product Category: {{$product->category->cname}}</p>
        </div>
        <div class="card-footer text-muted">
            {{date('Y-m-d', strtotime($product->created_at))}}
        </div>
    </div>
</div>

<style>
    .card-title{
        font-weight: bold;
        padding: 10px;
    }

    .img-thumbnail{
        height: 30%;
        width: 30%;
    }

    .pdescription{
        padding: 10px;
        font-size: 20px;
    }

    .pprice{

        font-size: 20px;
    }
</style>
@endsection
