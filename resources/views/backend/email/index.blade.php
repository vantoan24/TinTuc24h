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
            <h1 class="page-title mr-sm-auto"> Quản Lý Email</h1>
            <div class="btn-toolbar">
                <a href="{{ route('email.create') }}" class="btn btn-dark">
                    <i class="fa-solid fa fa-plus"></i>
                    <span class="ml-1">Thêm Mới</span>
                </a>
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
                        <form action="{{ route('test')}}" style="display:inline" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-success sent">Xóa Nhanh</button>
                                @if ($errors->any())
                                <p style="color:red">{{ $errors->first('ids') }}</p>
                                @endif
                        <table class="table align-items-center table-flush table-borderless">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="checkAll" >#</th>
                                    <th>Email</th>
                                    <th>Ngày tạo</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
                            @foreach($newsletters as $newsletter)
                            <tbody>
                                <tr>
                                    <td><input type="checkbox" class="checkItem" name="ids[{{$newsletter->id}}]" value="{{$newsletter->id}}">
                                        {{ $newsletter->id}}
                                    </td>
                                    <td>{{ $newsletter->email }}</td>
                                    <td> {{ $newsletter->created_at->Format('d/m/Y')}}</td>
                                    <td>
                                        <span class="sr-only">Edit</span></a> <a href="{{route('email.edit',$newsletter->id)}}" class="btn btn-sm btn-icon btn-secondary"><i class="fas fa-pencil-alt"></i>
                                            <span class="sr-only">Remove</span></a>
                                        <form action="{{ route('email.destroy',$newsletter->id )}}" style="display:inline" method="post">
                                            <button onclick="return confirm('Xóa {{$newsletter->email}} ?')" class="btn btn-sm btn-icon btn-secondary"><i class="far fa-trash-alt"></i></button>
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </form>
            </div>
            <div style="float:right">
                {{ $newsletters->links() }}
            </div>

            </div>
        </div>
        <!--End Row-->
    </div>
</div>
<script>
    $('#checkAll').click(function () {
         $(':checkbox.checkItem').prop('checked', this.checked);
 });
</script>
@endsection
