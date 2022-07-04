@extends('frontend.layouts.master')
@section('content')
<!-- Breadcrumb Start -->

<!-- Breadcrumb End -->


<!-- Single News Start-->

<div class="single-news">
    <div class="container-fluid">
        <div class="row">
            @foreach($news as $new)
            <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                <div class="single-product">
                    <div class="product-img">
                        @if(!isset($new->image))
                        <a href="{{ route('website.detailNews',$new->id )}}">
                            <img class="default-img" src="https://www.caza.vn/_nuxt/img/3c27315.jpg" alt="#" style='width:100%; height: 300px'>
                        </a>
                        @else
                        <a href="{{ route('website.detailNews',$new->id )}}">
                            <img class="default-img" src="{{$new->image}}" alt="#" style='width:100%; height: 300px'>
                        </a>
                        @endif
                        <div class="cn-content">
                            <div class="cn-content-inner">
                                <a class="cn-date" href=""><i class="far fa-clock"></i>{{ $new->created_at->Format('d/m/Y') }}</a><br>
                                <b><a class="cn-title" href="{{ route('website.detailNews',$new->id )}}" style="width:275px">{{
                                    $new->title}}</a></b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            @endforeach
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div style="float:right">
            {{ $news->links() }}
        </div>
    </div>
</div>

@endsection
