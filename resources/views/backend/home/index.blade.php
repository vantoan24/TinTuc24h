@extends('backend.layouts.master')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">

        <!--Start Dashboard Content-->
        <div class="d-flex flex-column flex-md-row">

            <p class="lead">
                <span class="font-weight-bold" style="color: rgb(237, 238, 231)">Xin chào, {{ $current_user->name}}.</span><br>
                <span style="color: rgb(237, 238, 231)">Chúc bạn một ngày làm việc tốt lành !</span>
            </p>
            <div class="ml-auto">

            </div>
        </div>
        <div class="card mt-3">
            <div class="card-content">
                <div class="row row-group m-0">
                    <div class="col-12 col-lg-6 col-xl-3 border-light">
                        <div class="card-body">
                            <h5 class="text-white mb-0">Tổng số bài viết đã đăng <span class="float-right"><i class="fa fa-newspaper-o"></i></span></h5>
                            <p class="mb-0 text-white small-font">{{$new_count}} <span class="float-right"><i></i></span></p>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-3 border-light">
                        <div class="card-body">
                            <h5 class="text-white mb-0">Số Email Đăng Ký <span class="float-right"><i class="fa fa-envelope"></i></span>
                            </h5>
                            <p class="mb-0 text-white small-font">{{$email_count}}<span class="float-right">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-3 border-light">
                        <div class="card-body">
                            <h5 class="text-white mb-0">Số bình luận chờ duyệt <span class="float-right"><i class="fa fa-comment"></i></span>
                            </h5>
                            <p class="mb-0 text-white small-font">{{$comment_count}} <span class="float-right">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-3 border-light">
                        <div class="card-body">
                            <h5 class="text-white mb-0">Số người dùng <span class="float-right"><i class="fa fa-user"></i></span></h5>

                            <p class="mb-0 text-white small-font">{{$user_count}} <span class="float-right"><i></i></span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card card-fluid">
                    <div class="card-header"> Bài viết Mới</div><!-- .lits-group -->
                    <div class="lits-group list-group-flush">
                        @foreach( $news as $new )
                        <div class="list-group-item">
                            <div class="list-group-item-body">
                                <h5 class="card-title">
                                    <a href="{{route('news.edit',$new->id)}}">{{ $new->title }}</a>
                                </h5>
                                @if( $new->hot)
                                <span class="badge badge-danger text-dark">Tin Tức HOT</span>
                                <span class="badge badge-info text-dark">Trạng Thái: Hiện</span>
                                @endif
                                <p class="card-subtitle text-muted mb-1"> {{ $new->description }} </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card card-fluid">
                    <div class="card-header">Các tin tức có lượt xem cao</div><!-- .lits-group -->
                    <div class="lits-group list-group-flush">
                        @foreach( $views as $view )
                        <div class="list-group-item">
                            <div class="list-group-item-body">
                                <h5 class="card-title">
                                    <a href="{{route('news.edit',$new->id)}}">{{ $view->title }}</a>
                                </h5>
                                @if( $view->hot)
                                <span class="badge badge-danger text-dark">Tin Tức HOT</span>
                                <span class="badge badge-info text-dark">Trạng Thái: Hiện</span>
                                @endif
                                <span class="fas fa-eye badge badge-warning text-dark">{{$view->view}} Lượt xem</span>
                                <p class="card-subtitle text-muted mb-1"> {{ $view->description }} </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
