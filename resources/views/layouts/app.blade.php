<?php

use Illuminate\Support\Facades\DB;

$categories = DB::table('categories')->get();

foreach ($categories as $category){
    $category->news = DB::table('news')->where('category_id',$category->id)
        ->orderBy('created_at','desc')->limit(3)->get();

    if(count($category->news) > 0){
        foreach ($category->news as $new){
            $new->media = DB::table('media')->where('news_id',$new->id)->get();
        }
    }
}

?>
<!DOCTYPE html>
<html lang="zxx">

<head>

    <!-- Metas -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="keywords" content="HTML5 Template Bemax onepage themeforest" />
    <meta name="description" content="Bemax - Onepage Multi-Purpose HTML5 Template" />
    <meta name="author" content="" />

    <!-- Title  -->
    <title>جريدة منصة مصر</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('img')}}/logo.png" />

    <link rel="stylesheet" href="{{ asset('css') }}/bootstrap.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:200,300,400,500,600,700,800" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Codystar&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@200&family=Poppins&display=swap" rel="stylesheet">

    <!-- Plugins -->
    <link rel="stylesheet" href="{{  asset('css') }}/plugins.css" />

    <!-- Core Style Css -->
    <link rel="stylesheet" href="{{  asset('css') }}/style.css" />

</head>

<body>


<!-- =====================================
==== Start Navbar -->

<nav class="navbar navbar-expand-lg " style="border-bottom:1px solid rgb(138, 138, 138) ;" >

    <div class="container" >

        <!-- Logo -->
        <a class="logo" href="#">
            <img src="{{asset('img')}}/logo-light.png" alt="logo" style="height: 60px;width: 60px;">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar" style=""><i class="fas fa-bars"></i></span>
        </button>

        <!-- navbar links -->
        <div dir="rtl" class=" collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link {{ Request::path() == '/' ? 'active' : '' }}" href="{{route('main')}}" >الرئيسية</a>
                </li>

                @foreach($categories as $category)
                    @if(count($category->news) > 0)
                        <li class="nav-item">
                            <a class="nav-link {{ Request::path() == 'categories/'.$category->id ? 'active' : '' }}" href="{{route('categories.show',$category->id)}}">{{$category->name}}</a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
    <div dir="rtl" class="date-div row" >
        <p style="color: red;margin-left: 5px">تاريخ اليوم </p><p style="color: red">{{ date("d/m/Y") }}</p>
    </div>
</nav>


<!-- End Navbar ====
======================================= -->




@yield('content')




<!-- =====================================
==== Information -->
<section  class="information bg-img "  data-background="{{asset('img')}}/bg3.jpg" >
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="info">
                    <div class="item text-right" style="background-color: #a60334">
                        <span class="icon"><i class="icofont icofont-phone"></i></span>
                        <div class="cont">
                            <h6>الهاتف : </h6>
                            <p style="color:#FFF;">+20 01051007 8918<br>+20 010 0000 8919</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="info">
                    <div class="item text-right" style="background-color: #a60334">
                        <span class="icon"><i class="icofont icofont-map"></i></span>
                        <div class="cont">
                            <h6>العنوان : </h6>
                            <p style="color: #FFFF">3rd Avenue, East Side<br> San Francisco</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="info">
                    <div class="item text-right" style="background-color: #a60334">
                        <span class="icon"><i class="icofont icofont-email"></i></span>
                        <div class="cont">
                            <h6>البريد الالكتروني : </h6>
                            <p style="color: #FFF">contact@youradress.com<br>support@youradress.com</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- Information ====
======================================= -->


<!-- =====================================
==== Start Footer -->
<footer class="text-center" >
    <div class="container" >

        <!-- Logo -->
        <a class="logo" href="{{$footer_sponsor->link}}" style="width: 100%;" target="_blank">
            <img src="{{asset('sponsor_images')}}/{{$footer_sponsor->image}}" alt="logo" style="width: 100%; height: 200px;">
        </a>
        <div dir="rtl" class="row">
            @foreach($categories as $category)
                @if(count($category->news) > 0)
                    <div class="col-lg-4 text-right"  style=" height:150px;margin-top:20px;color: #FFF;">
                        <h4><a href="{{route('categories.show',$category->id)}}" >{{$category->name}}</a></h4>
                        @foreach($category->news as $new)
                            <a href="{{route('news.show',$new->id)}}" style="padding:5px;">{{\Str::limit($new->title, 50)}}</a><br>
                        @endforeach
                    </div>
                @endif
            @endforeach
        </div>

        <div class="social" >
            <a href="#0" style="color: #FFF"><i class="icofont icofont-social-facebook"></i></a>
            <a href="#0" style="color: #FFF"><i class="icofont icofont-social-twitter"></i></a>
            <a href="#0" style="color: #FFF"><i class="icofont icofont-social-instagram"></i></a>
            <span></span>
        </div>

        <a style="color: blue" href="{{route('contacts.create')}}">اضغط هنا </a> <p style="display:inline;color: #FFF">لإرسال الشكاوي و المقترحات من فضلك </p>
        <p style="color: #FFF;margin-bottom: 10px">&copy; جميع الحقوق محفوظة لجريدة منصة مصر</p>
    </div>
</footer>
<!-- End Footer ====
======================================= -->


<!-- jQuery -->
<script src="{{  asset('js') }}/jquery-3.0.0.min.js"></script>
<script src="{{  asset('js') }}/jquery-migrate-3.0.0.min.js"></script>

<!-- popper.min -->
<script src="{{  asset('js') }}/popper.min.js"></script>

<!-- bootstrap -->
<script src="{{  asset('js') }}/bootstrap.min.js"></script>

<!-- scrollIt -->
<script src="{{  asset('js') }}/scrollIt.min.js"></script>

<!-- animated.headline -->
<script src="{{  asset('js') }}/animated.headline.js"></script>

<!-- jquery.waypoints.min -->
<script src="{{  asset('js') }}/jquery.waypoints.min.js"></script>

<!-- jquery.counterup.min -->
<script src="{{  asset('js') }}/jquery.counterup.min.js"></script>

<!-- owl carousel -->
<script src="{{  asset('js') }}/owl.carousel.min.js"></script>

<!-- jquery.magnific-popup js -->
<script src="{{  asset('js') }}/jquery.magnific-popup.min.js"></script>

<!-- stellar js -->
<script src="{{  asset('js') }}/jquery.stellar.min.js"></script>

<!-- isotope.pkgd.min js -->
<script src="{{  asset('js') }}/isotope.pkgd.min.js"></script>

<!-- YouTubePopUp.jquery -->
<script src="{{  asset('js') }}/YouTubePopUp.jquery.js"></script>

<!-- Map -->
<script src="{{  asset('js') }}/map.js"></script>

<!-- validator js -->
<script src="{{  asset('js') }}/validator.js"></script>

<!-- custom scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>

<script src="{{  asset('js') }}/scripts.js"></script>




</body>
</html>
