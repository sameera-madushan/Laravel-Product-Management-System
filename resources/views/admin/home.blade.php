@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Admin Dashboard</h1>
<div class="conatiner" style="display: flex; justify-content: center;">
    <div class="card" style="margin: 10px;">
        <div class="card-body">
        <h5 class="card-title">Add Products</h5>
        <p class="card-text">Effortlessly expand your catalog with a single click.</p>
        <a class="btn btn-primary" href="{{route('product.create')}}" role="button">Add Products</a>
        </div>
    </div>
    <div class="card" style="margin: 10px;">
        <div class="card-body">
        <h5 class="card-title">Show All Products</h5>
        <p class="card-text">Explore your complete product inventory at a glance.</p>
        <a href="{{route('product.all')}}" class="btn btn-primary">Show Products</a>
        </div>
    </div>
    <div class="card" style="margin: 10px;">
        <div class="card-body">
        <h5 class="card-title">Add Categories</h5>
        <p class="card-text">Effortlessly structure and categorize your products.</p>
        <a class="btn btn-primary" href="{{route('category.create')}}" role="button">Add Category</a>
        </div>
    </div>
    <div class="card" style="margin: 10px;">
        <div class="card-body">
        <h5 class="card-title">Show All Categories</h5>
        <p class="card-text">Explore your complete product categories at a glance.</p>
        <a href="{{route('category.all')}}" class="btn btn-primary">Show Categories</a>
        </div>
    </div>

</div>
</div>
@endsection
