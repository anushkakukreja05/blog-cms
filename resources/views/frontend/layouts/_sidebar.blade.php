<div id="sidebar" class="col-md-3 mt50 animated" data-animation="fadeInRight" data-animation-delay="250">


    <!-- Search
    ===================================== -->
    <div class="pr25 pl25 clearfix">
        <form action="#">
            <div class="blog-sidebar-form-search">
                <input type="text" name="search" class="" placeholder="e.g. Javascript" value="{{ request('search') }}">
                <button type="submit" name="submit" class="pull-right">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </form>

    </div>


    <!-- Categories
    ===================================== -->
    <div class="mt25 pr25 pl25 clearfix">
        <h5 class="mt25">
            Categories
            <span class="heading-divider mt10"></span>
        </h5>
        <ul class="blog-sidebar pl25">
            @foreach ($categories as $category)
                <li>
                    <a href=" {{ route('blogs.category',$category)}}">
                        {{ $category->name }}
                        <span class="badge badge-pasific pull-right">
                            {{ $category->posts()->published()->count() }}
                            {{-- yeh bahut querys chala raha count laane ke jagah sab posts laa raha ajiski wajah se ram full ho raha woh next project me solve hoga --}}
                        </span>
                    </a>
                </li>
            @endforeach
        </ul>

    </div>


    <!-- Tags
    ===================================== -->
    <div class="pr25 pl25 clearfix">
        <h5 class="mt25">
            Popular Tags
            <span class="heading-divider mt10"></span>
        </h5>
        <ul class="tag">
            @foreach ($tags as $tag )
                <li><a href="#">{{$tag->name}}</a></li>
            @endforeach
        </ul>

    </div>
</div>
