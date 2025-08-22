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
        <!-- شروع فرم  -->
        <form action="{{route('UserEditValidation')}}" method="POST" enctype="multipart/form-data">
            {{-- کلید برای اسال فرم به صورت پست --}}
            @csrf

            {{-- ارسال اطلاعات قبلی جهت تشخیص تغییرات --}}
            <input type="hidden" name="lastrealname" value="{{$user_info->realname}}">
            <input type="hidden" name="lastusername" value="{{$user_info->username}}">
            <input type="hidden" name="lastpassword" value="{{$user_info->password}}">
            <input type="hidden" name="id" value="{{$user_info->id}}">

            <div class="card-body">
                <div class="form-group">
                    {{-- ورودی نام کاربر --}}
                    <label for="inputPassword3" class="col-sm-2 control-label">⇂ نام کاربر ⇃</label><br>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputPassword3" name="EntryRealName" value="{{$user_info->realname}}" placeholder="نام کاربر را وارد کنید" required><br><br>
                    </div>

                    <label for="UserName" class="col-sm-2 control-label">⇂ نام کاربری ⇃</label><br/>
                    <div class="col-sm-10">
                        <input type="text" name="EntryUserName" class="form-control" id="UserName" value="{{$user_info->username}}" placeholder="نام کاربری را وارد کنید" required><br/><br/>
                    </div>

                    {{-- ورودی رمز --}}
                    @if(session()->get("Password_Error"))
                        @php $message = session()->get("Password_Error"); @endphp
                        <div style="color: red; cursor: default; font-size: 20px;">{{$message}}</div>
                    @endif
                    <label for="inputPassword3" class="col-sm-2 control-label">⇂ پسورد ⇃</label><br>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword3" name="EntryPassword" placeholder="پسورد را وارد کنید"><br><br>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                {{-- تنظیمات دکمه ها --}}
                <button type="submit" class="btn btn-success">ذخیره</button>
                <input type="button" onclick="redirect()" class="btn btn-warning float-left" value="بازگشت">
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
