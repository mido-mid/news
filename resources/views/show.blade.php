<?php

use Illuminate\Support\Facades\DB;

$categories = DB::table('categories')->get();

foreach ($categories as $category){
    $category->news = DB::table('news')->where('category_id',$category->id)
        ->orderBy('created_at','desc')->limit(3)->get();

    if(count($category->news) > 0){
        foreach ($category->news as $category_new){
            $category_new->media = DB::table('media')->where('news_id',$category_new->id)->get();
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
    <meta name="twitter:title" content="جريدة منصة مصر">
    <meta name="twitter:description" content=" جريدة متخصصة في الاخبار المحليه و العالميه لتجعلك في الحدث اولا بأول و توافيك باخر الاخبار">
    <meta name="twitter:image" content="img/logo.jpg">
    <meta name="twitter:card" content="summary_large_image">

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
    <!-- =====================================
    	==== Start topic title -->
    <section class="hero section-padding pb-0 " style="padding-top:90px">
        <div class="container pb-20 pt-20">
            <h2 class="text-center ">{{$new->title}}</h2>
        </div>
    </section>
    <!-- End topic title  ====
    ======================================= -->

    <!-- =====================================
    ==== Start tobic-->
    <section class="hero section-padding pb-0 " style="padding-top:10px">
        <div class="container" style="padding:0;">
            <div class="row" >
                <div dir="rtl" class="topic-div row col-lg-12 text-center mb-20" >
                    @if(count($new->media) > 0)
                        <div class="col-12" >
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                @if(count($new->media) > 1)
                                    <ol class="carousel-indicators">
                                        @for($i = 0; $i < count($new->media); $i++)
                                            <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}" @if ($i == 0) class="active" @endif></li>
                                        @endfor
                                    </ol>
                                @endif
                                <div class="carousel-inner">
                                    @foreach($new->media as $media)
                                        <div class="carousel-item @if ($loop->first == true) active @endif">
                                            <img class="d-block w-100" src="{{asset('media')}}/{{$media->filename}}" alt="First slide" style="height: 460px;width: 100%;">
                                        </div>
                                    @endforeach
                                </div>
                                @if(count($new->media) > 1)
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev" style="display: flex;">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next" style="display: flex;">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endif
                    <div class="col-lg-12 " style=" height: 250px; margin-top: 20px;">
                        <div class="item text-center mb-md50 container" >
                            <div class="post-img">
                                <a href="{{$body_sponsor->link}}" target="_blank">
                                    <img src="{{asset('sponsor_images')}}/{{$body_sponsor->image}}" alt="" style="margin: 0;width: 100%;height: 200px;">
                                </a>
                            </div>
                        </div>
                    </div>

                    <div dir="rtl" class="col-lg-9 col-12 text-right" style="margin-top:60px;padding-top: 5px;">
                        <p class="col-lg-12 text-left" style="color: red;margin-bottom: -20px"> بتاريخ : {{date("d/m/Y",strtotime($new->created_at))}}</p>
                        <h6 class="col-lg-12 text-right mb-10" style="color: red;"> بقلم / {{$new->author}}</h6>
                        <p class="col-12 text-right">{{$new->body}}</p>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- End tobic ====
    ======================================= -->

    <!-- =====================================
==== Start to news-->
    <section class="hero section-padding pb-0 " >
        <div class="container">
            <div dir="rtl"  class=" section-head col-sm-12 text-right ">
                <h4 class="">
                    <span>اخبار</span><br>
                    ذات صلة
                </h4>
            </div>
            <div dir="rtl" class="row" >
                @foreach($category_news as $category_new)
                    <div class="col-lg-4">
                        <div class="item text-center mb-md50">
                            <div class="post-img">
                                @if(count($category_new->media) > 0)
                                    <img src="{{asset('media')}}/{{$category_new->media[0]->filename}}" alt="" style="width: 100%; height: 230px;">
                                @else
                                    <img src="{{asset('media')}}/1.jpg" alt="" style="width: 100%; height: 230px;">
                                @endif
                            </div>
                            <div class="content">
                                <span class="tag" style="margin-top: 5px">
                                    <p> بقلم / {{$category_new->author}}</p>
                                </span>
                                <h5><a href="{{route('news.show',$category_new->id)}}">{{$category_new->title}}</a> </h5>
                                <p>{{\Str::limit($category_new->body, 150)}}</p>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </section>
    <!-- End top news ====
    ======================================= -->
    <!-- =====================================
==== Start adv-->
    @if(count($sponsors) > 0)
        <section class="team section-padding ">
            <div class="container">
                <div class="row">
                    <div  class="section-head col-sm-12 text-right">
                        <h4>
                            الإعلانات
                        </h4>
                    </div>
                    <div class="feat pt-80 pb-50 ">
                        <div dir="rtl" class = "container">
                            <div class="row">
                                @foreach($sponsors as $sponsor)
                                    <div class="col-lg-4" style="height: 250px;margin-bottom: 30px">
                                        <div class="item text-center mb-md50 " >
                                            <div class="post-img">
                                                <a href="{{$sponsor->link}}" target="_blank">
                                                    <img src="{{asset('sponsor_images')}}/{{$sponsor->image}}" alt="" style="margin: 0;width: 200px;height: 250px;">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- End adv ====
    ======================================= -->
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
                            <p style="color:#FFF;">+20 01270409037<br>+20 01018031747</p>
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
                            <p style="color: #FFFF">الجيزة
                                شارع محمود عزمي
                                ميدان الجيزة<br> إسكندرية
                                شارع الإقبال
                                أمام فيلا  مدير الأمن</p>
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
