{{-- {{ dd($tags) }} --}}
@extends('admin-panel.layouts.admin')
@section('page-level-styles')
<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('admin-content')
<div class="container-fluid my-3 px-3" >
    <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
          <label for="title">Title</label>
          <input name="title" type="text" class="form-control @error('title') is-invalid  @enderror" id="title" aria-describedby="nameHelp" placeholder="Enter title" value="{{old('title')}}">
          <small id="nameHelp" class="form-text text-danger">
            @error('title')
            {{ $message }}
             @enderror
             </small>
        </div>

        <div class="form-group mb-3">
            <label for="excerpt">Excerpt</label>
            <textarea name="excerpt" type="text" class="form-control @error('excerpt') is-invalid  @enderror" id="excerpt" aria-describedby="nameHelp" placeholder="Enter excerpt" >{{old('excerpt')}}</textarea>
            <small id="nameHelp" class="form-text text-danger">
              @error('excerpt')
              {{ $message }}
               @enderror
            </small>
        </div>

        <div class="form-group mb-3">
            <label for="category_id">Category</label>
            <select class="select2 form-control" name="category_id" id="category_id">
                <option value="select..." selected disabled>Select....</option>
                @foreach ($categories as $category )
                <option value="{{ $category->id }}" {{ $category->id === old('category_id') ? 'selected' : ''}}>{{ $category->name}}</option>

                @endforeach
              </select>
            <small id="nameHelp" class="form-text text-danger">
              @error('category_id')
              {{ $message }}
               @enderror
            </small>
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <input type="hidden" class="form-control @error('body') is-invalid @enderror" id="body" name="body"  value="{{old('body')}}">
            <trix-editor input="body"></trix-editor>
            <div id="nameHelp" class="form-text text-danger">
                @error('body')
                    {{$message}}
                @enderror
            </div>
        </div>

        <div class="form-group mb-3">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control" accept=".jpg,.gif,.png">
            <small id="nameHelp" class="form-text text-danger">
              @error('image')
              {{ $message }}
               @enderror
            </small>
        </div>

        <div class="form-group mb-3">
            <label for="published_at">Published At</label>
            <input type="datetime-local" name="published_at" id="published_at" class="form-control" >
            <small id="nameHelp" class="form-text text-muted">
             Keep it blank to save it as a draft
            </small>
        </div>

        <div class="form-group mb-3">
            <label for="tags">Tags</label>
            <select class="select2 form-control" name="tags[]" id="tags" multiple="multiple">
                <option value="select..." selected disabled>Select....</option>
                @foreach ($tags as $tag )
                <option value="{{ $tag->id }}" {{ $tag->id === old('tag_id') ? 'selected' : ''}}>{{ $tag->name}}</option>
                @endforeach
              </select>
            <small id="nameHelp" class="form-text text-muted">
                @error('tags')
                {{ $message }}
                 @enderror
            </small>
        </div>


        <button type="submit" class="btn btn-primary my-2">Submit</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>



@endsection




