@extends('backend.layouts.master')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <a href="#"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Trang Chủ</a>
                </li>
            </ol>
        </nav>
        <div class="d-md-flex align-items-md-start">
            <h1 class="page-title mr-sm-auto"> Quản Lý Tin Tức</h1>
        </div>
        <div class="card-body">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('news.index')}}">Tất Cả</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('news.trash')}}">Thùng Rác</a>
                    </li>
                </ul>
            </div>
            </div>
        </div>
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
                                <tr>
                                    <th>#</th>
                                    <th>Tên Tin</th>
                                    <th>Chức Năng</th>
                                </tr>
                            </thead>
                            @foreach($news as $new)
                            <tbody>
                                <tr>
                                    <td>{{ $new->id }}</td>
                                    <td>{{ $new->title }}
                                    <br>
                                        @if( $new->hot)
                                        <span class="badge badge-danger">Tin Tức HOT</span>
                                        @endif
                                        @if( $new->puplish_date)
                                        <span class="badge badge-warning">Ngày Xuất Bản: {{ $new->puplish_date }}</span>
                                        @endif
                                        @if( $new->status == 'show')
                                        <span class="badge badge-info">Trạng Thái: {{ $new->status }}</span>
                                        @endif
                                        </br>
                                    </td>
                                    <td>
                                        <span class="sr-only">restore</span></a> <a href="{{route('news.restore',$new->id)}}"
                                        class="btn btn-sm btn-icon btn-dark"><i class="fas fa-trash-restore"></i> <span class="sr-only">Remove</span></a>
                                        <form action="{{ route('news.force_destroy',$new->id )}}" style="display:inline" method="post">
                                            <button onclick="return confirm('Xóa vĩnh viễn {{$new->name}} ?')" class="btn btn-sm btn-icon btn-secondary"><i class="far fa-trash-alt"></i></button>
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
                    {{ $news->links() }}
                </div>
            </div>
        </div>
        <!--End Row-->
    </div>
</div>
@endsection
