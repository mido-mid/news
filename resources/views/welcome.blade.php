@extends('layouts.app')

@section('content')

    <!-- =====================================
    	==== Start top news-->
    <section class="hero section-padding pb-0 " style="padding-top:90px">
        <div class="container">
            <div class="row" style="background-image: url(img/LBEend2.jpg); width: 100%; padding-top: 40px; margin: 0;">
                <div class="offset-lg-2 col-lg-8 text-center mb-80" >
                    <img src="img/logo.png" alt="logo" style="margin-left: 20px;width: 100%;height: 200px;">
                </div>
            </div>
            <div style="margin:30px">
                <h4 class="text-right"> مرحبا بك في منصة مصر</h4>
            </div>
            <div  class="row" >
                <div class="col-lg-6 col-12 " style="height: 500px; margin-bottom: 5px;">
                    <div class="" >
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                @for($i = 0; $i < count($latest_news); $i++)
                                    <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}" @if ($i == 0) class="active" @endif></li>
                                @endfor
                            </ol>
                            <div class="carousel-inner">
                                @foreach($latest_news as $new)
                                    <div class="carousel-item @if ($loop->first == true) active @endif">
                                        @if(count($new->media) > 0)
                                            <img class="d-block w-100" src="{{asset('media')}}/{{$new->media[0]->filename}}" alt="First slide" style="height: 460px;width: 100%;">
                                        @else
                                            <img src="{{asset('media')}}/1.jpg" alt="" style="height: 460px;width: 100%">
                                        @endif
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5> <a href="{{route('news.show',$new->id)}}">{{$new->title}}</a></h5>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev" style="display: flex;">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next" style="display: flex;">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>


                    </div>
                </div>
                <div class="col-lg-3" style="margin-bottom: 5px;">
                    <div class="">
                        <div class="item text-center " style="padding:0;">
                            <div class="post-img">
                                @if(count($latest_four_news[0]->media) > 0)
                                    <img src="{{asset('media')}}/{{$latest_four_news[0]->media[0]->filename}}" alt="" style="margin: 0;width: 100%;">
                                @else
                                    <img src="{{asset('media')}}/1.jpg" alt="" style="margin: 0;width: 100%;">
                                @endif
                            </div>
                            <div class="content">
                                    <span class="tag">
                                        <p> بقلم / {{$latest_four_news[0]->author}}</p>
                                    </span>
                                <h5><a href="{{route('news.show',$latest_four_news[0]->id)}}">{{\Str::limit($latest_four_news[0]->title, 150)}}</a> </h5>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="item text-center " style="padding:0;">
                            <div class="post-img">
                                @if(count($latest_four_news[1]->media) > 0)
                                    <img src="{{asset('media')}}/{{$latest_four_news[1]->media[0]->filename}}" alt="" style="margin: 0;width: 100%;">
                                @else
                                    <img src="{{asset('media')}}/1.jpg" alt="" style="margin: 0;width: 100%;">
                                @endif
                            </div>
                            <div class="content">
                                    <span class="tag">
                                        <p> بقلم / {{$latest_four_news[1]->author}}</p>
                                    </span>
                                <h5><a href="{{route('news.show',$latest_four_news[1]->id)}}">{{\Str::limit($latest_four_news[1]->title, 150)}}</a> </h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3" style="margin-bottom: 5px;">
                    <div class="">
                        <div class="item text-center " style="padding:0;">
                            <div class="post-img">
                                @if(count($latest_four_news[2]->media) > 0)
                                    <img src="{{asset('media')}}/{{$latest_four_news[2]->media[0]->filename}}" alt="" style="margin: 0;width: 100%;">
                                @else
                                    <img src="{{asset('media')}}/1.jpg" alt="" style="margin: 0;width: 100%;">
                                @endif
                            </div>
                            <div class="content">
                                    <span class="tag">
                                        <p> بقلم / {{$latest_four_news[2]->author}}</p>
                                    </span>
                                <h5><a href="{{route('news.show',$latest_four_news[2]->id)}}">{{\Str::limit($latest_four_news[2]->title, 150)}}</a> </h5>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="item text-center " style="padding:0;">
                            <div class="post-img">
                                @if(count($latest_four_news[3]->media) > 0)
                                    <img src="{{asset('media')}}/{{$latest_four_news[3]->media[0]->filename}}" alt="" style="margin: 0;width: 100%;">
                                @else
                                    <img src="{{asset('media')}}/1.jpg" alt="" style="margin: 0;width: 100%;">
                                @endif
                            </div>
                            <div class="content">
                                    <span class="tag">
                                        <p> بقلم / {{$latest_four_news[3]->author}}</p>
                                    </span>
                                <h5><a href="{{route('news.show',$latest_four_news[3]->id)}}">{{\Str::limit($latest_four_news[3]->title, 150)}}</a> </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End top news ====
    ======================================= -->

    <!-- =====================================
    ==== Start all news -->

    <section dir="rtl" class="portfolio  "  >
        <div class="container">
            <div dir="rtl"  class=" section-head col-sm-12 text-right ">
                <h4 class="">
                    <span>احدث</span><br>
                    المواضيع
                </h4>
            </div>

            <!-- filter links -->
            <div  class="filtering col-sm-12 text-right " >
                <span data-filter='*' class="active" > الكل</span>
                @foreach($categories as $category)
                    @if(count($category->news) > 0)
                        <span data-filter='.{{$category->id}}' style="margin-right:30px ;" >{{$category->name}}</span>
                    @endif
                @endforeach
            </div>
        </div>


        <div class="clearfix"></div>
        <div class="">
            <div dir="rtl" class="row">
                <!-- all -->
                <div class="gallery text-center full-width">
                    @foreach($categories as $category)
                        @if(count($category->news) > 0)
                            <div class="col-md-12 items {{$category->id}}" style="background-image: url({{asset('category_images')}}/{{$category->image}}); padding-top: 30px;padding-bottom: 30px;background-size: cover;">
                                <div class="blog">
                                    <div class="container">
                                        <div class="row">
                                            @foreach($category->news as $new)

                                                <div class="col-lg-4">
                                                    <div class="item text-center mb-md50">
                                                        <div class="post-img">
                                                            @if(count($new->media) > 0)
                                                                <img src="{{asset('media')}}/{{$new->media[0]->filename}}" alt="" style="width: 100%; height: 230px;">
                                                            @else
                                                                <img src="{{asset('media')}}/1.jpg" alt="" style="width: 100%; height: 230px;">
                                                            @endif
                                                            <div class="date">
                                                                <span>
                                                                    @php
                                                                        $timestamp = strtotime($new->created_at);

                                                                        $day = date('d', $timestamp);

                                                                        echo $day
                                                                    @endphp
                                                                </span>
                                                                <span>
                                                                    @php
                                                                        $timestamp = strtotime($new->created_at);

                                                                        $day = date('M', $timestamp);

                                                                        echo $day
                                                                    @endphp
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="content" style="height: 250px">
                                                            <span class="tag">
                                                                <a href="{{route('news.show',$new->id)}}"> بقلم / {{$new->author}}</a>
                                                            </span>
                                                            <h5><a href="{{route('news.show',$new->id)}}">{{$new->title}}</a> </h5>
                                                            <p>{{\Str::limit($new->body, 150)}}</p>
                                                        </div>
                                                    </div>
                                                </div>

                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach

                    <div class="clear-fix"></div>
                </div>

            </div>
        </div>
    </section>

    <!--start ADs-->
    @if(count($sponsors) > 0)
        <section class="team section-padding ">
            <div class="container">
                <div class="row">
                    <div  class="section-head col-sm-12 text-right">
                        <h4>
                            الإعلانات
                        </h4>
                    </div>
                    <div class="feat bg-gray pt-80 pb-50 ">
                        <div dir="rtl" class = "container">
                            <div class="row">
                                @foreach($sponsors as $sponsor)
                                    <div class="col-lg-4" style="height: 250px;margin-bottom: 30px">
                                        <div class="item text-center mb-md50 " >
                                            <div class="post-img">
                                                <a href="{{$sponsor->link}}">
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

    <!-- End all news ====
    ======================================= -->

    <!-- =====================================
        ==== Start Team -->
    <section class="team section-padding ">
        <div class="container">
            <div class="row">

                <div  class="section-head col-sm-12 text-right">
                    <h4>
                        <span>فريق عمل</span><br>
                        جريدة منصة مصر
                    </h4>
                </div>

                <div class="owl-carousel owl-theme col-sm-12">
                    <div class="titem text-center">
                        <div class="team-img">
                            <img src="img/team/leader.jpg" alt="">
                        </div>
                        <div class="info">
                            <h6>ايمن صيام</h6>
                            <span>رئيس الجريدة</span>

                        </div>
                    </div>

                    <div class="titem text-center">
                        <div class="team-img">
                            <img src="img/team/leader.jpg" alt="">
                        </div>
                        <div class="info">
                            <h6>ايمن صيام</h6>
                            <span>رئيس الجريدة</span>

                        </div>
                    </div>

                    <div class="titem text-center">
                        <div class="team-img">
                            <img src="img/team/leader.jpg" alt="">
                        </div>
                        <div class="info">
                            <h6>ايمن صيام</h6>
                            <span>رئيس الجريدة</span>

                        </div>
                    </div>

                    <div class="titem text-center">
                        <div class="team-img">
                            <img src="img/team/leader.jpg" alt="">
                        </div>
                        <div class="info">
                            <h6>ايمن صيام</h6>
                            <span>رئيس الجريدة</span>

                        </div>
                    </div>

                    <div class="titem text-center">
                        <div class="team-img">
                            <img src="img/team/leader.jpg" alt="">
                        </div>
                        <div class="info">
                            <h6>ايمن صيام</h6>
                            <span>رئيس الجريدة</span>

                        </div>
                    </div>

                    <div class="titem text-center">
                        <div class="team-img">
                            <img src="img/team/leader.jpg" alt="">
                        </div>
                        <div class="info">
                            <h6>ايمن صيام</h6>
                            <span>رئيس الجريدة</span>

                        </div>
                    </div>
                    <div class="titem text-center">
                        <div class="team-img">
                            <img src="img/team/leader.jpg" alt="">
                        </div>
                        <div class="info">
                            <h6>ايمن صيام</h6>
                            <span>رئيس الجريدة</span>

                        </div>
                    </div>

                    <div class="titem text-center">
                        <div class="team-img">
                            <img src="img/team/leader.jpg" alt="">
                        </div>
                        <div class="info">
                            <h6>ايمن صيام</h6>
                            <span>رئيس الجريدة</span>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-lg-12 " style=" height: 250px; margin-top: 20px;">
            <div class="item text-center mb-md50 container" >
                <div class="post-img">
                    <img src="img/logo2.jpg" alt="" style="margin: 0;width: 100%;height: 200px;">
                </div>
            </div>
        </div>
    </section>

    <!-- End Team ====
    ======================================= -->

@endsection
