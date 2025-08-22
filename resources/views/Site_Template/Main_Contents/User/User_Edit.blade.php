{{-- اتصال به قالب اصلی --}}
@extends("Site_Template.index")
{{-- عنوان صفحه --}}
@section("title")
@parent
{{$title}}
@endsection
{{-- جایگذاری در ییلد --}}
@section("MainContent")

<form action="{{route("UserEditValidationHome")}}" method="post" style="width: 60%; text-align: center;" enctype="multipart/form-data">
    <!-- کلید برای ارسال داده ها به صورت پست -->
    @csrf

    <!-- تنظیمات پیغام ها -->
    @if(session() -> get("change"))
        <ul style="border: 3px dotted darkgreen; color: darkgreen; font-size: larger; font-weight: bold;">
            {!! session() -> get("change") !!}
        </ul>
        <br>
    @endif

    @if (session() -> get("error"))
        @php $message = session() -> get("error"); @endphp
        <div class="Message" style="border: 4px dotted darkred; color: darkred; width: 600px; height: 50px;">{{$message}}</div>
    @endif

    <input type="hidden" name="id" value="{{$user_info -> id}}">
    <input type="hidden" name="LastRealName" value="{{$user_info -> realname}}">
    <input type="hidden" name="lastUserName" value="{{$user_info -> username}}">
    <input type="hidden" name="LastPassword" value="{{$user_info -> password}}">

    <!-- RealName Settings -->
    <label for="RealName" style="font-size: 25px;">⇂ نام خود را وارد نمایید ⇃</label><br/>
    <input type="text" name="EntryRealName" class="TextBox" id="RealName" placeholder="Enter Your Real Name" value="{{$user_info -> realname}}" required><br/><br/>

    <!-- UserName Settings -->
    @if(session() -> get("User_Error"))
            @php $message = session() -> get("User_Error") @endphp
    <div style="color: red; cursor: default; font-size: 20px;">{{$message}}</div>
    @endif
    <label for="UserName" style="font-size: 25px;">⇂ نام کاربری خود را وارد نمایید ⇃</label><br/>
    <input type="text" name="EntryUserName" class="TextBox" id="UserName" placeholder="Enter Your User Name" value= "{{$user_info -> username}}" required><br/><br/>

    <div >
        <input type="button" id="ShowBox" style="margin-bottom: 50px" onclick="style.display='none'" class="TextBox" value="تغییر رمز">
    </div>
    <div id="PasswordsBox" style="display: none">
        <!-- Last Password -->
        @if(session() -> get("Last_Entry_Password_Error"))
            @section('jquery')
            <script>
                $("#PasswordsBox").show();
                $("#ShowBox").hide();
            </script>
            @endsection
            @php $message = session() -> get("Last_Entry_Password_Error"); @endphp
            <div style="color: red; cursor: default; font-size: 20px;">{{$message}}</div>
        @endif
        <label for="LastEntryPassword" style="font-size: 25px;">⇂ رمز قبلی خود را وارد نمایید ⇃</label><br/>
        <input type="password" name="LastEntryPassword" class="TextBox" id="LastEntryPassword" placeholder="Enter Your Last Password" ><br/><br/>

        <!-- Password Settings -->
        @if(session() -> get("Password_Error"))
            @section('jquery')
            <script>
                $("#PasswordsBox").show();
                $("#ShowBox").hide();
            </script>
            @endsection
            @php $message = session() -> get("Password_Error"); @endphp
            <div style="color: red; cursor: default; font-size: 20px;">{{$message}}</div>
        @endif
        <label for="Password" style="font-size: 25px;">⇂ رمز جدید خود را وارد نمایید ⇃</label><br/>
        <input type="password" name="EntryPassword" class="TextBox" id="Password" placeholder="Enter Your New Password" ><br/><br/>

        <!-- RePassword Settings -->
        @if(session() -> get("RePassword_Error"))
            @section('jquery')
            <script>
                $("#PasswordsBox").show();
                $("#ShowBox").hide();
            </script>
            @endsection
            @php $message = session() -> get("RePassword_Error"); @endphp
            <div style="color: red; cursor: default; font-size: 20px;">{{$message}}</div>
        @endif
        <label for="Password" style="font-size: 25px;">⇂ رمز خود را مجددا وارد نمایید ⇃</label><br/>
        <input type="password" name="EntryRePassword" class="TextBox" id="RePassword" placeholder="Enter Your Password Again" style="width: 250px; height: 25px;" ><br/><br/>
        <input type="button" id="HideBox" class="TextBox" style="margin-bottom: 50px" value="لغو">
    </div>

    <!--  Executive Buttons Settings  -->
    <input type="submit" value="ذخیره" class="Button" style="font-size: 20px;">
    <input type="reset" value="انصراف" class="Button" style="margin-left: 10px; font-size: 20px;">
</form>

@endsection
{{-- تنظیمات باز شدن باکس تغییر رمز --}}
@section('jquery')
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
