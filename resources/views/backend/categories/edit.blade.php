@extends('backend.layouts.master')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <header class="page-title-bar">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        <a href="{{route('categories.index')}}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Quản Lý Tinh Tức
                            </a>
                    </li>
                </ol>
            </nav>
            <h1 class="page-title"> Chỉnh Sửa loại tinh tức</h1>
        </header>
        <div class="page-section">
            <form method="post" action="{{route('categories.update',$category->id)}}">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-body">
                        <legend>Thông tin cơ bản</legend>
                        <div class="form-group">
                            <label for="tf1">Tên Loại Tin</label>
                            <input type="text" name="name" class="form-control" placeholder="Nhập tên loại tin" value="{{$category->name }}">
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('name') }}</p>
                            @endif
                        </div>
                        <div class="form-actions">
                            <a class="btn btn-secondary float-right " href="{{route('categories.index')}}">Hủy</a>
                            <button style="float: right;" class="btn btn-primary ml-auto mr-2" type="submit">Lưu</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
