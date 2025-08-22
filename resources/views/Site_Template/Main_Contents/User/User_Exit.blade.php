{{-- اتصال به قالب اصلی --}}
@extends("Site_Template.index")
{{-- عنوان صفحه --}}
@section("title")
@parent
{{$title}}
@endsection
{{-- جایگذاری در ییلد --}}
@section("MainContent")

    <form action="{{route("UserExitValidation")}}" method="post" style="width: 60%; text-align: center; display:inline;" enctype="multipart/form-data">
        <!-- کلید برای ارسال داده ها به صورت پست -->
        @csrf

        <!-- Registration Message Settings -->
        @php $message = session()->get("message"); @endphp
        @if ($message)
            <div class="Message" style="border: 4px dotted darkred; color: darkred; width: 600px; height: 50px;">{{$message}}</div>
        @endif


        <!-- Password Settings -->
        <label for="Password" style="font-size: 25px;">⇂ رمز خود را جهت خارج شدن از اکانت وارد نمایید ⇃</label><br/><br/>
        <input type="password" name="Password" class="TextBox" id="Password" placeholder="Enter Your Password" required><br/><br/>

        <!--  Executive Buttons Settings  -->
        <input type="submit" value="خروج" class="Button" style="font-size: 20px;">
        <input type="button" onclick="redirect()" value="انصراف" class="Button" style="margin-left: 10px; font-size: 20px;">
    </form>
{{-- تنظیمات دکمه انصراف --}}
<script>
    function redirect(){
        window.location.replace("{{route('Home')}}");;
    }
</script>
@endsection
