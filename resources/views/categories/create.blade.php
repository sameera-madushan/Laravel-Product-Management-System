@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Category</h1>
        <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            <form method="POST" action="{{route('category.save')}}"  enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Category Name</label>
                    <input type="text" name='cname' class="form-control mt-1" placeholder="You Category Name Here" required>
                </div>
            </div>
                <button type="submit" class="btn btn-primary mt-3">Add Category</button>
            </form>
    </div>

    <style>
        .container{
            justify-content: center;
        }
    </style>
@endsection
