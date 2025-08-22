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
            @if (session()->get('change'))
                <div class="card-header mt-1 bg-success">
                    <ul style="font-size: large; font-weight: bold; margin-right: 10px;">
                        {!!session()->get("change")!!}
                    </ul>
                </div>
            @endif
        <!-- شروع فرم  -->
        <form action="{{route('ProductEditValidation')}}" method="POST" enctype="multipart/form-data">
            {{-- کلید برای اسال فرم به صورت پست --}}
            @csrf
            <input type="hidden" name="id" value="{{$Product_Info->id}}">
            <input type="hidden" name="LastTitle" value="{{$Product_Info->title}}">
            <input type="hidden" name="LastDescription" value="{{$Product_Info->description}}">
            <input type="hidden" name="LastCategory" value="{{$Product_Info->category_name}}">
            <input type="hidden" name="LastFactory" value="{{$Product_Info->factory_name}}">
            <input type="hidden" name="LastStatus" value="{{$Product_Info->status}}">
            <div class="card-body">
                <div class="form-group">
                    {{-- ورودی عنوان محصول --}}
                    <label for="EntryTitle" class="col-sm-3 control-label">⇂ عنوان محصول ⇃</label><br>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="EntryTitle" name="EntryTitle" placeholder="عنوان محصول را وارد کنید" value="{{$Product_Info->title}}" required><br><br>
                    </div>

                    {{-- ورودی شرح محصول --}}
                    <label for="Description" class="col-sm-3 control-label">⇂ شرح محصول ⇃</label><br/>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="EntryDescription" id="Description" cols="65" rows="5" placeholder="شرح محصول را وارد کنید" required>{{$Product_Info->description}}</textarea><br/><br/>
                    </div>

                    {{-- ورودی عکس --}}
                    <label for="Image" class="col-sm-3 control-label">⇂ عکس محصول ⇃</label><br>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" dir="ltr" name="EntryImage" id="Image"><br><br>
                    </div>

                    {{-- ورودی دسته بندی--}}
                    <label for="Categories" class="col-sm-3 control-label">⇂ دسته بندی ⇃</label><br>
                    <div class="col-sm-10">
                        <select name="EntryCategory" id="Categories" class="form-control">
                            <option disabled>انتخاب کنید</option>
                            @foreach ($Categories as $item)
                                <option @if ($Product_Info->category_id == $item->id) selected @endif value="{{$item->id}}">{{$item->category_title}}</option>
                            @endforeach
                        </select><br><br>
                    </div>
                    {{-- ورودی کارخانه--}}
                    <label for="Factories" class="col-sm-3 control-label">⇂ کارخانه ⇃</label><br>
                    <div class="col-sm-10">
                        <select name="EntryFactory" id="Factories" class="form-control">
                            <option disabled>انتخاب کنید</option>
                            @foreach ($Factories as $item)
                                <option @if ($Product_Info->factory_id == $item->id) selected @endif value="{{$item->id}}">{{$item->factory_title}}</option>
                            @endforeach
                        </select><br><br>
                    </div>
                    {{-- ورودی وضعیت --}}
                    <label class="col-sm-3 control-label">⇂ وضعیت محصول ⇃</label><br>
                    <div class="col-sm-10">
                        <div class="form-control d-flex justify-content-around" style="font-size: larger;">
                            <span class="pt-1 text-success">
                                <input type="radio" id="published" @if ($Product_Info->status == 'published') checked @endif name="status" value="published">
                                <label for="published">منتشر کردن</label>
                            </span>
                            <span class="pt-1 text-warning">
                                <input type="radio" id="draft" @if ($Product_Info->status == 'draft') checked @endif name="status" value="draft">
                                <label for="draft">در صف انتظار</label>
                            </span>
                            <span class="pt-1 text-danger">
                                <input type="radio" id="rejected" @if ($Product_Info->status == 'rejected') checked @endif name="status" value="rejected">
                                <label for="rejected">لغو انتشار</label>
                            </span>

                        </div>
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
        window.location.replace("{{route('Products-List')}}");;
    }
</script>
@endsection
