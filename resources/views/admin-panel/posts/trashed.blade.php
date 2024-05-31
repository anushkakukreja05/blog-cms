
@extends('admin-panel.layouts.admin')

@section('admin-content')

    <div class="container-fluid px-4 mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                <svg class="svg-inline--fa fa-table me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="table" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M64 256V160H224v96H64zm0 64H224v96H64V320zm224 96V320H448v96H288zM448 256H288V160H448v96zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64z"></path></svg>
                                <h1 class="mt-4 d-inline">Posts</h1>
                            </div>
                            <a href="{{route('posts.create')}}" class="btn btn-outline-primary">Add Post</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                            <div class="datatable-container">
                                <table id="datatablesSimple" class="datatable-table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Excerpt</th>
                                            <th>Body</th>
                                            <th>Status</th>
                                            <th>Category</th>
                                            <th>Author Name</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($posts as $post )
                                        <tr >
                                            <td>{{$post->id}}</td>
                                            <td>
                                                <img src="{{ asset($post->image)}}" alt="{{ $post->title }}" style="max-width: 100px">
                                            </td>
                                            <td>{{Str::limit($post->title,10)}}</td>
                                            <td>{{Str::limit($post->excerpt,10)}}</td>
                                            <td>{!!Str::limit($post->body,10)!!}</td>
                                            <td>{!! $post->status !!}</td>
                                            {{-- {{!! so that it render html as well!!}} --}}
                                            <td>{{$post->category->name}}</td>
                                            <td>{{$post->author->name}}</td>
                                            <td>
                                                <button data-restore-route="{{route('posts.restore',$post)}}" class="restore-post btn btn-warning"><i class="fa-solid fa-recycle"></i></button>

                                                <button data-delete-route="{{route('posts.forceDelete',$post)}}" class="delete-post btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                                @if(!$post->is_published)
                                                <button data-publish-route="{{route('posts.publish',$post)}}" class="publish-post btn btn-info"><i class="fa-solid fa-upload"></i></button>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="datatable-bottom">
                                {{$posts->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{-- Delete Modal --}}
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete post?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          </button>
        </div>
        <div class="modal-body">
          Are you sure you want to delete this post permanently?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <form action="" class="d-inline-block" id="deleteForm" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-primary">Delete post</button>
          </form>
        </div>
      </div>
    </div>
  </div>


  {{-- Publish modal --}}
  <div class="modal fade" id="publishModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Publish post?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          </button>
        </div>
        <div class="modal-body">
          Are you sure you want to publish this post right now?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <form action="" class="d-inline-block" id="publishForm" method="POST">
            @csrf
            @method('PUT')
            <button type="submit" class="btn btn-primary">Save changes</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  {{-- Restore modal --}}
  <div class="modal fade" id="restoreModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Restore post?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          </button>
        </div>
        <div class="modal-body">
          Are you sure you want to restore this Post?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
          <form action="" class="d-inline-block" id="restoreForm" method="POST">
            @csrf
            @method('PUT')
            <button type="submit" class="btn btn-primary">Yes</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('page-level-scripts')
    <script src="{{asset('admin/js/page-level/posts/trashed.js')}}"></script>
@endsection
