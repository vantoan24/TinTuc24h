@extends('backend.layouts.master')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    {{-- <a href="#"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Trang Chủ</a> --}}
                </li>
            </ol>
        </nav>
        <div class="d-md-flex align-items-md-start">
            <h1 class="page-title mr-sm-auto"> Quản Lý Bình Luận</h1>
            {{-- <div class="btn-toolbar">
                <a href="{{ route('categories.create') }}" class="btn btn-primary">
                    <i class="fa-solid fa fa-plus"></i>
                    <span class="ml-1">Thêm Mới</span>
                </a>
            </div> --}}
        </div>
        <div id="notify_comment" style="color:#87CEFA;font-size:19px"></div>
        @if (Session::has('success'))
        <div class="text text-success"><b>{{session::get('success')}}</b></div>
        @endif
        @if (Session::has('error'))
        <div class="text text-danger"><b>{{session::get('error')}}</b></div>
        @endif
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush table-borderless">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Bình luận</th>
                                    <th>Bài viết</th>
                                    <th>Ngày gửi</th>
                                    <th>Trạng thái</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
                            @foreach($comments as $comment)
                            <tbody>
                                <tr>
                                    <td>{{ $comment->id}}</td>
                                    <td><textarea disabled="disabled">{{ $comment->content }}</textarea></td>
                                    <td>{{ $comment->news->title }}</td>
                                    <td>{{ $comment->created_at->Format('d/m/Y') }}</td>
                                    <td>
                                    @if(($comment->startus ) == 'pending')
                                        <input type="button" data-comment_status="approved" data-comment_id="{{ $comment->id}}" id=" {{$comment->new_id}}"class="btn btn-primary btn-xs comment_approved" value=" Duyệt">
                                    @else
                                        <input type="button" data-comment_status="pending" data-comment_id="{{ $comment->id}}" id=" {{$comment->new_id}}" class="btn btn-danger btn-xs comment_approved" value="Bỏ Duyệt">
                                    @endif
                                    </td>
                                    {{-- <td>{{ __($comment->startus) }}</td> --}}
                                    <td>
                                        <form action="{{ route('comments.destroy',$comment->id )}}" style="display:inline" method="post">
                                            <button onclick="return confirm('Bạn có chắc muôn xóa bình luận này kh ?')" class="btn btn-sm btn-icon btn-secondary"><i class="far fa-trash-alt"></i></button>
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </td>

                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div style="float:right">
                    {{ $comments->links() }}
                </div>

            </div>
        </div>
        <!--End Row-->
    </div>
</div>

    <script type="text/javascript">
        $('.comment_approved').click(function(){
            var comment_status = $(this).data('comment_status');
            var comment_id = $(this).data('comment_id');
            var new_id = $(this).attr('id');

            if(comment_status == 'approved'){
                var alert = "Thay đổi thành công";
            }else{
                var alert = "Thay đổi thành công";
            }
            $.ajax({

                 url:"{{url('/approved')}}",
                 method:"POST",
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 },
                 data: {
                    comment_status:comment_status,
                    comment_id:comment_id,
                    // new_id:new_id,
                },
                success:function(status){
                    location.reload();
                    $('#notify_comment').html('<span class="text text-alert">'+alert+'</span>');
                }
             });
        });

    </script>
@endsection
