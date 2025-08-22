<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">پنل مدیریت</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="direction: ltr">
        <div style="direction: rtl">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="https://www.gravatar.com/avatar/52f0fbcbedee04a121cba8dad1174462?s=200&d=mm&r=g" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a class="d-block">
                        {{-- دریافت نام مدیر --}}
                        @if (!empty(Session::get('AdminUserName')))
                            <span style="font-size: large; font-weight: bold; color: white;">{{ Session::get('AdminUserName')}}</span>
                        @endif
                    </a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <div class="nav-item has-treeview menu-open">
                        <a href="{{route("Admin-Panel")}}" class="nav-link active">
                            <i class="nav-icon fa fa-dashboard"></i>
                            <p>
                                داشبورد
                            </p>
                        </a>
                    </div>

                    <li class="nav-header">⇂ لیست ها ⇃</li>

                    <div class="nav-item bg-dark">
                        <a href="{{route('Users-List')}}" class="nav-link">
                            <i class="nav-icon fa fa-th-list"></i>
                            <p>
                                لیست کاربران
                            </p>
                        </a>
                    </div>

                    <div class="nav-item bg-dark">
                        <a href="{{route('Products-List')}}" class="nav-link">
                            <i class="nav-icon fa fa-th-list"></i>
                            <p>
                                لیست محصولات
                            </p>
                        </a>
                    </div>

                    <div class="nav-item bg-dark">
                        <a href="{{route('Categories-List')}}" class="nav-link">
                            <i class="nav-icon fa fa-th-list"></i>
                            <p>
                                لیست دسته بندی ها
                            </p>
                        </a>
                    </div>

                    <div class="nav-item bg-dark">
                        <a href="{{route('Factories-List')}}" class="nav-link">
                            <i class="nav-icon fa fa-th-list"></i>
                            <p>
                                لیست کارخانه ها
                            </p>
                        </a>
                    </div>

                    <li class="nav-header">⇂ دسترسی سریع ⇃</li>

                    <div class="nav-item bg-dark">
                        <a href="{{route('User-Add')}}" class="nav-link">
                            <i class="nav-icon fa fa-plus"></i>
                            <p>
                                افزودن کاربر
                            </p>
                        </a>
                    </div>
                    <div class="nav-item bg-dark">
                        <a href="{{route('Product-Add')}}" class="nav-link">
                            <i class="nav-icon fa fa-plus"></i>
                            <p>
                                افزودن محصول
                            </p>
                        </a>
                    </div>
                    <div class="nav-item bg-dark">
                        <a href="{{route('Category-Add')}}" class="nav-link">
                            <i class="nav-icon fa fa-plus"></i>
                            <p>
                                افزودن دسته بندی
                            </p>
                        </a>
                    </div>
                    <div class="nav-item bg-dark">
                        <a href="{{route('Factory-Add')}}" class="nav-link">
                            <i class="nav-icon fa fa-plus"></i>
                            <p>
                                افزودن کارخانه
                            </p>
                        </a>
                    </div>
                    <li class="nav-header">⇂ دیگر ⇃</li>
                    <div class="nav-item bg-dark">
                        <a href="{{route('Admin-Profile-Gate-View')}}" class="nav-link">
                            <i class="nav-icon fa fa-user"></i>
                            <p>
                                پروفایل ادمین
                            </p>
                        </a>
                    </div>
                    <div class="nav-item bg-dark">
                        <a href="{{route('Home')}}" class="nav-link" target="_blank">
                            <i class="nav-icon fa fa-globe"></i>
                            <p>
                                نمایش سایت اصلی
                            </p>
                        </a>
                    </div>

                    {{-- <li class="nav-header">متفاوت</li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-file"></i>
                            <p>مستندات</p>
                        </a>
                    </li>
                    <li class="nav-header">برچسب‌ها</li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-circle-o text-danger"></i>
                            <p class="text">مهم</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-circle-o text-warning"></i>
                            <p>هشدار</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-circle-o text-info"></i>
                            <p>اطلاعات</p>
                        </a>
                    </li> --}}
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </div>
    <!-- /.sidebar -->
</aside>
