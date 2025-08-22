{{-- اتصال به قالب اصلی --}}
@extends("Site_Template.index")
{{-- عنوان صفحه --}}
@section("title")
@parent
{{$title}}
@endsection
{{-- جایگذاری در ییلد --}}
@section("MainContent")
<form action="{{route("AdminValidation")}}" method="post" style="width: 60%; text-align: center;" enctype="multipart/form-data">
    <!-- کلید برای ارسال داده ها به صورت پست -->
    @csrf
    <!-- Login settings for administrator or user -->
    <div id="AdminAndUserButtonBox">
        <span style="cursor:pointer;" ><a href="{{route('LogIn')}}">User</a></span>
        <span class="AdminAndUserButton">Admin</span>
    </div><br/>
    <!-- Registration Message Settings -->
    @if (session()->get("Message"))
        @php $message = session()->get("Message"); @endphp
        <div class="Message" style="border: 4px dotted darkred; color: darkred; width: 600px; height: 50px;">{{$message}}</div>
    @endif

    <!-- UserName Settings -->
    <label for="UserName" style="font-size: 25px;">⇂ نام کابری خود را وارد نمایید ⇃</label><br/>
    <input type="text" name="UserName" class="TextBox" id="UserName" placeholder="Enter Your User Name" required><br/><br/>

    <!-- Password Settings -->
    <label for="Password" style="font-size: 25px;">⇂ رمز ورود خود را وارد نمایید ⇃</label><br/>
    <input type="password" name="Password" class="TextBox" id="Password" placeholder="Enter Your Password" required><br/><br/>

    <!--  Executive Buttons Settings  -->
    <input type="submit" value="ورود" class="Button" style="font-size: 20px;">
    <input type="reset" value="انصراف" class="Button" style="margin-left: 10px; font-size: 20px;">
</form>
@endsection
