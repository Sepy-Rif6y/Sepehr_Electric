<html class="no-js" lang="fa" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@section("title") Sepehr Electric @show</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/imgs/favicon.svg')}}">
    <!-- NewsViral CSS  -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/widgets.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/color.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    {{-- Custom Css --}}
    <link rel="stylesheet" href="{{asset('Css/Custom.css')}}">
</head>

<body>
<!-- Preloader Start -->
<!-- <div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="text-center">
                <img class="jump mb-50" src="assets/imgs/loading.svg" alt="">
                <h6>در حال بارگذاری</h6>
                <div class="loader">
                    <div class="bar bar1"></div>
                    <div class="bar bar2"></div>
                    <div class="bar bar3"></div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<div class="main-wrap">
    <!--Offcanvas sidebar-->
    <aside id="sidebar-wrapper" class="custom-scrollbar offcanvas-sidebar position-right">
        <button class="off-canvas-close"><i class="ti-close"></i></button>
        <div class="sidebar-inner">
            <!--Search-->
            <div class="siderbar-widget mb-50 mt-30">
                <form action="#" method="get" class="search-form position-relative">
                    <input type="text" class="search_field" placeholder="جستجو ..." value="" name="s">
                    <span class="search-icon"><i class="ti-search mr-5"></i></span>
                </form>
            </div>
            <!--lastest post-->
            <div class="sidebar-widget mb-50">
                <div class="widget-header mb-30">
                    <h5 class="widget-title">پرطرفدارترین ها</h5>
                </div>
                <div class="post-aside-style-2">
                    <ul class="list-post">
                        <li class="mb-30 wow fadeIn animated">
                            <div class="d-flex">
                                <div class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                                    <a class="color-white" href="single.html">
                                        <img src="{{asset('assets/imgs/thumbnail-2.jpg')}}" alt="">
                                    </a>
                                </div>
                                <div class="post-content media-body">
                                    <h6 class="post-title mb-10 text-limit-2-row"><a href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ</a></h6>
                                    <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                        <span class="post-by">توسط <a href="author.html">همتی</a></span>
                                        <span class="post-on">5 ساعت قبل</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="mb-30 wow fadeIn animated">
                            <div class="d-flex">
                                <div class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                                    <a class="color-white" href="single.html">
                                        <img src="{{asset('assets/imgs/thumbnail-3.jpg')}}" alt="">
                                    </a>
                                </div>
                                <div class="post-content media-body">
                                    <h6 class="post-title mb-10 text-limit-2-row"><a href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ</a></h6>
                                    <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                        <span class="post-by">توسط <a href="author.html">روستایی</a></span>
                                        <span class="post-on">3 ساعت قبل</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="mb-30 wow fadeIn animated">
                            <div class="d-flex">
                                <div class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                                    <a class="color-white" href="single.html">
                                        <img src="{{asset('assets/imgs/thumbnail-5.jpg')}}" alt="">
                                    </a>
                                </div>
                                <div class="post-content media-body">
                                    <h6 class="post-title mb-10 text-limit-2-row"><a href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ</a></h6>
                                    <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                        <span class="post-by">توسط <a href="author.html">راستی</a></span>
                                        <span class="post-on">4 ساعت قبل</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="mb-30 wow fadeIn animated">
                            <div class="d-flex">
                                <div class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                                    <a class="color-white" href="single.html">
                                        <img src="{{asset('assets/imgs/thumbnail-7.jpg')}}" alt="">
                                    </a>
                                </div>
                                <div class="post-content media-body">
                                    <h6 class="post-title mb-10 text-limit-2-row"><a href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ</a></h6>
                                    <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                        <span class="post-by">توسط <a href="author.html">کیمیا</a></span>
                                        <span class="post-on">5 ساعت قبل</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="wow fadeIn animated">
                            <div class="d-flex">
                                <div class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                                    <a class="color-white" href="single.html">
                                        <img src="{{asset('assets/imgs/thumbnail-8.jpg')}}" alt="">
                                    </a>
                                </div>
                                <div class="post-content media-body">
                                    <h6 class="post-title mb-10 text-limit-2-row"><a href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ</a></h6>
                                    <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                        <span class="post-by">توسط <a href="author.html">رضا</a></span>
                                        <span class="post-on">5 ساعت قبل</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!--Categories-->
            <div class="sidebar-widget widget_tag_cloud mb-50">
                <div class="widget-header tags-close mb-20">
                    <h5 class="widget-title mt-5">برچسب ها</h5>
                </div>
                <div class="tagcloud">
                    <a href="category.html">زیبایی</a>
                    <a href="category.html">کتاب</a>
                    <a href="category.html">طراحی</a>
                    <a href="category.html">مد</a>
                    <a href="category.html">زندگی</a>
                    <a href="category.html">سفر</a>
                    <a href="category.html">علم</a>
                    <a href="category.html">سلامت</a>
                    <a href="category.html">ورزش</a>
                    <a href="category.html">هنرها</a>
                    <a href="category.html">کتاب</a>
                    <a href="category.html">سبک</a>
                </div>
            </div>
            <!--Ads-->
            <div class="sidebar-widget widget-ads mb-30">
                <div class="widget-header tags-close mb-20">
                    <h5 class="widget-title mt-5">محل تبلیغات شما</h5>
                </div>
                <a href="{{asset('assets/imgs/news-1.jpg')}}" class="play-video" data-animate="zoomIn" data-duration="1.5s" data-delay="0.1s">
                    <img class="border-radius-10" src="{{asset('assets/imgs/ads-1.jpg')}}" alt="">
                </a>
            </div>
        </div>
    </aside>
    <!-- Main Header -->
        <br>
        @include("Site_Template.Sections.Header_Section")
    <!-- Main Wrap Start -->
    <main class="position-relative">
        <div class="container">
            <div class="row">
                <!-- sidebar-right -->
                @include("Site_Template.Sections.Sidebar_Right_Section")
                <div class="col-lg-10 col-md-9 order-1 order-md-2">
                    <div class="row">
                        <!-- main content -->
                        @yield("MainContent")
                        @yield("Modal")
                        <!-- Sidebar left -->
                        @include("Site_Template.Sections.Sidebar_Left_Section")
                    </div>
                    <div class="row">
                        <div class="col-12 text-center mt-50 mb-50">
                            <a href="#">
                                <img class="border-radius-10 d-inline" src="" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 col-md-12">
                            <div class="latest-post mb-50">
                                <div class="widget-header position-relative mb-30">
                                    <div class="row">
                                        <div class="col-7">
                                            <h4 class="widget-title mb-0">جدیدترین <span>پست ها</span></h4>
                                        </div>
                                        <div class="col-5 text-left">
                                            <h6 class="font-medium pl-15">
                                                <a class="text-muted font-small" href="#">مشاهده همه</a>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="loop-list-style-1">
                                    <article class="first-post p-10 background-white border-radius-10 mb-30 wow fadeIn animated">
                                        <div class="img-hover-slide border-radius-15 mb-30 position-relative overflow-hidden">
                                            <span class="top-right-icon bg-dark"><i class="mdi mdi-flash-on"></i></span>
                                            <a href="single.html">
                                                <img src="{{asset('assets/imgs/news-21.jpg')}}" alt="post-slider">
                                            </a>
                                        </div>
                                        <div class="pr-10 pl-10">
                                            <div class="entry-meta mb-30">
                                                <a class="entry-meta meta-0" href="category.html"><span class="post-in background2 text-primary font-x-small">تکنولوژیکی</span></a>
                                                <div class="float-left font-small">
                                                    <span><span class="ml-10 text-muted"><i class="fa fa-eye" aria-hidden="true"></i></span>5.8 هزار</span>
                                                    <span class="mr-30"><span class="ml-10 text-muted"><i class="fa fa-comment" aria-hidden="true"></i></span>2.5 هزار</span>
                                                    <span class="mr-30"><span class="ml-10 text-muted"><i class="fa fa-share-alt" aria-hidden="true"></i></span>125 هزار</span>
                                                </div>
                                            </div>
                                            <h4 class="post-title mb-20">
                                                    <span class="post-format-icon">
                                                        <ion-icon name="headset-outline"></ion-icon>
                                                    </span>
                                                <a href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است</a></h4>
                                            <div class="mb-20 overflow-hidden">
                                                <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                                    <span class="post-by">توسط <a href="author.html">رضا کیمیا</a></span>
                                                    <span class="post-on">ارسال در 18/9/1400 09:35</span>
                                                    <span class="time-reading">زمان خواندن 12 دقیقه</span>
                                                    <p class="font-x-small mt-10">به روز شده 18/9/1400 10:28</p>
                                                </div>
                                                <div class="float-left">
                                                    <a href="single.html" class="read-more"><span class="ml-10"><i class="fa fa-thumbtack" aria-hidden="true"></i></span>انتخاب توسط ویراستار</a>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="p-10 background-white border-radius-10 mb-30 wow fadeIn animated">
                                        <div class="d-flex">
                                            <div class="post-thumb d-flex ml-15 border-radius-15 img-hover-scale">
                                                <a class="color-white" href="single.html">
                                                    <img class="border-radius-15" src="{{asset('assets/imgs/thumbnail-15.jpg')}}" alt="">
                                                </a>
                                            </div>
                                            <div class="post-content media-body">
                                                <div class="entry-meta mb-15 mt-10">
                                                    <a class="entry-meta meta-2" href="category.html"><span class="post-in text-danger font-x-small">سیاسی</span></a>
                                                </div>
                                                <h5 class="post-title mb-15 text-limit-2-row">
                                                        <span class="post-format-icon">
                                                            <ion-icon name="videocam-outline"></ion-icon>
                                                        </span>
                                                    <a href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون.</a></h5>
                                                <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                                    <span class="post-by">توسط <a href="author.html">الناز روستایی</a></span>
                                                    <span class="post-on">ارسال در 15/9/1400 07:00</span>
                                                    <span class="time-reading">زمان خواندن 12 دقیقه</span>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="p-10 background-white border-radius-10 mb-30 wow fadeIn animated">
                                        <div class="d-flex">
                                            <div class="post-thumb d-flex ml-15 border-radius-15 img-hover-scale">
                                                <a class="color-white" href="single.html">
                                                    <img class="border-radius-15" src="{{asset('assets/imgs/thumbnail-13.jpg')}}" alt="">
                                                </a>
                                            </div>
                                            <div class="post-content media-body">
                                                <div class="entry-meta mb-15 mt-10">
                                                    <a class="entry-meta meta-2" href="category.html"><span class="post-in text-warning font-x-small">ورزشی</span></a>
                                                </div>
                                                <h5 class="post-title mb-15 text-limit-2-row">
                                                    <a href="single.html">سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت</a></h5>
                                                <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                                    <span class="post-by">توسط <a href="author.html">رضا کیمیا</a></span>
                                                    <span class="post-on">ارسال در 15/9/1400 07:00</span>
                                                    <span class="time-reading">زمان خواندن 14 دقیقه</span>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="p-10 background-white border-radius-10 mb-30 wow fadeIn animated">
                                        <div class="d-flex">
                                            <div class="post-thumb d-flex ml-15 border-radius-15 img-hover-scale">
                                                <a class="color-white" href="single.html">
                                                    <img class="border-radius-15" src="{{asset('assets/imgs/thumbnail-16.jpg')}}" alt="">
                                                </a>
                                            </div>
                                            <div class="post-content media-body">
                                                <div class="entry-meta mb-15 mt-10">
                                                    <a class="entry-meta meta-2" href="category.html"><span class="post-in text-success font-x-small">سلامت</span></a>
                                                </div>
                                                <h5 class="post-title mb-15 text-limit-2-row">
                                                        <span class="post-format-icon">
                                                            <ion-icon name="image-outline"></ion-icon>
                                                        </span>
                                                    <a href="single.html">طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت</a></h5>
                                                <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                                    <span class="post-by">توسط <a href="author.html">بهمن راستی</a></span>
                                                    <span class="post-on">ارسال در 15/9/1400 07:00</span>
                                                    <span class="time-reading">زمان خواندن 6 دقیقه</span>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="p-10 background-white border-radius-10 mb-30 wow fadeIn animated">
                                        <div class="d-flex">
                                            <div class="post-thumb d-flex ml-15 border-radius-15 img-hover-scale">
                                                <a class="color-white" href="single.html">
                                                    <img class="border-radius-15" src="{{asset('assets/imgs/thumbnail-8.jpg')}}" alt="">
                                                </a>
                                            </div>
                                            <div class="post-content media-body">
                                                <div class="entry-meta mb-15 mt-10">
                                                    <a class="entry-meta meta-2" href="category.html"><span class="post-in text-info font-x-small">درگیری</span></a>
                                                </div>
                                                <h5 class="post-title mb-15 text-limit-2-row">
                                                        <span class="post-format-icon">
                                                            <ion-icon name="chatbox-outline"></ion-icon>
                                                        </span>
                                                    <a href="single.html">تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات</a></h5>
                                                <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                                    <span class="post-by">توسط <a href="author.html">رضا کیمیا</a></span>
                                                    <span class="post-on">ارسال در 15/9/1400 07:00</span>
                                                    <span class="time-reading">زمان خواندن 13 دقیقه</span>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                            <div class="pagination-area mb-30">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-start">
                                        <li class="page-item"><a class="page-link" href="#"><i class="ti-angle-right"></i></a></li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                                        <li class="page-item"><a class="page-link" href="#"><i class="ti-angle-left"></i></a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 sidebar-right">
                            <div class="sidebar-widget mb-50">
                                <div class="widget-header mb-30">
                                    <h5 class="widget-title">محبوب ترین</h5>
                                </div>
                                <div class="post-aside-style-3">
                                    <article class="bg-white border-radius-15 mb-30 p-10 wow fadeIn animated">
                                        <div class="post-thumb d-flex mb-15 border-radius-15 img-hover-scale">
                                            <a href="single.html">
                                                <video autoplay="" class="photo-item__video" loop="" muted="" preload="none">
                                                    <source src="#" type="video/mp4">
                                                </video>
                                            </a>
                                        </div>
                                        <div class="pl-10 pr-10">
                                            <h5 class="post-title mb-15"><a href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ</a></h5>
                                            <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase mb-10">
                                                <span class="post-in">در <a href="category.html">جهان</a></span>
                                                <span class="post-by">توسط <a href="author.html">الناز روستایی</a></span>
                                                <span class="post-on">4 دقیقه پیش</span>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="bg-white border-radius-15 mb-30 p-10 wow fadeIn animated">
                                        <div class="post-thumb d-flex mb-15 border-radius-15 img-hover-scale">
                                            <a href="single.html">
                                                <img class="border-radius-15" src="{{asset('assets/imgs/news-22.jpg')}}" alt="">
                                            </a>
                                        </div>
                                        <div class="pl-10 pr-10">
                                            <h5 class="post-title mb-15"><a href="single.html">لورم ایپسوم متن ساختگی با تولید</a></h5>
                                            <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase mb-10">
                                                <span class="post-in">در <a href="category.html">سلامت</a></span>
                                                <span class="post-by">توسط <a href="author.html">رضا کیمیا</a></span>
                                                <span class="post-on">14 دقیقه پیش</span>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="bg-white border-radius-15 mb-30 p-10 wow fadeIn animated">
                                        <div class="post-thumb d-flex mb-15 border-radius-15 img-hover-scale">
                                            <a href="single.html">
                                                <img class="border-radius-15" src="{{asset('assets/imgs/news-20.jpg')}}" alt="">
                                            </a>
                                        </div>
                                        <div class="pl-10 pr-10">
                                            <h5 class="post-title mb-15"><a href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان</a></h5>
                                            <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase mb-10">
                                                <span class="post-in">در <a href="category.html">تهران</a></span>
                                                <span class="post-by">توسط <a href="author.html">سعید شمس</a></span>
                                                <span class="post-on">16 دقیقه پیش</span>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                            <div class="sidebar-widget p-20 border-radius-15 bg-white widget-latest-comments wow fadeIn animated">
                                <div class="widget-header mb-30">
                                    <h5 class="widget-title">آخرین <span>نظرات</span></h5>
                                </div>
                                <div class="post-block-list post-module-6">
                                    <div class="last-comment mb-20 d-flex wow fadeIn animated">
                                            <span class="item-count vertical-align">
                                                <a class="red-tooltip author-avatar" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="مرجان - 985 پست"><img src="{{asset('assets/imgs/authors/author-14.png')}}" alt=""></a>
                                            </span>
                                        <div class="alith_post_title_small">
                                            <p class="font-medium mb-10"><a href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان.</a></p>
                                            <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase mb-10">
                                                <span class="post-by">توسط <a href="author.html">مرجان همتی</a></span>
                                                <span class="post-on">4 دقیقه پیش</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="last-comment mb-20 d-flex wow fadeIn animated">
                                            <span class="item-count vertical-align">
                                                <a class="red-tooltip author-avatar" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="بهمن - 1245 پست"><img src="{{asset('assets/imgs/authors/author-9.png')}}" alt=""></a>
                                            </span>
                                        <div class="alith_post_title_small">
                                            <p class="font-medium mb-10"><a href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان</a></p>
                                            <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase mb-10">
                                                <span class="post-by">توسط <a href="author.html">بهمن راستی</a></span>
                                                <span class="post-on">4 دقیقه پیش</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="last-comment d-flex wow fadeIn animated">
                                            <span class="item-count vertical-align">
                                                <a class="red-tooltip author-avatar" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="مسعود - 445 پست"><img src="{{asset('assets/imgs/authors/author-3.png')}}" alt=""></a>
                                            </span>
                                        <div class="alith_post_title_small">
                                            <p class="font-medium mb-10"><a href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</a></p>
                                            <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase mb-10">
                                                <span class="post-by">توسط <a href="author.html">مسعود راستی</a></span>
                                                <span class="post-on">4 دقیقه پیش</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-50 mt-15">
                        <div class="col-md-12">
                            <div class="widget-header position-relative mb-30">
                                <h4 class="widget-title mb-0">از <span>وبلاگ</span></h4>
                            </div>
                            <div class="post-carausel-2 post-module-1 row">
                                <div class="col">
                                    <div class="post-thumb position-relative">
                                        <div class="thumb-overlay img-hover-slide border-radius-15 position-relative" style="background-image: url(assets/imgs/thumbnail-7.jpg)">
                                            <a class="img-link" href="single.html"></a>
                                            <div class="post-content-overlay">
                                                <div class="entry-meta meta-0 font-small mb-15">
                                                    <a href="category.html"><span class="post-cat bg-success color-white">سفر</span></a>
                                                </div>
                                                <h5 class="post-title">
                                                    <a class="color-white" href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده</a>
                                                </h5>
                                                <div class="entry-meta meta-1 font-x-small mt-10 pr-5 pl-5 text-muted">
                                                    <span><span class="ml-5"><i class="fa fa-eye" aria-hidden="true"></i></span>5.8 هزار</span>
                                                    <span class="mr-15"><span class="ml-5 text-muted"><i class="fa fa-comment" aria-hidden="true"></i></span>2.5 هزار</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="post-thumb position-relative">
                                        <div class="thumb-overlay img-hover-slide border-radius-15 position-relative" style="background-image: url(assets/imgs/thumbnail-8.jpg)">
                                            <a class="img-link" href="single.html"></a>
                                            <div class="post-content-overlay">
                                                <div class="entry-meta meta-0 font-small mb-15">
                                                    <a href="category.html"><span class="post-cat bg-info color-white">زیبایی</span></a>
                                                </div>
                                                <h5 class="post-title">
                                                    <a class="color-white" href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ</a>
                                                </h5>
                                                <div class="entry-meta meta-1 font-x-small mt-10 pr-5 pl-5 text-muted">
                                                    <span><span class="ml-5"><i class="fa fa-eye" aria-hidden="true"></i></span>5.8 هزار</span>
                                                    <span class="mr-15"><span class="ml-5 text-muted"><i class="fa fa-comment" aria-hidden="true"></i></span>2.5 هزار</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="post-thumb position-relative">
                                        <div class="thumb-overlay img-hover-slide border-radius-15 position-relative" style="background-image: url(assets/imgs/thumbnail-10.jpg)">
                                            <a class="img-link" href="single.html"></a>
                                            <div class="post-content-overlay">
                                                <div class="entry-meta meta-0 font-small mb-15">
                                                    <a href="category.html"><span class="post-cat bg-danger color-white">هنر</span></a>
                                                </div>
                                                <h5 class="post-title">
                                                    <a class="color-white" href="single.html">تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای</a>
                                                </h5>
                                                <div class="entry-meta meta-1 font-x-small mt-10 pr-5 pl-5 text-muted">
                                                    <span><span class="ml-5"><i class="fa fa-eye" aria-hidden="true"></i></span>5.8 هزار</span>
                                                    <span class="mr-15"><span class="ml-5 text-muted"><i class="fa fa-comment" aria-hidden="true"></i></span>2.5 هزار</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="post-thumb position-relative">
                                        <div class="thumb-overlay img-hover-slide border-radius-15 position-relative" style="background-image: url(assets/imgs/thumbnail-15.jpg)">
                                            <a class="img-link" href="single.html"></a>
                                            <div class="post-content-overlay">
                                                <div class="entry-meta meta-0 font-small mb-10">
                                                    <a href="category.html"><span class="post-cat bg-warning color-white">بازی</span></a>
                                                </div>
                                                <h5 class="post-title">
                                                    <a class="color-white" href="single.html">طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد</a>
                                                </h5>
                                                <div class="entry-meta meta-1 font-x-small mt-10 pr-5 pl-5 text-muted">
                                                    <span><span class="ml-5"><i class="fa fa-eye" aria-hidden="true"></i></span>5.8 هزار</span>
                                                    <span class="mr-15"><span class="ml-5 text-muted"><i class="fa fa-comment" aria-hidden="true"></i></span>2.5 هزار</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="post-thumb position-relative">
                                        <div class="thumb-overlay img-hover-slide border-radius-15 position-relative" style="background-image: url(assets/imgs/thumbnail-16.jpg)">
                                            <a class="img-link" href="single.html"></a>
                                            <div class="post-content-overlay">
                                                <div class="entry-meta meta-0 font-small mb-10">
                                                    <a href="category.html"><span class="post-cat bg-primary color-white">باغچه</span></a>
                                                </div>
                                                <h5 class="post-title">
                                                    <a class="color-white" href="single.html">سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان</a>
                                                </h5>
                                                <div class="entry-meta meta-1 font-x-small mt-10 pr-5 pl-5 text-muted">
                                                    <span><span class="ml-5"><i class="fa fa-eye" aria-hidden="true"></i></span>5.8 هزار</span>
                                                    <span class="mr-15"><span class="ml-5 text-muted"><i class="fa fa-comment" aria-hidden="true"></i></span>2.5 هزار</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Footer Start-->
    <footer>
        <div class="footer-area pt-50 bg-white">
            <div class="container">
                <div class="row pb-30">
                    <div class="col">
                        <ul class="float-right ml-30 font-medium">
                            <li class="cat-item cat-item-2"><a href="category.html">اقتصاد جهانی</a></li>
                            <li class="cat-item cat-item-3"><a href="category.html">محیط زیست</a></li>
                            <li class="cat-item cat-item-4"><a href="category.html">اجرایی</a></li>
                            <li class="cat-item cat-item-5"><a href="category.html">مد</a></li>
                            <li class="cat-item cat-item-6"><a href="category.html">توریست</a></li>
                            <li class="cat-item cat-item-7"><a href="category.html">درگیری</a></li>
                            <li class="cat-item cat-item-2"><a href="category.html">رسوایی</a></li>
                            <li class="cat-item cat-item-2"><a href="category.html">اجرایی</a></li>
                            <li class="cat-item cat-item-2"><a href="category.html">سیاست خارجی</a></li>
                        </ul>
                    </div>
                    <div class="col">
                        <ul class="float-right ml-30 font-medium">
                            <li class="cat-item cat-item-2"><a href="category.html">زندگی سالم</a></li>
                            <li class="cat-item cat-item-3"><a href="category.html">تحقیقات پزشکی</a></li>
                            <li class="cat-item cat-item-4"><a href="category.html">سلامت کودکان</a></li>
                            <li class="cat-item cat-item-5"><a href="category.html">سراسر جهان</a></li>
                            <li class="cat-item cat-item-6"><a href="category.html">انتخاب آگهی</a></li>
                            <li class="cat-item cat-item-7"><a href="category.html">سلامت روان</a></li>
                            <li class="cat-item cat-item-8"><a href="category.html">رسانه</a></li>
                            <li class="cat-item cat-item-9"><a href="category.html">روابط</a></li>
                        </ul>
                    </div>
                    <div class="col">
                        <ul class="float-right ml-30 font-medium">
                            <li class="cat-item cat-item-2"><a href="category.html">املاک</a></li>
                            <li class="cat-item cat-item-3"><a href="category.html">تجاری</a></li>
                            <li class="cat-item cat-item-4"><a href="category.html">پیدا کردن خانه</a></li>
                            <li class="cat-item cat-item-5"><a href="category.html">وام مسکن</a></li>
                            <li class="cat-item cat-item-6"><a href="category.html">املاک من</a></li>
                            <li class="cat-item cat-item-7"><a href="category.html">پایان عالی</a></li>
                            <li class="cat-item cat-item-8"><a href="category.html">خانه خود</a></li>
                            <li class="cat-item cat-item-9"><a href="category.html">جهان</a></li>
                            <li class="cat-item cat-item-10"><a href="category.html">مجله</a></li>
                        </ul>
                    </div>
                    <div class="col">
                        <ul class="float-right ml-30 font-medium">
                            <li class="cat-item cat-item-2"><a href="category.html">ایران</a></li>
                            <li class="cat-item cat-item-3"><a href="category.html">سیاست</a></li>
                            <li class="cat-item cat-item-4"><a href="category.html">تهران</a></li>
                            <li class="cat-item cat-item-5"><a href="category.html">کسب و کار</a></li>
                            <li class="cat-item cat-item-6"><a href="category.html">مظرات</a></li>
                            <li class="cat-item cat-item-7"><a href="category.html">فناوری</a></li>
                            <li class="cat-item cat-item-8"><a href="category.html">علم</a></li>
                            <li class="cat-item cat-item-9"><a href="category.html">سلامت</a></li>
                            <li class="cat-item cat-item-10"><a href="category.html">ورزش</a></li>
                        </ul>
                    </div>
                    <div class="col">
                        <ul class="float-right ml-30 font-medium">
                            <li class="cat-item cat-item-2"><a href="category.html">هنرها</a></li>
                            <li class="cat-item cat-item-3"><a href="category.html">کتابها</a></li>
                            <li class="cat-item cat-item-4"><a href="category.html">سبک</a></li>
                            <li class="cat-item cat-item-5"><a href="category.html">غذا</a></li>
                            <li class="cat-item cat-item-6"><a href="category.html">سفر</a></li>
                            <li class="cat-item cat-item-7"><a href="category.html">مجله</a></li>
                            <li class="cat-item cat-item-8"><a href="category.html">املاک</a></li>
                            <li class="cat-item cat-item-9"><a href="category.html">سوگواران</a></li>
                            <li class="cat-item cat-item-10"><a href="category.html">ویدئو</a></li>
                        </ul>
                    </div>
                    <div class="col d-none d-lg-block">
                        <ul class="float-right ml-30 font-medium">
                            <li class="cat-item cat-item-2"><a href="category.html">بیسبال</a></li>
                            <li class="cat-item cat-item-3"><a href="category.html">بسکتبال</a></li>
                            <li class="cat-item cat-item-4"><a href="category.html">فوتبال: مدرسه ای</a></li>
                            <li class="cat-item cat-item-5"><a href="category.html">فوتبال</a></li>
                            <li class="cat-item cat-item-6"><a href="category.html">گلف</a></li>
                            <li class="cat-item cat-item-7"><a href="category.html">هاکی</a></li>
                            <li class="cat-item cat-item-8"><a href="category.html">فوتبال</a></li>
                            <li class="cat-item cat-item-9"><a href="category.html">تنیس</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer-bottom aera -->
        <div class="footer-bottom-area bg-white text-muted">
            <div class="container">
                <div class="footer-border pt-20 pb-20">
                    <div class="row d-flex mb-15">
                        <div class="col-12">
                            <ul class="list-inline font-small">
                                <li class="list-inline-item"><a href="category.html">جهان</a></li>
                                <li class="list-inline-item"><a href="category.html">ایران</a></li>
                                <li class="list-inline-item"><a href="category.html">سیاست</a></li>
                                <li class="list-inline-item"><a href="category.html">تهران</a></li>
                                <li class="list-inline-item"><a href="category.html">کسب و کار</a></li>
                                <li class="list-inline-item"><a href="category.html">نظرات</a></li>
                                <li class="list-inline-item"><a href="category.html">فناوری</a></li>
                                <li class="list-inline-item"><a href="category.html">علم</a></li>
                                <li class="list-inline-item"><a href="category.html">سلامت</a></li>
                                <li class="list-inline-item"><a href="category.html">ورزش</a></li>
                                <li class="list-inline-item"><a href="category.html">هنرها</a></li>
                                <li class="list-inline-item"><a href="category.html">کتاب</a></li>
                                <li class="list-inline-item"><a href="category.html">سبک</a></li>
                                <li class="list-inline-item"><a href="category.html">غذا</a></li>
                                <li class="list-inline-item"><a href="category.html">سفر</a></li>
                                <li class="list-inline-item"><a href="category.html">مجله</a></li>
                                <li class="list-inline-item"><a href="category.html">مجله</a></li>
                                <li class="list-inline-item"><a href="category.html">املاک</a></li>
                                <li class="list-inline-item"><a href="category.html">ویدئو</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row d-flex align-items-center justify-content-between">
                        <div class="col-12">
                            <div class="footer-copy-right">
                                <p class="font-small text-muted">© 1400 ، نیوز وایرال | کلیه حقوق محفوظ است | راستچین شده توسط <a href="#" target="_blank">لوکس تم</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>
</div> <!-- Main Wrap End-->
<div class="dark-mark"></div>
<!-- Vendor JS-->
<script src="{{asset('assets/js/vendor/modernizr-3.6.0.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/popper.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery.slicknav.js')}}"></script>
<script src="{{asset('assets/js/vendor/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/slick.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/wow.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/animated.headline.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery.magnific-popup.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery.ticker.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery.vticker-min.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery.sticky.js')}}"></script>
<script src="{{asset('assets/js/vendor/perfect-scrollbar.js')}}"></script>
<script src="{{asset('assets/js/vendor/waypoints.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery.counterup.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery.theia.sticky.js')}}"></script>
<script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
<!-- NewsViral JS -->
<script src="{{asset('assets/js/main.js')}}"></script>
@yield("jquery")

</body>

</html>
