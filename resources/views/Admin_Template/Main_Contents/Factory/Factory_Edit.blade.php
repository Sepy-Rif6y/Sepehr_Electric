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
        @if (session() ->get('change'))
            <div class="card-header mt-1 bg-success">
                <ul>
                    {!! session() ->get('change') !!}
                </ul>
            </div>
        @endif
        <!-- شروع فرم  -->
        <form action="{{route('FactoryEditValidation')}}" method="POST" enctype="multipart/form-data">
            {{-- کلید برای اسال فرم به صورت پست --}}
            @csrf
            <input type="hidden" name="id" value="{{$factory_info->id}}">
            <input type="hidden" name="LastFactoryTitle" value="{{$factory_info->factory_title}}">
            <div class="card-body">
                <div class="form-group">
                    {{-- ورودی عنوان کارخانه --}}
                    @if(session()->get("FactoryTitleMessage"))
                    @php $message = session()->get("FactoryTitleMessage"); @endphp
                    <div style="color: red; cursor: default; font-size: 20px;">{{$message}}</div>
                    @endif
                    <label for="EntryFactoryTitle" class="col-sm-3 control-label">⇂ عنوان کارخانه ⇃</label><br>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="EntryFactoryTitle" name="EntryFactoryTitle" placeholder="عنوان کارخانه را وارد کنید" value="{{$factory_info->factory_title}}" required><br><br>
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
