@if(@session()->has('success'))
    <div class="alert alert-success alert-dismissable fade show modal-header">
        <p>{{ session('success') }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif(session()->has('error'))
    <div class="alert alert-danger alert-dismissable fade show d-flex justify-content-center">
        <p>{{ session('error') }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
