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
        {{-- دریافت پیغام ها --}}
        @if (session()->get("change"))
            <div class="card-header mt-1 bg-success">
                <ul style="font-size: large; font-weight: bold; margin-right: 10px;">
                    {!!session()->get("change")!!}
                </ul>
            </div>
        @endif
        @if (session()->get("Error"))
            <div class="card-header mt-1">
                <ul style="font-size: large; font-weight: bold; margin-right: 10px;">
                    {{ session()->get("Error") }}
                </ul>
            </div>
        @endif
        {{-- @if($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </div>
        @endif --}}
        <!-- شروع فرم  -->
        <form action="{{route('AdminProfileEditValidation')}}" method="POST" enctype="multipart/form-data">
            {{-- کلید برای اسال فرم به صورت پست --}}
            @csrf

            {{-- ارسال اطلاعات قبلی جهت تشخیص تغییرات --}}
            <input type="hidden" name="LastRealName" value="{{$Admin_info->realname}}">
            <input type="hidden" name="lastUserName" value="{{$Admin_info->username}}">
            <input type="hidden" name="LastPassword" value="{{$Admin_info->password}}">
            <input type="hidden" name="id" value="{{$Admin_info->id}}">

            <div class="card-body">
                <div class="form-group">
                    {{-- ورودی نام ادمین --}}
                    @error('realname')
                        <div style="color: red; cursor: default; font-size: 20px;">{{$message}}</div>
                    @enderror
                    <label for="inputPassword3" class="col-sm-2 control-label">⇂ نام شما ⇃</label><br>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputPassword3" name="realname" value="{{$Admin_info->realname}}" placeholder="نام خود را وارد کنید" required><br><br>
                    </div>
                    {{-- ورودی نام کاربری ادمین --}}
                    @error('username')
                        <div style="color: red; cursor: default; font-size: 20px;">{{$message}}</div>
                    @enderror
                    <label for="UserName" class="control-label">⇂ نام کاربری ⇃</label><br/>
                    <div class="col-sm-10">
                        <input type="text" name="username" class="form-control" id="UserName" value="{{$Admin_info->username}}" placeholder="نام کاربری را وارد کنید" required><br/><br/>
                    </div>
                    <input type="button" id="ShowBox" class="btn btn-default" value="تغییر رمز">
                    <div id="PasswordsBox" style="display: none">
                        {{-- ورودی رمز --}}
                        @error('password')
                            <div style="color: red; cursor: default; font-size: 20px;">{{$message}}</div>
                            <script>
                                $(document).ready(function(){
                                    $("#PasswordsBox").show();
                                    $("#ShowBox").hide();
                                });
                            </script>
                        @enderror
                        @if(session()->get("Password_Error"))
                            <script>
                                $(document).ready(function(){
                                    $("#PasswordsBox").show();
                                    $("#ShowBox").hide();
                                });
                            </script>
                            @php $message = session()->get("Password_Error"); @endphp
                            <div style="color: red; cursor: default; font-size: 20px;">{{$message}}</div>
                        @endif
                        <label for="inputPassword3" class="col-sm-2 control-label">⇂ رمز ⇃</label><br>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword3" name="password" placeholder="رمز جدید را وارد کنید"><br><br>
                        </div>
                        <label for="inputPassword4" class="col-sm-2 control-label">⇂ تکرار رمز ⇃</label><br>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword4" name="password_confirmation" placeholder="رمز را مجددا وارد کنید"><br><br>
                        </div>
                        <input type="button" id="HideBox" class="btn btn-default" value="لغو">
                    </div>
                </div>
            </div>
            <div class="card-footer" style="display: flex; justify-content: center;">
                {{-- تنظیمات دکمه ها --}}
                <input type="submit" class="btn btn-success" value="ویرایش">
                <input type="button" class="btn btn-danger btn-sm" style="margin: 0 30%" data-toggle="modal" data-target="#exampleModal" value="خروج از پنل">
                <input type="button" onclick="redirect()" class="btn btn-warning float-left" value="بازگشت">
            </div>
        </form>
    </div>

    <div class="col-3"></div>
</div>
<script>
    // تنظیمات دکمه لغو
    function redirect(){
        window.location.replace("{{route('Admin-Panel')}}");;
    }
</script>
<script>
    $(document).ready(function(){
        $("#HideBox").click(function(){
            $("#PasswordsBox").hide();
            $("#ShowBox").show();
        });
        $("#ShowBox").click(function(){
            $("#PasswordsBox").show();
            $("#ShowBox").hide();
        });
    });
</script>
@endsection
