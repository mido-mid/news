@extends('layouts.app')

@section('content')
    <!-- =====================================
    	==== Start top news-->
    <section class="hero section-padding pb-0 " style="padding-top:90px">
        <div class="container">
            <div class="row" >
                <div class=" col-lg-12 text-center mb-50" >
                    <img src="{{asset('category_images')}}/{{$category->image}}" alt="logo" style="width: 100%;height: 300px;">
                </div>
            </div>

            @if(count($category_latest_news) > 0)
                <div  class="row" >
                    <div class=" col-12 " style="height: 500px; margin-bottom: 5px; padding: 0;">
                        <div class="" >
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                @if(count($category_latest_news) > 1)
                                    <ol class="carousel-indicators">
                                        @for($i = 0; $i < count($category_latest_news); $i++)
                                            <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}" @if ($i == 0) class="active" @endif></li>
                                        @endfor
                                    </ol>
                                @endif
                                <div class="carousel-inner">
                                    @foreach($category_latest_news as $new)
                                        <div class="carousel-item @if ($loop->first == true) active @endif">
                                            @if(count($new->media) > 0)
                                                <img class="d-block w-100" src="{{asset('media')}}/{{$new->media[0]->filename}}" alt="First slide" style="height: 460px;width: 100%;">
                                            @else
                                                <img src="{{asset('media')}}/1.jpg" alt="" style="height: 460px;width: 100%;">
                                            @endif
                                            <div class="carousel-caption d-none d-md-block">
                                                <h5> <a href="{{route('news.show',$new->id)}}">{{$new->title}}</a></h5>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                @if(count($category_latest_news) > 1)
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
                    </div>
                </div>
            @else
                <p class="lead text-center">ليس هناك أخبار جديدة</p>
            @endif
        </div>
    </section>
    <!-- End top news ====
    ======================================= -->

    <section class="hero section-padding pb-0 " style="padding-top:10px">
        <div class="container" style="padding:0;">

            @if(count($category->news) > 0)
                @foreach($category->news as $category_new)
                    <div class="row" >
                        <div dir="rtl" class="news row col-lg-12 text-center mb-20" >
                            @if(count($category_new->media) > 0)
                                <img class=" col-lg-3 col-12" src="{{asset('media')}}/{{$category_new->media[0]->filename}}">
                            @else
                                <img class=" col-lg-3 col-12" src="{{asset('media')}}/1.jpg">
                            @endif
                            <div dir="rtl" class="col-lg-9 col-12" style="padding-top: 5px;">
                                <h6 class="col-lg-12 text-right mb-10" style="color: red;"> بقلم / {{$category_new->author}}</h6>
                                <h5 class="col-lg-12 text-right mb-10"><a href="{{route('news.show',$category_new->id)}}">{{$category_new->title}}</a> </h5>
                                <p class="col-12 text-right">{{\Str::limit($category_new->body, 200)}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            @else
                <p class="lead text-center">ليس هناك أخبار جديدة</p>
            @endif
            <nav class="d-flex justify-content-end" aria-label="...">
                {{ $category->news->links() }}
            </nav>
        </div>

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
@endsection
