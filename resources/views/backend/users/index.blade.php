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
            <h1 class="page-title mr-sm-auto"> Quản Lý Nhân Viên</h1>

        </div>

        <div class="card-body">
            <div class="row mb-2">
                <div class="col-lg-6">
                    <form action="" method="GET" id="form-search" class="form-dark">
                        <div class="input-group input-group-alt">
                            <div class="input-group-prepend">
                                <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Tìm nâng cao
                                </button>
                            </div>
                        </div>
                        @include('backend.users.modals.modalSearch')
                    </form>
                </div>
                <div class="col-lg-2">
                </div>
                <div class="col-lg-4">
                    <div class="d-md-flex align-items-md-start">
                        <div class="btn-toolbar">
                            <a href="{{ route('users.create') }}" class="btn btn-dark mr-2">
                                <i class="fa-solid fa fa-plus "></i>
                                <span class="ml-1">Thêm Mới</span>
                            </a>
                        </div>
                        <a href="{{route('users.export')}}" class="btn btn-dark">
                            <i class="fas fa-file"></i>
                            <span class="ml-1">Xuất file excel</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link active " href="{{route('users.index')}}">Tất Cả</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " href="{{route('users.trash')}}">Thùng Rác</a>
                    </li>
                </ul>
            </div>
        </div>
        @if (Session::has('success'))
    </div>
    <div class="text text-success"><b>{{session::get('success')}}</b></div>
    @endif
    @if (Session::has('error'))
    <div class="text text-danger">{{session::get('error')}}</div>
    @endif
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table align-items-center table-flush table-borderless">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Ảnh đại diện</th>
                                <th>Tên nhân viên</th>
                                <th>Địa chỉ</th>
                                <th>Số điện thoại</th>
                                <th>Nhóm nhân viên</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        @foreach($items as $key => $item)
                        <tbody>
                            <tr>
                                <td>{{ ++$key}}</td>
                                <td><img src="{{ asset($item->avatar)}}" style="width:100px;height:80px" alt=""></td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->userGroup->name }}</td>
                                <td>

                                    @if($item->id == Auth::id())
                                    <span class="sr-only">Edit</span></a> <a href="{{route('users.edit',$item->id)}}"
                                        class="btn btn-sm btn-icon btn-secondary"><i class="fas fa-pencil-alt"></i>
                                        <span class="sr-only">Remove</span></a>
                                    @else
                                    <span class="sr-only">Edit</span></a> <a href="{{route('users.edit',$item->id)}}"
                                        class="btn btn-sm btn-icon btn-secondary"><i class="fas fa-pencil-alt"></i>
                                        <span class="sr-only">Remove</span></a>
                                    <form action="{{ route('users.destroy',$item->id )}}" style="display:inline"
                                        method="post">
                                        <button onclick="return confirm('Xóa {{$item->name}} ?')"
                                            class="btn btn-sm btn-icon btn-secondary"><i
                                                class="far fa-trash-alt"></i></button>
                                        @csrf
                                        @method('delete')
                                    </form>
                                    @endif
                                </td>

                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
            <div style="float:right">
                {{ $items->links() }}
            </div>

        </div>
    </div>
    <!--End Row-->
</div>
</div>


@endsection