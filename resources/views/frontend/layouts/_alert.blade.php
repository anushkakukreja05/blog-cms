@if(@session()->has('success'))
    <div class="alert alert-success alert-dismissable fade show d-flex justify-content-between" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close" style="di"></button>
    </div>
@elseif(session()->has('error'))
    <div class="alert alert-danger alert-dismissable fade show d-flex justify-content-between" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
