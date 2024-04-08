
@extends('admin-panel.layouts.admin')

@section('admin-content')
<div class="container-fluid my-3 px-3" >
    <div class="card-header">
        <h2>Add Category</h2>
    </div>
    <form action="{{route('categories.store')}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="name">Category Name</label>
          <input name="name" type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter Category name" value="{{old('name')}}">
          <small id="nameHelp" class="form-text text-danger"> @error('name') {{ $message }} @enderror </small>
        </div>
        <button type="submit" class="btn btn-primary my-2">Submit</button>
    </form>
</div>
@endsection
