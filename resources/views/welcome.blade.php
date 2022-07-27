<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <!-- Styles -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- PWA  -->
    <meta name="theme-color" content="#6777ef" />
    <link rel="apple-touch-icon" href="{{ asset('logo.PNG') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">

    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <style>

    </style>
</head>

<body class="hero-anime">
    <style src="{{ asset('css/home.css') }}"></style>
    @include('include.navbar')
    <div class="section full-height">
        <div class="absolute-center">
            <div class="section">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h1>
                                <span>ค้</span><span>น</span><span>ห</span><span>า</span><span>โ</span><span>ร</span><span>ง</span><span>ง</span><span>า</span><span>น</span><span>ข</span><span>อ</span><span>ง</span><span>เ</span><span>ร</span><span>า</span>
                            </h1>
                            <form class="input-group" method="POST" action="{{route('search')}}">
                                @csrf
                                <input type="text" class="form-control" style="width: 50%" placeholder="Search" name="search">
                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>
                                </div>
                            </form>
                            <p>เลื่อนเพื่อเปลี่ยนเป็นโหมดกลางคืน </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section mt-2">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div id="switch">
                                <div id="circle"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section mt-5">
                <div class="container">
                    <div class="row justify-content-start">
                        @foreach ($infos as $info)
                        <div class="col-md-3">
                            <div class="card h-100">
                                <div class="image-container"><img src="{{$info->img}}" alt="fac-logo">
                                    <div class="text">{{$info->fac_name}}</div>
                                </div>
                                <div class="card-body">
                                    <h6>{{$info->info_title}}</h6>
                                    {{$info->created_at}}
                                </div>
                                <div class="card-footer">
                                    <div class="d-flex justify-content-end">
                                        <a href="#">ดูเพิ่มเติม <i class="fas fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="my-5 py-5">
    </div>

    <!-- Link to page
  ================================================== -->

    <a href="https://front.codes/" class="logo" target="_blank">
        <img src="https://assets.codepen.io/1462889/fcy.png" alt="">
    </a>

</body>

</html>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="{{ asset('js/home.js') }}"></script>

<script>
    if (!navigator.serviceWorker.controller) {
        navigator.serviceWorker.register("/sw.js").then(function(reg) {
            console.log("Service worker has been registered for scope: " + reg.scope);
        });
    }
</script>