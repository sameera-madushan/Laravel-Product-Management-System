{{-- <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModa2{{$category->id}}">
    Edit Category
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModa2{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$category->id}}" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Category</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{route('category.update', $category->id)}}"  enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" name='cname' class="form-control mt-1" value="{{$category->cname}}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Edit Category</button>
                </form>
            </div>
    </div>
</div>
 --}}


 @extends('layouts.app')

@section('content')
<div class="container">
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{route('category.update', $category->id)}}"  enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Category Name</label>
                <input type="text" name='cname' class="form-control mt-1" value="{{$category->cname}}" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Edit Category</button>
        </form>
    </div>
</div>

@endsection

