<header class="main-header header-style-2 mb-40">
        <div class="header-bottom header-sticky background-white text-center">
            <div class="scroll-progress gradient-bg-1"></div>
            <div class="mobile_menu d-lg-none d-block"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-3">
                        <div class="header-logo d-none d-lg-block">
                            <a href="index.php">
                                <div style="font-size: 20px; text-align: center;" >
                                    <img src="{{asset('assets/imgs/favicon.svg')}}" alt="icon" style="width: 30px;">
                                    <span style="margin-top: 12px; color: black;">Sepehr Electric</span>
                                </div>
                            </a>
                        </div>
                        <div class="logo-tablet d-md-inline d-lg-none d-none">
                            <a href="index.php">
                                <img class="logo-img d-inline" src="assets/imgs/logo.svg" alt="">
                            </a>
                        </div>
                        <div class="logo-mobile d-block d-md-none">
                            <a href="../index.html">
                                <img class="logo-img d-inline" src="assets/imgs/favicon.svg" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-9 main-header-navigation">

                        <!-- Main-menu -->
                        <div class="main-nav text-right float-lg-right float-md-left">
                            <ul class="mobi-menu d-none menu-3-columns" id="navigation">
                                <li class="cat-item cat-item-2"><a href="#">اقتصاد جهانی</a></li>
                                <li class="cat-item cat-item-3"><a href="#">محیط</a></li>
                                <li class="cat-item cat-item-4"><a href="#">سلامت کودکان</a></li>
                                <li class="cat-item cat-item-5"><a href="#">مد</a></li>
                                <li class="cat-item cat-item-6"><a href="#">توریست</a></li>
                                <li class="cat-item cat-item-7"><a href="#">درگیری ها</a></li>
                                <li class="cat-item cat-item-2"><a href="#">رسوایی ها</a></li>
                                <li class="cat-item cat-item-2"><a href="#">اجرایی</a></li>
                                <li class="cat-item cat-item-2"><a href="#">سیاست خارجی</a></li>
                                <li class="cat-item cat-item-2"><a href="#">زندگی سالم</a></li>
                                <li class="cat-item cat-item-3"><a href="#">تحقیقات پزشکی</a></li>
                                <li class="cat-item cat-item-4"><a href="#">سلامت کودکان</a></li>
                                <li class="cat-item cat-item-5"><a href="#">سراسر دنیا</a></li>
                                <li class="cat-item cat-item-6"><a href="#">انتخاب آگهی</a></li>
                                <li class="cat-item cat-item-7"><a href="#">سلامت روان</a></li>
                                <li class="cat-item cat-item-2"><a href="#">روابط رسانه ای</a></li>
                            </ul>
                            <nav style="height: 50px;" >
                                <ul class="main-menu d-none d-lg-inline">

                                    <li>
                                        <a href="{{route('Home')}}">
                                                <span class="ml-15">
                                                    <ion-icon name="home-outline"></ion-icon>
                                                </span>
                                            خانه
                                        </a>
                                    </li>
                                    <li class="mega-menu-item">
                                        <a href="">
                                                <span class="ml-15">
                                                    <ion-icon name="desktop-outline"></ion-icon>
                                                </span>
                                            صفحات
                                        </a>
                                        <div class="sub-mega-menu sub-menu-list row text-muted font-small">
                                            <ul class="col-md-2">
                                                <li class="hover-box-shadow text-center"><a href="{{route('Home')}}"><strong>صفحه اصلی</strong></a></li>
                                                <li class="hover-box-shadow text-center"><a href="{{route('All-Products')}}"><strong>تمامی محصولات</strong></a></li>
                                            </ul>
                                            @if (empty(Session::get('username')) and empty(Session::get('AdminName')))
                                                <ul class="col-md-2">
                                                    <li class="hover-box-shadow text-center"><a href="{{route('LogIn')}}"><strong>ورود</strong></a></li>
                                                    <li class="hover-box-shadow text-center"><a href="{{route('Register')}}"><strong>ثبت نام</strong></a></li>
                                                </ul>
                                                <ul class="col-md-2">
                                                    <li class="hover-box-shadow text-center"><a href="{{route('About-Us')}}"><strong>درباره ما</strong></a></li>
                                                </ul>
                                            @else
                                                <ul class="col-md-2">
                                                    <li class="hover-box-shadow text-center"><a href="{{route('About-Us')}}"><strong>درباره ما</strong></a></li>
                                                </ul>
                                                <ul class="col-md-2">
                                                </ul>
                                            @endif
                                                <div class="col-md-6 text-left">
                                                    <a href="#"><img class="border-radius-10" src="{{asset('assets/imgs/ads-2.jpg')}}" alt=""></a>
                                                </div>
                                        </div>
                                    </li>
                                    <li class="mega-menu-item">
                                        <a href="category.html"><span class="ml-15">
                                                    <ion-icon name="megaphone-outline"></ion-icon>
                                                </span>مگامنو</a>
                                        <div class="sub-mega-menu">
                                            <div class="nav flex-column nav-pills" role="tablist">
                                                <a class="nav-link active" data-toggle="pill" href="#news-0" role="tab">همه</a>
                                                <a class="nav-link" data-toggle="pill" href="#news-1" role="tab">سرگرمی</a>
                                                <a class="nav-link" data-toggle="pill" href="#news-2" role="tab">مد</a>
                                                <a class="nav-link" data-toggle="pill" href="#news-3" role="tab">زندگی</a>
                                            </div>
                                            <div class="tab-content">
                                                <div class="tab-pane show active" id="news-0" role="tabpanel">
                                                    <div class="row">
                                                        <div class="col-3 post-module-1">
                                                            <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                                                <a href="single.html">
                                                                    <img src="assets/imgs/news-1.jpg" alt="">
                                                                </a>
                                                                <span class="top-right-icon background2">
                                                                        <i class="mdi mdi-audiotrack"></i>
                                                                    </span>
                                                            </div>
                                                            <div class="post-content media-body">
                                                                <h6 class="post-title mb-10 text-limit-2-row">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم </h6>
                                                                <div class="entry-meta meta-1 font-x-small color-grey">
                                                                    <span class="post-on">25 فروردین</span>
                                                                    <span class="hit-count has-dot">126 هزار بازدید</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-3 post-module-1">
                                                            <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                                                <a href="single.html">
                                                                    <img src="assets/imgs/news-2.jpg" alt="">
                                                                </a>
                                                            </div>
                                                            <div class="post-content media-body">
                                                                <h6 class="post-title mb-10 text-limit-2-row">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</h6>
                                                                <div class="entry-meta meta-1 font-x-small color-grey mt-10">
                                                                    <span class="post-on">25 فروردین</span>
                                                                    <span class="hit-count has-dot">126 هزار بازدید</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-3 post-module-1">
                                                            <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                                                <a href="single.html">
                                                                    <img src="assets/imgs/news-3.jpg" alt="">
                                                                </a>
                                                            </div>
                                                            <div class="post-content media-body">
                                                                <h6 class="post-title mb-10 text-limit-2-row">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم </h6>
                                                                <div class="entry-meta meta-1 font-x-small color-grey mt-10">
                                                                    <span class="post-on">25 فروردین</span>
                                                                    <span class="hit-count has-dot">126 هزار بازدید</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-3 post-module-1">
                                                            <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                                                <a href="single.html">
                                                                    <img src="assets/imgs/news-8.jpg" alt="">
                                                                </a>
                                                            </div>
                                                            <div class="post-content media-body">
                                                                <h6 class="post-title mb-10 text-limit-2-row">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم </h6>
                                                                <div class="entry-meta meta-1 font-x-small color-grey mt-10">
                                                                    <span class="post-on">25 فروردین</span>
                                                                    <span class="hit-count has-dot">126 هزار بازدید</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="news-1" role="tabpanel">
                                                    <div class="row">
                                                        <div class="col-3 post-module-1">
                                                            <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                                                <a href="single.html">
                                                                    <img src="assets/imgs/news-5.jpg" alt="">
                                                                </a>
                                                            </div>
                                                            <div class="post-content media-body">
                                                                <h6 class="post-title mb-10 text-limit-2-row">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم </h6>
                                                                <div class="entry-meta meta-1 font-x-small color-grey">
                                                                    <span class="post-on">25 فروردین</span>
                                                                    <span class="hit-count has-dot">126 هزار بازدید</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-3 post-module-1">
                                                            <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                                                <a href="single.html">
                                                                    <img src="assets/imgs/news-6.jpg" alt="">
                                                                </a>
                                                                <span class="top-right-icon background3">
                                                                        <i class="mdi mdi-videocam"></i>
                                                                    </span>
                                                            </div>
                                                            <div class="post-content media-body">
                                                                <h6 class="post-title mb-10 text-limit-2-row">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</h6>
                                                                <div class="entry-meta meta-1 font-x-small color-grey mt-10">
                                                                    <span class="post-on">25 فروردین</span>
                                                                    <span class="hit-count has-dot">126 هزار بازدید</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-3 post-module-1">
                                                            <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                                                <a href="single.html">
                                                                    <img src="assets/imgs/news-7.jpg" alt="">
                                                                </a>
                                                            </div>
                                                            <div class="post-content media-body">
                                                                <h6 class="post-title mb-10 text-limit-2-row">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم </h6>
                                                                <div class="entry-meta meta-1 font-x-small color-grey mt-10">
                                                                    <span class="post-on">25 فروردین</span>
                                                                    <span class="hit-count has-dot">126 هزار بازدید</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-3 post-module-1">
                                                            <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                                                <a href="single.html">
                                                                    <img src="assets/imgs/news-8.jpg" alt="">
                                                                </a>
                                                            </div>
                                                            <div class="post-content media-body">
                                                                <h6 class="post-title mb-10 text-limit-2-row">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم </h6>
                                                                <div class="entry-meta meta-1 font-x-small color-grey mt-10">
                                                                    <span class="post-on">25 فروردین</span>
                                                                    <span class="hit-count has-dot">126 هزار بازدید</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="news-2" role="tabpanel">
                                                    <div class="row">
                                                        <div class="col-3 post-module-1">
                                                            <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                                                <a href="single.html">
                                                                    <img src="assets/imgs/news-9.jpg" alt="">
                                                                </a>
                                                                <span class="top-right-icon background2">
                                                                        <i class="mdi mdi-audiotrack"></i>
                                                                    </span>
                                                            </div>
                                                            <div class="post-content media-body">
                                                                <h6 class="post-title mb-10 text-limit-2-row">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم </h6>
                                                                <div class="entry-meta meta-1 font-x-small color-grey">
                                                                    <span class="post-on">25 فروردین</span>
                                                                    <span class="hit-count has-dot">126 هزار بازدید</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-3 post-module-1">
                                                            <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                                                <a href="single.html">
                                                                    <img src="assets/imgs/news-10.jpg" alt="">
                                                                </a>
                                                                <span class="top-right-icon background8">
                                                                        <i class="mdi mdi-favorite"></i>
                                                                    </span>
                                                            </div>
                                                            <div class="post-content media-body">
                                                                <h6 class="post-title mb-10 text-limit-2-row">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</h6>
                                                                <div class="entry-meta meta-1 font-x-small color-grey mt-10">
                                                                    <span class="post-on">25 فروردین</span>
                                                                    <span class="hit-count has-dot">126 هزار بازدید</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-3 post-module-1">
                                                            <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                                                <a href="single.html">
                                                                    <img src="assets/imgs/news-11.jpg" alt="">
                                                                </a>
                                                            </div>
                                                            <div class="post-content media-body">
                                                                <h6 class="post-title mb-10 text-limit-2-row">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم </h6>
                                                                <div class="entry-meta meta-1 font-x-small color-grey mt-10">
                                                                    <span class="post-on">25 فروردین</span>
                                                                    <span class="hit-count has-dot">126 هزار بازدید</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-3 post-module-1">
                                                            <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                                                <a href="single.html">
                                                                    <img src="assets/imgs/news-12.jpg" alt="">
                                                                </a>
                                                            </div>
                                                            <div class="post-content media-body">
                                                                <h6 class="post-title mb-10 text-limit-2-row">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم </h6>
                                                                <div class="entry-meta meta-1 font-x-small color-grey mt-10">
                                                                    <span class="post-on">25 فروردین</span>
                                                                    <span class="hit-count has-dot">126 هزار بازدید</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="news-3" role="tabpanel">
                                                    <div class="row">
                                                        <div class="col-3 post-module-1">
                                                            <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                                                <a href="single.html">
                                                                    <img src="assets/imgs/news-13.jpg" alt="">
                                                                </a>
                                                            </div>
                                                            <div class="post-content media-body">
                                                                <h6 class="post-title mb-10 text-limit-2-row">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم </h6>
                                                                <div class="entry-meta meta-1 font-x-small color-grey">
                                                                    <span class="post-on">25 فروردین</span>
                                                                    <span class="hit-count has-dot">126 هزار بازدید</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-3 post-module-1">
                                                            <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                                                <a href="single.html">
                                                                    <img src="assets/imgs/news-14.jpg" alt="">
                                                                </a>
                                                            </div>
                                                            <div class="post-content media-body">
                                                                <h6 class="post-title mb-10 text-limit-2-row">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</h6>
                                                                <div class="entry-meta meta-1 font-x-small color-grey mt-10">
                                                                    <span class="post-on">25 فروردین</span>
                                                                    <span class="hit-count has-dot">126 هزار بازدید</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-3 post-module-1">
                                                            <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                                                <a href="single.html">
                                                                    <img src="assets/imgs/news-15.jpg" alt="">
                                                                </a>
                                                            </div>
                                                            <div class="post-content media-body">
                                                                <h6 class="post-title mb-10 text-limit-2-row">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم </h6>
                                                                <div class="entry-meta meta-1 font-x-small color-grey mt-10">
                                                                    <span class="post-on">25 فروردین</span>
                                                                    <span class="hit-count has-dot">126 هزار بازدید</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-3 post-module-1">
                                                            <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                                                <a href="single.html">
                                                                    <img src="assets/imgs/news-16.jpg" alt="">
                                                                </a>
                                                                <span class="top-right-icon background2">
                                                                        <i class="mdi mdi-audiotrack"></i>
                                                                    </span>
                                                            </div>
                                                            <div class="post-content media-body">
                                                                <h6 class="post-title mb-10 text-limit-2-row">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم </h6>
                                                                <div class="entry-meta meta-1 font-x-small color-grey mt-10">
                                                                    <span class="post-on">25 فروردین</span>
                                                                    <span class="hit-count has-dot">126 هزار بازدید</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="category-metro.html">
                                                <span class="ml-15">
                                                    <ion-icon name="film-outline"></ion-icon>
                                                </span>
                                            ویدیو
                                        </a>
                                    </li>
                                    <li>
                                        <a href="contact.html">
                                                <span class="ml-15">
                                                    <ion-icon name="mail-unread-outline"></ion-icon>
                                                </span>
                                            تماس با ما
                                        </a>
                                    </li>
                                </ul>
                                <div class="d-inline mr-50 tools-icon">
                                    <a class="red-tooltip text-danger" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="موضوعات جدید">
                                        <ion-icon name="flame-outline"></ion-icon>
                                    </a>
                                    <a class="red-tooltip text-primary" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="پربازدید">
                                        <ion-icon name="flash-outline"></ion-icon>
                                    </a>
                                    <a class="red-tooltip text-success" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="اطلاعیه">
                                        <ion-icon name="notifications-outline"></ion-icon>
                                        <span class="notification bg-success">5</span>
                                    </a>
                                </div>
                            </nav>
                        </div>
                        <!-- Search -->
                        <form action="{{route('Search')}}" method="post" class="search-form d-lg-inline float-left position-relative ml-30 d-none" style="margin-top: 12px;">
                            @csrf
                            <input type="search" class="search_field" placeholder="جستجو ..." value='{{request()->ProductSearch}}' name="ProductSearch">
                            <span class="search-icon" style="margin-top: 5px;"><i class="ti-search mr-5" ></i></span>
                        </form>
                        <!-- Off canvas -->
                        <div class="off-canvas-toggle-cover" style="margin-top: 15px;">
                            <div class="off-canvas-toggle hidden d-inline-block mr-15" id="off-canvas-toggle">
                                <ion-icon name="grid-outline"></ion-icon>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
