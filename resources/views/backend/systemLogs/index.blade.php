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
        <div class="card-body">
            <div class="row mb-2">
                <div class="col">
                    <form action="" method="GET" id="form-search" class="form-dark">
                        <div class="input-group input-group-alt">
                            <div class="input-group-prepend">
                                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                   Tìm nâng cao
                                  </button>
                            </div>
                        </div>
                        @include('backend.systemLogs.modals.modalSearch')
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush table-borderless">
                            <thead>
                                <tr>

                                    <th>#</th>
                                    <th>Các Hoạt Động</th>
                                </tr>
                            </thead>
                            @foreach($items as $key => $item)
                            <tbody>
                                <tr>
                                    <td>{{ ++$key}}</td>
                                    <td>{{ $item->data }}</td>
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
