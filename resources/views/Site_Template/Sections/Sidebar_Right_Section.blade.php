@section('sidebar')
<div class="col-lg-2 col-md-3 primary-sidebar  sidebar-left order-2 order-md-1">
                            <div>
                            {{-- تنظیمات دکمه های ورود و ثبت نام --}}
                            @if(!empty(Session::get('username')))
                                {{-- تنظیمات شناسایی کاربر و نمایش نام کاربری --}}
                                <button id="UserNameBox" onmouseenter="informationboxblock()" onmouseleave="informationboxnone()">
                                    <i class="fa fa-angle-down" style="margin-left: 4px; font-size: smaller;"></i>
                                    <span style="font-weight: bold;">
                                        {{ Session::get('username') }}
                                    </span>
                                    <i style="margin-right: 10px;" class="fa fa-user"></i>
                                </button>
                                <!-- تنظیمات نمایش باکس اطلاعات -->
                                <div id="InformationBox" onmouseenter="informationboxblock()" onmouseleave="informationboxnone()">
                                    <div>
                                        <a href="{{route('User-Edit',Session::get('user_id'))}}" class="InformationBoxChild" id="EditButton"><i class="fa fa-edit"></i> ویرایش اطلاعات</a>
                                    </div>
                                        <button class="InformationBoxChild" data-toggle="modal" data-target="#exampleModalCenter" id="ExitButton"> <i class="fa fa-sign-out-alt"></i> خروج از حساب</button>
                                </div>
                                <script>
                                    function informationboxblock(){
                                        document.getElementById("InformationBox").style.display = "block";
                                    }
                                    function informationboxnone(){
                                        document.getElementById("InformationBox").style.display = "none";
                                    }
                                </script>
                                {{-- جایگذاری در ییلد --}}
                                @section("Modal")
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header bg-danger">
                                        <h5 class="modal-title" id="exampleModalLongTitle" style="font-weight: 100">
                                          <span style="color: white !important;">آیا برای خروج از حساب خود مطمئن هستید؟</span>
                                        </h5>
                                      </div>
                                        <form action="{{route('User-Exit')}}" enctype="multipart/form-data">
                                            <div class="modal-footer d-flex justify-content-between" style="border: none;width: 100%">
                                                <button type="submit" class="AlertButton bg-danger">بله</button>
                                                <button type="button" class="AlertButton bg-dark" data-dismiss="modal">انصراف</button>
                                            </div>
                                        </form>
                                    </div>
                                  </div>
                                </div>
                                @endsection
                            @elseif (!empty(Session::get('AdminUserName')))
                                <div id="AdminNameBox">
                                    <strong>
                                        ادمین وارد شده است
                                    </strong>
                                </div>
                            @else
                                <span>
                                    <a href="{{route('LogIn')}}" id="LogIn">
                                        <ion-icon name="log-in-outline"></ion-icon>
                                        <span style="margin-right: 10px;" >ورود</span>
                                    </a>
                                </span>
                                <span>
                                    <a href="{{route('Register')}}" id="Register">ثبت نام</a>
                                </span>
                            @endif
                        </div>
                    <!-- Widget Weather -->
                    <div class="sidebar-widget widget-weather border-radius-10 bg-white mb-30 mt-55">
                        <div class="d-flex">
                            <div class="font-medium">
                                <p>دوشنبه</p>
                                <h2>12</h2>
                                <p><strong>فروردین</strong></p>
                            </div>
                            <div class="font-medium mr-10 pt-20">
                                <div id="datetime" class="d-inline-block">
                                    <ul>
                                        <li><span class="font-small">
                                                    <a class="text-primary" href="#">تهران</a><br>
                                                    <i class="wi wi-day-sunny ml-5"></i>32ºc
                                                </span>
                                            <p>آفتابی</p>
                                        </li>
                                        <li><span class="font-small">
                                                    <a class="text-danger" href="#">کرج</a><br>
                                                    <i class="wi wi-day-cloudy ml-5"></i>28ºc
                                                </span>
                                            <p>ابری</p>
                                        </li>
                                        <li><span class="font-small">
                                                    <a class="text-success" href="#">رشت</a><br>
                                                    <i class="wi wi-rain-mix ml-5"></i>25ºc
                                                </span>
                                            <p>بارانی</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Widget Categories -->
                    <div class="sidebar-widget widget_categories border-radius-10 bg-white mb-30">
                        <div class="widget-header position-relative mb-15">
                            <h5 class="widget-title"><strong>دسته بندی ها</strong></h5>
                        </div>
                        {{-- نمایش دسته بندی ها --}}
                        <ul class="font-small text-muted">
                            <x-categories-component></x-categories-component>
                        </ul>
                    </div>
                    <!-- Widget Factories -->
                    <div class="sidebar-widget widget_categories border-radius-10 bg-white mb-30">
                        <div class="widget-header position-relative mb-15">
                            <h5 class="widget-title"><strong>شرکت ها</strong></h5>
                        </div>
                        {{-- نمایش کارخانه ها --}}
                        <ul class="font-small text-muted">
                            <x-factory-component></x-factory-component>
                        </ul>
                    </div>
                </div>
@show
