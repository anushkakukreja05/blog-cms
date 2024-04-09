
@if ($paginator->hasPages())
    <div class="row mt25 animated" data-animation="fadeInUp" data-animation-delay="100">
        <div class="col-md-6">
            @if ($paginator->onFirstPage())
                <a href="#" class="button button-sm button-pasific pull left hover-skew-backward disabled" > Old
                    Entries</a>
            @else
                <a href="{{ $paginator->previousPageUrl() }}"
                    class="button button-sm button-pasific pull left hover-skew-backward ">Old
                    Entries</a>
            @endif
        </div>

        <div class="col-md-6">
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageurl() }}"
                    class="button button-sm button-pasific pull left hover-skew-backward ">New
                    Entries</a>
            @else
                <a href="#" class="button button-sm button-pasific pull left hover-skew-backward disabled">New
                    Entries</a>
            @endif
        </div>
    </div>
@endif
