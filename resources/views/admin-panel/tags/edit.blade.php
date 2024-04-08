@extends('admin-panel.layouts.admin')
{{-- {{dd($tag)}}; --}}
@section('admin-content')
<div class="container-fluid my-3 px-3" >
    <form action="{{route('tags.update',$tag->id)}}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
          <label for="name">Tag Name</label>
          <input name="name" type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter tag name" value="{{$tag->name}}">
          <small id="nameHelp" class="form-text text-danger"> @error('name') {{ $message }} @enderror </small>
        </div>
        <button type="submit" class="btn btn-primary my-2">Submit</button>
    </form>
</div>
@endsection
