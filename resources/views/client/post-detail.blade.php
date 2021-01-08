@extends('client.layouts.app')
@section('content')

<section class="section single-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <div class="blog-title-area text-center">
                        <ol class="breadcrumb hidden-xs-down">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="#">Tin tức</a></li>
                            <li class="breadcrumb-item active">{{ $post->title }}</li>
                        </ol>
                        <span class="color-orange"><a href="tech-category-01.html" title="">Technology</a></span>

                        <h3>{{ $post->title }}</h3>

                        <div class="blog-meta big-meta">
                            <small><a href="#" title="">{{ $post->created_at }}</a></small>
                            <small><a href="#" title="">{{ $post->user->name }}</a></small>

                        </div><!-- end meta -->
                        <div class="post-sharing">
                            <ul class="list-inline">
                                <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div><!-- end post-sharing -->
                    </div><!-- end title -->

                    <div class="single-post-media">
                        <img src="/images/{{ $post->url_image }}" alt="" class="img-fluid">
                    </div><!-- end media -->

                    <p>{{ $post->content_text }}</p>
                </div><!-- end pp -->
            </div><!-- end content -->

            <div class="blog-content">
                <div class="pp">

                    <div class="blog-title-area">
                        <div class="tag-cloud-single">
                            <span>Tags</span>
                            <small><a href="#" title="">lifestyle</a></small>
                            <small><a href="#" title="">colorful</a></small>
                            <small><a href="#" title="">trending</a></small>
                            <small><a href="#" title="">another tag</a></small>
                            <small><a href="#" title="">another tag</a></small>
                            <small><a href="#" title="">another tag</a></small>
                            <small><a href="#" title="">another tag</a></small>
                            <small><a href="#" title="">another tag</a></small>
                            <small><a href="#" title="">another tag</a></small>
                        </div><!-- end meta -->

                        <div class="post-sharing">
                            <ul class="list-inline">
                                <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <hr class="invis1">

                    <div class="custombox clearfix">
                        <h4 class="small-title">Bình luận mới nhất</h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="comments-list">
                                    @foreach($comment as $key => $value)
                                    <div  class="media row{{ $value->id }}">
                                        <a class="media-left" href="#">
                                            <img src="/images/avarta.png" alt="" class="rounded-circle">
                                        </a>
                                        <div class="media-body" style="">
                                            <h4 class="media-heading user_name">{{ $value->user->name }} <small>{{ $value->created_at }}</small>
                                                <button idpost="{{ $value->id }}" type="button" class="btn-danger delete">Xóa</button></h4>

                                            <p>{{ $value->content_text }}</p>
{{--                                            <a href="#" class="btn btn-primary btn-sm">Reply</a>--}}
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end custom-box -->

                    <hr class="invis1">
                    <div class="custombox clearfix">
                        <h4 class="small-title">Bình luận</h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="formComment" method="POST" action="" class="form-wrapper">
                                    @csrf
                                    <input id="" name="post_id" type="hidden" value="{{ $post->id }}">
                                    <textarea name="content_text" id="content_text" class="form-control" placeholder="Bình luận của bạn"></textarea>
                                    <button type="submit" class="btn btn-primary">Gửi</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div><!-- end page-wrapper -->
            </div><!-- end col -->
        </div><
    </div>
</section>

@push('scripts')
    <script>
        function clearData() {
            $('#content_text').val('');
        }

        function deletePost(urlDelete, id) {
            if (confirm("Bạn có chắc chắn muốn xóa không?")) {
                let row = $('.row' + id);
                $.ajax({
                    url: urlDelete + '/'+ id,
                    type: 'delete',
                    success: function (data) {
                        row.remove();
                    }
                })
            }
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#formComment').submit(function (e) {
            e.preventDefault();
            // let post_id = $(this).attr('post-id');
            let formEditPost = new FormData($('#formComment')[0]);
            $.ajax({
                type: 'post',
                url: '{{ route('comment.store') }}',
                data: formEditPost,
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {
                    if (response) {
                        $('.comments-list').prepend('' +
                            '<div class="media">' +
                                '<a class="media-left" href="#">' +
                                    '<img src="/images/avarta.png" alt="" class="rounded-circle">' +
                                '</a>' +
                                '<div class="media-body">' +
                                    '<h4 class="media-heading user_name">'+ response.name +'<small>'+ response.created_at +'</small>' +
                                        '<button idpost="'+ response.id +'" type="button" class="btn-danger delete">Xóa</button>' +
                                    '</h4>' +
                                    '<p>' + response.content_text + '</p>' +
                                '</div>' +
                            '</div>'
                        );
                    }
                    setTimeout(function () {
                        window.location.href = "/posts/" + response.post_id;
                    }, 300);
                    clearData();
                },
                error: function () {
                    console.log("Lỗi");
                }
            });
        });

        $('.delete').click(function () {
            let id = $(this).attr("idpost");
            let b = deletePost("/comments/destroy", id);

        });

    </script>
@endpush
@endsection
