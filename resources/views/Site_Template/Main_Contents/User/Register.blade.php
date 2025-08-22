{{-- اتصال به قالب اصلی --}}
@extends("Site_Template.index")
{{-- عنوان صفحه --}}
@section("title")
@parent
{{$title}}
@endsection
{{-- جایگذاری در ییلد --}}
@section("MainContent")

<form action="{{route("RegisterValidation")}}" method="post" style="width: 60%; text-align: center;" enctype="multipart/form-data">
    <!-- کلید برای ارسال داده ها به صورت پست -->
    @csrf

    <!-- RealName Settings -->
    <label for="RealName" style="font-size: 25px;">⇂ نام خود را وارد نمایید ⇃</label><br/>
    <input type="text" name="RealName" class="TextBox" id="RealName" placeholder="Enter Your Real Name" required><br/><br/>

    <!-- UserName Settings -->
    @if(session()->get("User_Error"))
            @php $message = session()->get("User_Error") @endphp
    <div style="color: red; cursor: default; font-size: 20px;">{{$message}}</div>
    @endif
    <label for="UserName" style="font-size: 25px;">⇂ نام کاربری خود را وارد نمایید ⇃</label><br/>
    <input type="text" name="UserName" class="TextBox" id="UserName" placeholder="Enter Your User Name" required><br/><br/>

    <!-- Password Settings -->
    @if(session()->get("Password_Error"))
            @php $message = session()->get("Password_Error"); @endphp
    <div style="color: red; cursor: default; font-size: 20px;">{{$message}}</div>
    @endif
    <label for="Password" style="font-size: 25px;">⇂ رمز خود را وارد نمایید ⇃</label><br/>
    <input type="password" name="Password" class="TextBox" id="Password" placeholder="Enter Your Password" required><br/><br/>

    <!-- RePassword Settings -->
    @if(session()->get("Repassword_Error"))
            @php $message = session()->get("Repassword_Error"); @endphp
    <div style="color: red; cursor: default; font-size: 20px;">{{$message}}</div>
    @endif
    <label for="Password" style="font-size: 25px;">⇂ رمز خود را مجددا وارد نمایید ⇃</label><br/>
    <input type="password" name="RePassword" class="TextBox" id="Password" placeholder="Enter Your Password Again" style="width: 250px; height: 25px;" required><br/><br/>

    <!--  Executive Buttons Settings  -->
    <input type="submit" value="ثبت نام" class="Button" style="font-size: 20px;">
    <input type="reset" value="انصراف" class="Button" style="margin-left: 10px; font-size: 20px;">
</form>

@endsection
