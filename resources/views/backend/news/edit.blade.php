@extends('backend.layouts.master')
@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <header class="page-title-bar">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        <a href="{{route('news.index')}}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Quản Tinh Tức
                        </a>
                    </li>
                </ol>
            </nav>
            <h1 class="page-title"> Chỉnh Sửa loại tinh tức</h1>
        </header>
        @if (Session::has('message'))
        <div class="text text-danger"><b>{{session::get('message')}}</b></div>
        @endif
        <div class="page-section">
            <form method="post" action="{{route('news.update',$new->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="tf1">Ngày tạo tin</label>
                                <input name="puplish_date" type="date" class="form-control" value="{{ $new->puplish_date}}">
                                @if ($errors->any())
                                <p style="color:red">{{ $errors->first('puplish_date') }}</p>
                                @endif
                            </div>
                        </div>
                        <legend>Thông tin cơ bản</legend>
                        <div class="form-group">
                            <label for="tf1">Tiêu đề</label>
                            <input name="title" type="text" class="form-control" placeholder="Nhập tên Tiêu đề" value="{{ $new->title}}">
                            <small class="form-text text-muted"></small>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('title') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="tf1">Mô tả Tiêu đề</label>
                            <textarea id="summernote" name="description" type="text" class="form-control" placeholder="Nhập tên Tiêu đề">{{ $new->description}}</textarea>
                            <small class="form-text text-muted"></small>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('description') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Hình Ảnh:</label>
                            <input type="file" name="image" id="upload_file_input" class="form-control" value="{{ $new->image}}">
                            @if ($errors)
                            <div class="text-danger">{{$errors->first('image')}}</div>
                            @endif
                        </div>
                        <div class="form-group row gallery">
                            <div class="col-lg-2 {{ $new->id }}">
                                <div class="card card-figure">
                                    <figure class="figure">
                                        <div class="figure-img">
                                            <img class="img-fluid" src="{{ $new->image }}">
                                            <a href="{{ $new->image }}" class="img-link img-fluid-a" data-size="600x450">
                                                <span class="tile tile-circle bg-danger"><span class="oi oi-eye"></span></span>
                                                <span class="img-caption d-none">Image caption goes here</span>
                                            </a>
                                        </div>
                                    </figure>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tf1">Nội dung</label>
                            <textarea id="ckeditor2" name="content" type="text" class="form-control" placeholder="Nhập tên Nội dung">{{ $new->content}}</textarea>
                            <small class="form-text text-muted"></small>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('content') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label>Người đăng</label>
                                <select type="text" class="form-control" placeholder="danh mục" name="user_id" value="{{ $new->user_id}}">
                                    @foreach($users as $user)
                                    <option value="{{ $user->id }}" @selected($user->id ==$new->user_id)>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label>Loại Tin Tức</label>
                                <select type="text" class="form-control" placeholder="danh mục" name="category_id" value="{{ $new->category_id}}">
                                    @foreach($categories as $categoriy)
                                    <option value="{{ $categoriy->id }}" @selected($categoriy->id ==$new->category_id)>{{ $categoriy->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="tf1">Lượt xem</label>
                                    <input name="view" type="text"  class="form-control" placeholder="Nhập tên Tiêu đề" value="{{$new->view}}">
                                    <small class="form-text text-muted"></small>
                                    @if ($errors->any())
                                    <p style="color:red">{{ $errors->first('view') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label>Trạng Thái</label>
                                <select name="status" class="form-control">
                                    <option value="0" @selected($new->status == '0') >Ẩn</option>
                                    <option value="1" @selected($new->status == '1') >Hiện</option>
                                </select>
                                @if ($errors->any())
                                <p style="color:red">{{ $errors->first('status') }}</p>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <label>Tin Tức HOT</label>
                                <div class="form-group">
                                    <label class="switcher-control">
                                        <input type="hidden" name="hot" value="0">
                                        <input type="checkbox" class="switcher-input" name="hot" @checked( $new->hot == 1) value="1">
                                        <span class="switcher-indicator"></span>
                                    </label>
                                </div>
                                @if ($errors->any())
                                <p style="color:red">{{ $errors->first('hot') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="form-actions">
                            <a class="btn btn-secondary float-right " href="{{route('news.index')}}">Hủy</a>
                            <button style="float: right;" class="btn btn-primary ml-auto mr-2" type="submit">Lưu<noscript></noscript> </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
