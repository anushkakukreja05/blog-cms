@extends('frontend.layouts.app')

@section('main-content')
<section id="blog" class="pt75 pb50">
    {{-- <div class="container col-md-9">

        <div class="row"> --}}
            <div class="col-md-9">

                <div class="blog-three-mini">
                    <h2 class="color-dark"><a href="#">{{ $post->title}}</a></h2>
                    <div class="blog-three-attrib">
                        <div><i class="fa fa-calendar"></i>{{ $post->published_at->diffForHumans() }}</div> |
                        <div><i class="fa fa-pencil"></i><a href="#">{{ $post->author->name }}</a></div> |
                        <div><i class="fa fa-comment-o"></i><a href="#">{{ count($comments)}} Comments</a></div> |
                        <div><a href="#"><i class="fa fa-thumbs-o-up"></i></a>150 Likes</div> |
                        <div>
                            Share:  <a href="#"><i class="fa fa-facebook-official"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>

                    <img src="{{ asset($post->image)}}" alt="Blog Image" class="img-responsive">
                    <p class="lead mt25">
                        {{ $post->excerpt}}
                    </p>
                    {{-- <h3 class="mt25 mb25">Heading Title Two</h3> --}}

                    {{-- <blockquote>
                        Sometimes when you innovate, you make mistakes. It is best to admit them quickly, and get on with improving your other innovations.
                        <footer><i class="fa fa-quote-right mt25"></i> Steve Job</footer>
                    </blockquote> --}}
                    <p class="lead mt25">
                        {!!$post->body !!}
                    </p>
                    {{-- <h4 class="mt25 mb25">Heading Title Three</h4> --}}
                    {{-- <p>
                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.
                    </p> --}}

                    <div class="blog-post-read-tag mt50">
                        <i class="fa fa-tags"></i> Tags:
                        @foreach ($post_tags as $tag )
                            <a href="{{route('blogs.tag',$tag)}}"> {{ $tag->name}}</a> ,
                        @endforeach

                    </div>

                </div>


                <div class="blog-post-author mb50 pt30 bt-solid-1">
                    <img src="{{ asset('admin/assets/img/other/photo-1.jpg') }}" class="img-circle" alt="image">
                    <span class="blog-post-author-name">{{ $post->author->name }}</span> <a href="https://twitter.com/booisme"><i class="fa fa-twitter"></i></a>
                    <p>
                        Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.
                    </p>
                </div>


                <div class="blog-post-comment-container">
                    <h5><i class="fa fa-comments-o mb25"></i> {{ count($comments)}} Comments</h5>
                    {{-- {{ dd($comments) }} --}}
                   @foreach ($comments as $comment)

                    @if (!$comment->comment_id)
                    <div class="blog-post-comment">
                        <img src=" {{ asset('admin/assets/img/other/photo-4.jpg') }}" class="img-circle" alt="image">
                        <span class="blog-post-comment-name">{{$comment->name}}</span> {{$comment->created_at->diffForHumans()}}
                        <a href="#comment-form"  data-comment-id= {{ $comment->id }} class="pull-right text-gray reply"><i class="fa fa-comment"></i> Reply</a>
                        <p>
                            {{ $comment->body }}
                        </p>
                        {{-- {{ $comment->replies }} --}}
                        {{-- //for each with function/filer for child comments --}}
                        @foreach ($comment->replies as $reply )

                        <div class="blog-post-comment-reply">
                            <img src="{{ asset('admin/assets/img/other/photo-2.jpg') }}" class="img-circle" alt="image">
                            <span class="blog-post-comment-name">{{ $reply->name }}</span> {{ $reply->created_at->diffForHumans()}}
                            <a href="#comment-form" data-comment-id= {{ $reply->id}}class="pull-right text-gray reply"><i class="fa fa-comment"></i> Reply</a>
                            <p>
                                {{ $reply->body }}
                            </p>
                        </div>
                        @foreach ($reply->replies as $sreply )
                        <div class="blog-post-comment-reply">
                            <img src="{{ asset('admin/assets/img/other/photo-2.jpg') }}" class="img-circle" alt="image">
                            <span class="blog-post-comment-name">{{ $reply->name }}</span> {{ $reply->created_at->diffForHumans()}}
                            <a href="#comment-form" data-comment-id= {{ $reply->id}}class="pull-right text-gray reply"><i class="fa fa-comment"></i> Reply</a>
                            <p>
                                {{ $reply->body }}
                            </p>
                        </div>
                        @endforeach
                        @if ($reply->replies)

                        @endif


                        @endforeach



                    </div>
                    @endif



                    @endforeach


                    <button class="button button-default button-sm center-block button-block mt25 mb25">Load More Comments</button>


                </div>

                <div class="blog-post-leave-comment" id="comment-form">
                    <h5><i class="fa fa-comment mt25 mb25"></i> Leave Comment</h5>

                    <form action="{{ route('comments.store')}}" method="POST" id="form">
                        @csrf
                        <input type="text" name="name" class="blog-leave-comment-input " placeholder="name" required value="{{ $user ? $user->name : ''}}" {{ $user ?  'readonly' :'' }} >
                        <input type="email" name="email" class="blog-leave-comment-input " placeholder="email"  required value= {{ $user ? $user->email : ''}} {{ $user ?  'readonly' :'' }}>
                        <input type="url" name="website" class="blog-leave-comment-input" placeholder="website">
                        <input type="hidden" name="user_id" class="blog-leave-comment-input" placeholder="website" value="{{$user ? $user->id : ''}}">
                        <input type="hidden" name="post_id" class="blog-leave-comment-input" placeholder="website" value="{{$post->id}}">
                        <input type="hidden" name="comment_id"   class="blog-leave-comment-input" id="comment-id" placeholder="website" >

                        <textarea name="body" class="blog-leave-comment-textarea"></textarea>
                        <button class="button button-pasific button-sm center-block mb25">Leave Comment</button>
                    </form>

                </div>

            {{-- </div> --}}


        {{-- </div> --}}

        <div class="row mt35 animated" data-animation="fadeInUp" data-animation-delay="800">
            <div class="col-md-6">
                <a href="#" class="button button-dark button-sm pull-right">Prev</a>
            </div>
            <div class="col-md-6">
                <a href="#" class="button button-dark button-sm pull-left">Next</a>
            </div>
        </div>

    </div>
</section>
@endsection
{{-- @section('page-level-scripts')
    <script src="{{asset('admin/js/page-level/comments/index.js')}}"></script>
@endsection --}}
<script>
    document.addEventListener('DOMContentLoaded',function() {
    const replyBtn = document.querySelectorAll('.reply');
    console.log(replyBtn);
    replyBtn.forEach((btn)=> btn.addEventListener('click', handleReply));


});
function handleReply() {

    const commentId = this.dataset.commentId;

    const inputAttr = document.getElementById('comment-id');
    inputAttr.setAttribute('value', commentId);

    // console.log("Reply Pressed!!");
}
</script>

