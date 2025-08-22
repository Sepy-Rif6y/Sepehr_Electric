{{-- صفحه تایید صلاحیت برای نمایش اطلاعات ادمین --}}
<!DOCTYPE html>
   <html lang="fa" dir="rtl">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <!--=============== REMIXICONS ===============-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" crossorigin="">

      <!--=============== CSS ===============-->
      <link rel="stylesheet" href="{{asset('Login_Assets/css/styles.css')}}">
        {{-- عنوان سایت --}}
        <title>Admin Panel  - تایید صلاحیت</title>
   </head>
   <body>
      <div class="login">
        {{-- عکس پس زمینه --}}
         <img src="{{asset('Login_Assets/img/login-bg.png')}}" alt="image" class="login__bg">
        {{-- فرم وارد کردن رمز --}}
        <form action="{{route('AdminProfileGateValidation')}}" method="POST" enctype="multipart/form-data" class="login__form">
            @csrf
            <h1 class="login__title">رمز خود را وارد کنید</h1>

            <div class="login__inputs">

               <div class="login__box">
                  <input type="password" name="password" placeholder="رمز" required class="login__input">
                  <i class="ri-lock-2-fill"></i>
               </div>
            </div>
            <div style="display: flex">
                <input type="submit" class="login__button" value="ورود">
                <input type="button" onclick="redirect()" class="login__button" value="بازگشت">
            </div>
         </form>
      </div>
   </body>
</html>
<script>
    // تنظیمات دکمه لغو
    function redirect(){
        window.location.replace("{{route('Admin-Panel')}}");;
    }
</script>
