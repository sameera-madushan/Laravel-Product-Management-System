@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Product</h1>
    <div class="card-body" style="padding-top: 0;">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{route('product.save')}}"  enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Product Code</label>
                <input type="text" name='pcode' class="form-control" placeholder="You Product Code Here" required>
            </div>
            <div class="form-group">
                <label>Product Title</label>
                <input type="text" name='ptitle' class="form-control" placeholder="You Product Title Here" required>
            </div>
            <div class="form-group">
                <label>Product Description</label>
                <textarea class="form-control" name="pdescription" placeholder="You Product Description Here" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label>Product Price</label>
                <input type="text" name='pprice' class="form-control" placeholder="You Product Price Here" required>
                </div>
            <div class="form-group">
                <label>Display Order Number</label>
                <input type="text" name='pdon' class="form-control" placeholder="Display Order Number Here" required>
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
        </div>
        <button type="submit" class="btn btn-primary mt-3">Add Product</button>
        </form>
    </div>

@endsection
