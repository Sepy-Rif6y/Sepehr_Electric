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
        <!-- شروع فرم  -->
        <form action="{{route('CategoryAddValidation')}}" method="POST" enctype="multipart/form-data">
            {{-- کلید برای اسال فرم به صورت پست --}}
            @csrf

            <div class="card-body">
                <div class="form-group">
                    {{-- ورودی عنوان دسته بندی --}}
                    @if(session()->get("CategoryTitleError"))
                    @php $message = session()->get("CategoryTitleError"); @endphp
                    <div style="color: red; cursor: default; font-size: 20px;">{{$message}}</div>
                    @endif
                    <label for="inputPassword3" class="col-sm-3 control-label">⇂ عنوان دسته بندی ⇃</label><br>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputPassword3" name="EntryCategoryTitle" placeholder="عنوان دسته بندی را وارد کنید" required><br><br>
                    </div>

                    {{-- ورودی رنگ دسته بندی --}}
                    @if(session()->get("CategoryColorError"))
                    @php $message = session()->get("CategoryColorError"); @endphp
                    <div style="color: red; cursor: default; font-size: 20px;">{{$message}}</div>
                    @endif
                    <label for="UserName" class="col-sm-2 control-label">⇂ رنگ ⇃</label><br/>
                    <div class="col-sm-10">
                        <input type="color" name="EntryCategoryColor" class="form-control" id="UserName" placeholder="رنگ را وارد کنید" required><br/><br/>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                {{-- تنظیمات دکمه ها --}}
                <button type="submit" class="btn btn-success">ثبت</button>
                <input type="button" onclick="redirect()" class="btn btn-warning float-left" value="بازگشت">
            </div>
        </form>
    </div>

    <div class="col-3"></div>
</div>
<script>
    // تنظیمات دکمه لغو
    function redirect(){
        window.location.replace("{{route('Categories-List')}}");;
    }
</script>
@endsection
