@extends('layouts.app')

@section('content')

<div class="container">
    <h1>All Categories</h1>
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            @if(session()->has('message'))
            <div class="alert alert-danger">
                {{ session('message') }}
            </div>
            @endif

            <table class="table table-striped">
                <thead class="thead-dark">
                  <tr>
                    {{-- <th scope="col">#</th> --}}
                    <th scope="col">Category Name</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($category as $category)
                    <tr>
                        {{-- <th scope="row">{{$category->id}}</th> --}}
                        <td>{{$category->cname}}</td>
                        <td>
                            <a href="{{route('category.edit', $category->id)}}" class="btn btn-sm btn-warning">Edit</a>
                            <a href="{{route('category.delete', $category->id)}}" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>

@endsection
