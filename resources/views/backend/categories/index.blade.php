@extends('backend.layouts.master')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    {{-- <a href="{{ route('categories.index') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Trang Chủ</a> --}}
                </li>
            </ol>
        </nav>
        <div class="d-md-flex align-items-md-start">
            <h1 class="page-title mr-sm-auto"> Quản Lý Loại Tin Tức</h1>
            <div class="btn-toolbar">
 
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-10">
                    <form action="" method="GET" id="form-search" class="form-dark">
                        <div class="input-group input-group-alt">
                            <div class="input-group-prepend">
                                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Tìm nâng cao
                                </button>
                            </div>
                        </div>
                        @include('backend.categories.modals.modalSearch')
                    </form>
                </div>
                <div class="col-lg-2">
                    <a href="{{ route('categories.create') }}" class="btn btn-dark">
                        <i class="fa-solid fa fa-plus"></i>
                        <span class="ml-1">Thêm Mới</span>
                    </a>
                <div>
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
                                        <th>Tên Loại Tin</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                @foreach($categories as $category)
                                <tbody>
                                    <tr>
                                        <td>{{ $category->id}}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            <span class="sr-only">Edit</span></a> <a href="{{route('categories.edit',$category->id)}}" class="btn btn-sm btn-icon btn-secondary"><i class="fas fa-pencil-alt"></i>
                                                <span class="sr-only">Remove</span></a>
                                            <form action="{{ route('categories.destroy',$category->id )}}" style="display:inline" method="post">
                                                <button onclick="return confirm('Xóa {{$category->name}} ?')" class="btn btn-sm btn-icon btn-secondary"><i class="far fa-trash-alt"></i></button>
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
                        {{ $categories->links() }}
                    </div>

                </div>
            </div>
            <!--End Row-->
        </div>
    </div>
    @endsection
