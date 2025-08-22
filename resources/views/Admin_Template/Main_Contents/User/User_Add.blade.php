{{-- اتصال به قالب اصلی --}}
@extends("Admin_Template.index")
{{-- عنوان صفحه --}}
@section("title")
@parent
{{$title}}
@endsection
{{-- جایگذاری در ییلد --}}
@section("MainContent")

<div class="row">
    <div class="col-3"></div>

    <div class="card card-danger col-6 mt-10" style="margin-top: 70px;">
        {{-- <div class="card-header mt-1">
          <h3 class="card-title">برای خارج شدن از پنل رمز اکانت خود را وارد نمایید</h3>
        </div> --}}
        <!-- شروع فرم  -->
        <form action="{{route('UserAddValidation')}}" method="POST" enctype="multipart/form-data">
            {{-- کلید برای اسال فرم به صورت پست --}}
            @csrf

            <div class="card-body">
                <div class="form-group">
                    {{-- ورودی نام کاربر --}}
                    <label for="inputPassword3" class="col-sm-2 control-label">⇂ نام کاربر ⇃</label><br>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputPassword3" name="EntryRealName" placeholder="نام کاربر را وارد کنید" required><br><br>
                    </div>

                    {{-- ورودی نام کاربری --}}
                    @if(session()->get("UserName_Error"))
                    @php $message = session()->get("UserName_Error"); @endphp
                    <div style="color: red; cursor: default; font-size: 20px;">{{$message}}</div>
                    @endif
                    <label for="UserName" class="col-sm-2 control-label">⇂ نام کاربری ⇃</label><br/>
                    <div class="col-sm-10">
                        <input type="text" name="EntryUserName" class="form-control" id="UserName" placeholder="نام کاربری را وارد کنید" required><br/><br/>
                    </div>

                    {{-- ورودی رمز --}}
                    @if(session()->get("Password_Error"))
                        @php $message = session()->get("Password_Error"); @endphp
                        <div style="color: red; cursor: default; font-size: 20px;">{{$message}}</div>
                    @endif
                    <label for="inputPassword3" class="col-sm-2 control-label">⇂ پسورد ⇃</label><br>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword3" name="EntryPassword" placeholder="پسورد را وارد کنید" required><br><br>
                    </div>

                    {{-- ورودی رمز مجدد--}}
                    @if(session()->get("RePassword_Error"))
                        @php $message = session()->get("RePassword_Error"); @endphp
                        <div style="color: red; cursor: default; font-size: 20px;">{{$message}}</div>
                    @endif
                    <label for="inputPassword3" class="col-sm-3 control-label">⇂ تکرار پسورد ⇃</label><br>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword3" name="EntryRePassword" placeholder="پسورد را مجددا وارد کنید" required><br><br>
                        <div style="font-weight: bold">

                            <input type="checkbox" name="IsAdmin" value="1"> ادمین
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                {{-- تنظیمات دکمه ها --}}
                <button type="submit" class="btn btn-success">ثبت</button>
                <input type="button" onclick="redirect()" class="btn btn-warning float-left" value="انصراف">
            </div>
        </form>
    </div>

    <div class="col-3"></div>
</div>
<script>
    // تنظیمات دکمه لغو
    function redirect(){
        window.location.replace("{{route('Users-List')}}");;
    }
</script>
@endsection
