@extends('admin-panel.layouts.admin')

@section('admin-content')
<div class="container-fluid my-3 px-3" >
    <form action="{{route('categories.update',$category->id)}}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
          <label for="name">Category Name</label>
          {{-- {{dd(old('name',$category->name))}} --}}
          <input name="name" type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter Catgory name" value="{{old('name',$category->name)}}">
          <small id="nameHelp" class="form-text text-danger"> @error('name') {{ $message }} @enderror </small>
        </div>
        <button type="submit" class="btn btn-primary my-2">Submit</button>
    </form>
</div>
@endsection
