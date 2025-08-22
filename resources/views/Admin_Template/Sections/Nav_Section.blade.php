<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
      <!-- Modal -->
  <div class="modal fade" id="AlertModal" role="dialog" aria-labelledby="exampleModallabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-{{Session()->get('status')}}">
          <h5 class="modal-title" id="exampleModalLongTitle">
            {{Session()->get("message")}}
        </h5>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">تایید</button>
        </div>
      </div>
    </div>
  </div>
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">خانه</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">تماس</a>
        </li>
    </ul>

    {{-- <!-- SEARCH FORM -->
    <form class="form-inline ml-3" enctype="multipart/form-data" >
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="جستجو" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </form> --}}

    <!-- Right navbar links -->
    <ul class="navbar-nav mr-auto">
        <!-- Logout Button -->
        <li>
            <button class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-sign-out"></i>
                <strong> خروج از پنل</strong>
            </button>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header bg-danger">
                    <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 100">
                        <span style="color: white !important;">آیا برای خروج از حساب خود مطمئن هستید؟</span>
                    </h5>
                  </div>
                    <form action="{{route('Admin-Exit')}}" enctype="multipart/form-data">
                        <div class="modal-footer d-flex justify-content-between" style="border: none">
                          <button type="submit" class="AlertButton bg-danger">بله</button>
                          <button type="button" class="AlertButton bg-dark" data-dismiss="modal">بستن</button>
                        </div>
                    </form>
                </div>
              </div>
            </div>
        </li>
        <li class="mr-1">
            <button class="btn btn-outline-info btn-sm" onclick="redirect()">
                {{-- <a href="{{route('Home')}}" target="_blank"> --}}
                    <div class="d-flex align-items-center">
                        <i class="fa fa-globe"></i>
                        <strong class="mr-1">صفحه اصلی</strong>
                    </div>
                {{-- </a> --}}
            </button>
            <script>
                function redirect(){
                    window.open("{{route('Home')}}",'_blank');
                }
            </script>
        </li>
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown" >
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fa fa-comments-o" style="color: black;" ></i>
                <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 ml-3 img-circle">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                حسام موسوی
                                <span class="float-left text-sm text-danger"><i class="fa fa-star"></i></span>
                            </h3>
                            <p class="text-sm">با من تماس بگیر لطفا...</p>
                            <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 ساعت قبل</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle ml-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                پیمان احمدی
                                <span class="float-left text-sm text-muted"><i class="fa fa-star"></i></span>
                            </h3>
                            <p class="text-sm">من پیامتو دریافت کردم</p>
                            <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 ساعت قبل</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle ml-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                سارا وکیلی
                                <span class="float-left text-sm text-warning"><i class="fa fa-star"></i></span>
                            </h3>
                            <p class="text-sm">پروژه اتون عالی بود مرسی واقعا</p>
                            <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i>4 ساعت قبل</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">مشاهده همه پیام‌ها</a>
            </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown" style="color: black;" >
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fa fa-bell-o" style="color: black;" ></i>
                <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">
                <span class="dropdown-item dropdown-header">15 نوتیفیکیشن</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fa fa-envelope ml-2"></i> 4 پیام جدید
                    <span class="float-left text-muted text-sm">3 دقیقه</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fa fa-users ml-2"></i> 8 درخواست دوستی
                    <span class="float-left text-muted text-sm">12 ساعت</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fa fa-file ml-2"></i> 3 گزارش جدید
                    <span class="float-left text-muted text-sm">2 روز</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">مشاهده همه نوتیفیکیشن</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i style="color: black;"
                    class="fa fa-th-large"></i></a>
        </li>
    </ul>
</nav>
