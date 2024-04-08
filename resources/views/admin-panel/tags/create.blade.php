{{-- {{ dd($tags) }} --}}
@extends('admin-panel.layouts.admin')

@section('admin-content')
<div class="container-fluid my-3 px-3" >
    <form action="{{route('tags.store')}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="name">Tag Name</label>
          <input name="name" type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter tag name" value="{{old('name')}}">
          <small id="nameHelp" class="form-text text-danger"> @error('name') {{ $message }} @enderror </small>
        </div>
        <button type="submit" class="btn btn-primary my-2">Submit</button>
    </form>
</div>
@endsection
