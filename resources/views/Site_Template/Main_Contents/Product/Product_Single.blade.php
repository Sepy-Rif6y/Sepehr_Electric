@extends('Site_Template.index')
@section('title')
@parent
{{$title}}
@endsection
@section('MainContent')
<main class="position-relative">
    <div class="container">
        <!--end entry header-->
        <div class="row mb-50">
            <div class="col-lg-8 col-md-12">
                <figure class="single-thumnail mb-30">
                    @if (file_exists(public_path('storage\\ProductsImage\\').$product_info->image))
                    <img src="{{asset('storage\\ProductsImage\\').$product_info->image}}">
                    @else
                    <img src="{{asset('Images/Image Not Found.jpg')}}">
                    @endif
                </figure>
                <div class="entry-header entry-header-1 mb-30 mt-50">
                    <div class="entry-meta meta-0 font-small mb-30"><a href="{{route('Same-Category',$product_info->category_id)}}"><span class="post-cat color-white" style="background-color: {{$product_info->category->category_color}}">{{$product_info->category_name}}</span></a></div>
                    <h1 class="post-title mb-30">
                        {{$product_info->title}}
                    </h1>
                </div>
                <div class="single-excerpt">
                    <p class="font-large">{{$product_info->description}}</p>
                </div>
                <div class="font-medium font-weight-bold mb-30"><a href="{{route('Same-Factory',$product_info->factory_id)}}"><span class="post-cat color-grey bg-gray"> شرکت: <span class="color2">{{$product_info->factory_name}}</span></span></a></div>
                <br>
                <br>
                <br>
                <!--related posts-->
                <div class="related-posts">
                    <h3 class="mb-30">محصولات مرتبط در همین دسته بندی</h3>
                    <div class="row">
                        @if ($category_No_Match)
                            <h4>{{$category_No_Match}}</h4>
                        @else
                        @foreach ($category_match as $item)
                        <article class="col-lg-4">
                            <div class="background-white border-radius-10 p-10 mb-30">
                                <div class="post-thumb d-flex mb-15 border-radius-15 img-hover-scale">
                                    <a href="{{route('Single-Show',$item->id)}}">
                                        @if (file_exists(public_path('storage\\ProductsImage\\').$item->image))
                                        <img class="border-radius-15" src='{{asset('storage\\ProductsImage\\').$item->image}}' alt="">
                                        @else
                                        <img class="border-radius-15" src="{{asset('Images/Image Not Found.jpg')}}">
                                        @endif
                                    </a>
                                </div>
                                <div class="pl-10 pr-10">
                                    <div class="entry-meta mb-15 mt-10">
                                        {{-- <a class="entry-meta meta-2" href="category.html"><span class="post-in color2 font-x-small"></span></a> --}}
                                    </div>
                                    <h5 class="post-title mb-15">
                                        <a href="{{route('Single-Show',$item->id)}}">{{$item->title}}</a></h5>
                                    <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase mb-10">
                                        <span class="post-by">شرکت <a href="{{route('Same-Factory',$item->factory_id)}}">{{$item->factory_name}}</a></span>
                                    </div>
                                </div>
                            </div>
                        </article>
                        @endforeach
                        @endif
                    </div>
                </div>
                <br>
                <div class="related-posts">
                    <h3 class="mb-30">محصولات مرتبط در همین کارخانه</h3>
                    <div class="row">
                        @if ($factory_No_Match)
                            <h4>{{$factory_No_Match}}</h4>
                        @else
                        @foreach ($factory_match as $item)
                        <article class="col-lg-4">
                            <div class="background-white border-radius-10 p-10 mb-30">
                                <div class="post-thumb d-flex mb-15 border-radius-15 img-hover-scale">
                                    <a href="{{route('Single-Show',$item->id)}}">
                                        @if (file_exists(public_path('storage\\ProductsImage\\').$item->image))
                                        <img class="border-radius-15" src='{{asset('storage\\ProductsImage\\').$item->image}}' alt="">
                                        @else
                                        <img class="border-radius-15" src="{{asset('Images/Image Not Found.jpg')}}">
                                        @endif
                                    </a>
                                </div>
                                <div class="pl-10 pr-10">
                                    <div class="entry-meta mb-15 mt-10">
                                        <a class="entry-meta meta-2" href="{{route('Same-Category',$item->category_id)}}"><span class="post-in font-x-small" style="color: {{$item->category->category_color}}">{{$item->category_name}}</span></a>
                                    </div>
                                    <h5 class="post-title mb-15">
                                        <a href="{{route('Single-Show',$item->id)}}">{{$item->title}}</a></h5>
                                    <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase mb-10">
                                        {{-- <span class="post-by">شرکت <a href="author.html">{{$item->factory_name}}</a></span> --}}
                                    </div>
                                </div>
                            </div>
                        </article>
                        @endforeach
                        @endif
                    </div>
                </div>
                <!--Comments-->
                <div class="comments-area">
                    <h3 class="mb-30">3 نظرات</h3>
                    <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="assets/imgs/authors/author-2.png" alt="">
                                </div>
                                <div class="desc">
                                    <p class="comment">
                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی.
                                    </p>
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <h5>
                                                <a href="#">الناز روستایی</a>
                                            </h5>
                                            <p class="date">4 فروردین 1400 ساعت 3:12 بعد از ظهر </p>
                                        </div>
                                        <div class="reply-btn">
                                            <a href="#" class="btn-reply text-uppercase">پاسخ</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="assets/imgs/authors/author-3.png" alt="">
                                </div>
                                <div class="desc">
                                    <p class="comment">
                                        سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد.
                                    </p>
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <h5>
                                                <a href="#">سعید شمس</a>
                                            </h5>
                                            <p class="date">4 فروردین 1400 ساعت 3:12 بعد از ظهر </p>
                                        </div>
                                        <div class="reply-btn">
                                            <a href="#" class="btn-reply text-uppercase">پاسخ</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="assets/imgs/authors/author-16.png" alt="">
                                </div>
                                <div class="desc">
                                    <p class="comment">
                                        طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل.
                                    </p>
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <h5>
                                                <a href="#">مهتاب رضایی</a>
                                            </h5>
                                            <p class="date">4 فروردین 1400 ساعت 3:12 بعد از ظهر </p>
                                        </div>
                                        <div class="reply-btn">
                                            <a href="#" class="btn-reply text-uppercase">پاسخ</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--comment form-->
                <div class="comment-form">
                    <h3 class="mb-30">ارسال نظرات</h3>
                    <form class="form-contact comment_form" action="#" id="commentForm">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="name" id="name" type="text" placeholder="نام">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="email" id="email" type="email" placeholder="ایمیل">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" name="website" id="website" type="text" placeholder="سایت">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="نظرات"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="button button-contactForm">ارسال نظر</button>
                        </div>
                    </form>
                </div>
            </div>
            <!--End col-lg-8-->
            <!--End col-lg-4-->
        </div>
        <!--End row-->
        <div class="row">
            <div class="col-12 text-center mb-50">
                <a href="#">
                    <img class="border-radius-10 d-inline" src="assets/imgs/ads-3.png" alt="">
                </a>
            </div>
        </div>
    </div>
</main>
@endsection
@section('sidebar_left')@endsection
