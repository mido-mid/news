@extends('layouts.app')

@section('content')
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
                    <div class="col-12 mb-20 mt-30">
                        <img  src="{{asset('img')}}/logo2.jpg" style="height: 200px;"  />
                    </div>

                    <div dir="rtl" class="col-lg-9 col-12 text-right" style="padding-top: 5px;">
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
    <section class="hero section-padding pb-0 " >
        <div class=" bg-gray pt-30 pb-40 mb-60 mt-30">
            <div dir="rtl" class = "container">
                <div class="row">
                    <div class="col-lg-4 mb-30px" style=" height: 250px;">
                        <div class="item text-center mb-50 " >
                            <div class="post-img">
                                <img src="{{asset('img')}}/logo2.jpg" alt="" style="margin: 0;width: 100%;height: 200px;">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-30px" style=" height: 250px;">
                        <div class="item text-center mb-50 " >
                            <div class="post-img">
                                <img src="{{asset('img')}}/logo2.jpg" alt="" style="margin: 0;width: 100%;height: 200px;">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-30px" style=" height: 250px;">
                        <div class="item text-center mb-50 " >
                            <div class="post-img">
                                <img src="{{asset('img')}}/logo2.jpg" alt="" style="margin: 0;width: 100%;height: 200px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End adv ====
    ======================================= -->
@endsection
