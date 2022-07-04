<div class="top-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4">
                <div class="logo">
                    <a href="{{ route('website.home')}}">
                        <img src="{{asset('img/logo.png')}}" alt="Logo">
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-4">
                <form action="{{ route('website.search')}}" method="get" style="width: 100%;">
                    <div class="input-group has-clearable">
                        <div class="input-group-prepend trigger-submit">
                            <span class="input-group-text"><span class="fas fa-search"></span></span>
                        </div>
                        <input type="text" class="form-control" name="title" value="" placeholder="Tìm kiếm">
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-md-4">
            </div>
        </div>
    </div>
</div>