
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
                                <h1 class="mt-4 d-inline">Users</h1>
                            </div>
                            {{-- <a href="{{route('categories.create')}}" class="btn btn-outline-primary">Add Category</a> --}}
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
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Actions</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user )
                                        <tr >
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->role}}</td>
                                            @if ($user->role === 'admin')
                                            <td>
                                                <button data-change-role-route="{{route('users.revokeAdmin',$user->id)}}" class="revoke-admin btn btn-success">Revoke Admin</button>
                                            </td>
                                            @elseif ($user->role === 'author')
                                                <td>
                                                    <button data-change-role-route="{{route('users.makeAdmin',$user->id)}}" class=" make-admin btn btn-warning">Make Admin</button>
                                                </td>
                                            @elseif ($user->role === 'super-admin')
                                            <td>
                                                <button data-change-role-route="{{route('users.update',$user->id)}}" class=" disabled make-admin btn btn-warning">Make Admin</button>
                                            </td>
                                            @endif

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="datatable-bottom">
                                {{$users->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{-- Delete Modal --}}
<div class="modal fade" id="makeAdmin" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Change Role?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          </button>
        </div>
        <div class="modal-body">
          Are you sure you want to change Role to Admin?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <form action="" class="d-inline-block" id="adminForm" method="POST">
            @method('PUT')
            @csrf

            <input type="hidden"   value="admin" name="role" id="role">
            <button type="submit"  class="btn btn-primary">Change Role</button>
          </form>
        </div>
      </div>
    </div>
</div>


<div class="modal fade" id="revokeAdmin" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Change Role?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          </button>
        </div>
        <div class="modal-body">
          Are you sure you want to change Role to Author?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <form action="" class="d-inline-block" id="authorForm" method="POST">
            @method('PUT')
            @csrf

            <input type="hidden" value="author" name="role" id="role">
            <button type="submit"   class="btn btn-primary">Change Role</button>
          </form>
        </div>
      </div>
    </div>
</div>
@endsection

@section('page-level-scripts')
    <script src="{{asset('admin/js/page-level/users/index.js')}}"></script>
@endsection
