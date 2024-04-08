{{-- {{ dd($tags) }} --}}
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
                                <h1 class="mt-4 d-inline">Tags</h1>
                            </div>
                            <a href="{{route('tags.create')}}" class="btn btn-outline-primary">Add Tag</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                            <div class="datatable-container">
                                <table id="datatablesSimple" class="datatable-table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tags as $tag )
                                        <tr >
                                            <td>{{$tag->id}}</td>
                                            <td>{{$tag->name}}</td>
                                            <td><a href="{{route('tags.edit',$tag->id)}}" class="btn btn-warning"> <i class="fa-solid fa-pen"></i></a>
                                                <button data-tag-id="{{$tag->id}}" class="delete-tag btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="datatable-bottom">
                                {{$tags->links()}}
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
          <h5 class="modal-title" id="exampleModalLabel">Delete Tag?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          </button>
        </div>
        <div class="modal-body">
          Are you sure you want to delete this tag?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <form action="" class="d-inline-block" id="deleteForm" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-primary">Delete Tag</button>
          </form>
        </div>
      </div>
    </div>
  </div>
<script>
    const deleteBtn = document.querySelectorAll('.delete-tag');
    deleteBtn.forEach((btn)=> btn.addEventListener('click', deleteTag));
    function deleteTag() {
        const tagId = this.dataset.tagId;
        const route = `/tags/${tagId}`;
        const deleteForm = document.querySelector('#deleteForm');
        deleteForm.setAttribute('action', route);
        const deleteModal = new bootstrap.Modal('#deleteModal');
        deleteModal.show();
        // console.log("Delete Pressed!!");
    }
</script>
@endsection
