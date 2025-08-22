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
        <form action="{{route('FactoryAddValidation')}}" method="POST" enctype="multipart/form-data">
            {{-- کلید برای اسال فرم به صورت پست --}}
            @csrf

            <div class="card-body">
                <div class="form-group">
                    {{-- ورودی عنوان کارخانه --}}
                    @if(session()->get("FactoryTitleError"))
                    @php $message = session()->get("FactoryTitleError"); @endphp
                    <div style="color: red; cursor: default; font-size: 20px;">{{$message}}</div>
                    @endif
                    <label for="EntryFactoryTitle" class="col-sm-3 control-label">⇂ عنوان کارخانه ⇃</label><br>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="EntryFactoryTitle" name="EntryFactoryTitle" placeholder="عنوان کارخانه را وارد کنید" required><br><br>
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
        window.location.replace("{{route('Factories-List')}}");;
    }
</script>
@endsection
