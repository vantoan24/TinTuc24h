@extends('backend.layouts.master')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <header class="page-title-bar">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        <a href="{{route('email.index')}}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Quản Lý
                            email</a>
                    </li>
                </ol>
            </nav>
            <h1 class="page-title"> Thêm Mới Email</h1>
        </header>
        <div class="page-section">
            <form method="post" action="{{route('email.store')}}">
                @csrf
                <div class="card">
                    <div class="card-body">
                        {{-- <legend>Thông tin cơ bản</legend> --}}
                        <div class="form-group">
                            <label for="tf1">Tên Email</label> <input name="email" type="email" class="form-control" id="" placeholder="Nhập email"> <small id="" class="form-text text-muted"></small>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('email') }}</p>
                            @endif
                        </div>
                        <div class="form-actions">
                            <a class="btn btn-secondary float-right " href="{{route('email.index')}}">Hủy</a>
                            <button style="float: right;" class="btn btn-primary ml-auto mr-2" type="submit">Lưu<noscript></noscript> </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
