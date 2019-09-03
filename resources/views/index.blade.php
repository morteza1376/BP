

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/index-style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <title>سیستم کابخانه خوابگاه - صفحه اصلی</title>
</head>
<body>
    
    <div class="container-fluid px-0">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner " role="listbox">
                <div class="carousel-item min-vh-100 active" style="background:url('images/lib1.jpg');background-repeat: no-repeat;background-position: center;background-size: cover;">
                    <div class="d-flex align-items-center justify-content-center" style="margin-top:20vw">
                        <h1 class="display-1 text-light">سیستم کتابخانه خوابگاه یزدیان</h1>
                    </div>
                    <div class="d-flex align-items-center justify-content-center" style="margin-top:30px">
                    <a class="btn btn-lg btn-success text-light" href="{{ route('dashboard') }}">ورود به سامانه</a>
                    </div>
                </div>
                <div class="carousel-item" style="background:url('images/lib2.png');background-repeat: no-repeat;background-position: center;background-size: cover;">
                    <div class="d-flex align-items-center justify-content-center min-vh-100">
                        <h1 class="display-1 text-light">یزد، پایتخت کتاب ایران</h1>
                    </div>
                </div>
                <div class="carousel-item" style="background:url('images/lib3.jpg');background-repeat: no-repeat;background-position: center;background-size: cover;">
                    <div class="d-flex align-items-center justify-content-center min-vh-100">
                        <h1 class="display-1">سیستم هوشمند</h1>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>


</body>
</html>