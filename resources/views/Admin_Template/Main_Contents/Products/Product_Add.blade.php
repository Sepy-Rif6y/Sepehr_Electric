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
        <form action="{{route('ProductAddValidation')}}" method="POST" enctype="multipart/form-data">
            {{-- کلید برای اسال فرم به صورت پست --}}
            @csrf

            <div class="card-body">
                <div class="form-group">
                    {{-- ورودی عنوان محصول --}}
                    <label for="EntryTitle" class="col-sm-3 control-label">⇂ عنوان محصول ⇃</label><br>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="EntryTitle" name="EntryTitle" placeholder="عنوان محصول را وارد کنید" required><br><br>
                    </div>

                    {{-- ورودی شرح محصول --}}
                    <label for="Description" class="col-sm-3 control-label">⇂ شرح محصول ⇃</label><br/>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="EntryDescription" id="Description" cols="65" rows="5" placeholder="شرح محصول را وارد کنید" required></textarea><br/><br/>
                    </div>

                    {{-- ورودی عکس --}}
                    <label for="Image" class="col-sm-3 control-label">⇂ عکس محصول ⇃</label><br>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" dir="ltr" name="EntryImage" id="Image" required><br><br>
                    </div>

                    {{-- ورودی دسته بندی--}}
                    <label for="Categories" class="col-sm-3 control-label">⇂ دسته بندی ⇃</label><br>
                    <div class="col-sm-10">
                        <select name="EntryCategory" id="Categories" class="form-control">
                            <option selected disabled>انتخاب کنید</option>
                            @foreach ($Categories as $item)
                                <option value="{{$item->id}}">{{$item->category_title}}</option>
                            @endforeach
                        </select><br><br>
                    </div>
                    {{-- ورودی کارخانه--}}
                    <label for="Factories" class="col-sm-3 control-label">⇂ کارخانه ⇃</label><br>
                    <div class="col-sm-10">
                        <select name="EntryFactory" id="Factories" class="form-control">
                            <option selected disabled>انتخاب کنید</option>
                            @foreach ($Factories as $item)
                                <option value="{{$item->id}}">{{$item->factory_title}}</option>
                            @endforeach
                        </select><br><br>
                        <div style="font-weight: bold">
                            <input type="checkbox" name="IsPublished" id="IsPublished" value="published">
                            <Label for="IsPublished">منتشر کردن</Label>
                        </div>
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
        window.location.replace("{{route('Products-List')}}");;
    }
</script>
@endsection
