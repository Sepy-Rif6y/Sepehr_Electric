{{-- اتصال به قالب اصلی --}}
@extends("Site_Template.index")
{{-- عنوان صفحه --}}
@section("title")
@parent
{{$title}}
@endsection
{{-- جایگذاری در ییلد --}}
@section("MainContent")
    <!--Videos-->
    <div class="sidebar-widget">
        <div class="latest-post mb-50" style="width: 776px">
            <div class="loop-list-style-1">
                        {{-- صفحه آرایی --}}
        <div class="d-flex justify-content-center align-items-center" style="margin-bottom: 10px">
            <div class="d-flex align-items-center CustomPageNumber">{{$products->appends(request()->input())->links("pagination::bootstrap-4")}}</div>
        </div>
            @foreach ($products as $item)
                    <article class="p-10 background-white border-radius-10 mb-30 wow fadeIn animated">
                        <div class="d-md-flex d-block">
                            <div class="post-thumb post-thumb-big d-flex ml-15 border-radius-15 img-hover-scale">
                                <a class="color-white" href="{{route('Single-Show',$item->id)}}">
                                    @if (file_exists(public_path('storage\\ProductsImage\\').$item->image))
                                    <img class="border-radius-15" src='{{asset('storage\\ProductsImage\\').$item->image}}'>
                                    @else
                                    <img class="border-radius-15" src="{{asset('Images/Image Not Found.jpg')}}">
                                    @endif
                                </a>
                            </div>
                            <div class="post-content media-body">
                                <h5 class="post-title mb-15 text-limit-2-row">
                                    <a href="{{route('Single-Show',$item->id)}}">{{$item->title}}</a></h5>
                                <p class="post-exerpt font-medium text-muted mb-30 d-none d-lg-block">{{$item->short_description}}</p>
                                <div class="d-flex font-x-small mt-50" style="justify-content: space-evenly">
                                    <div class="entry-meta">
                                        <a class="entry-meta meta-2" href="{{route('Same-Category',$item->category_id)}}">
                                            <span class="color-grey">دسته بندی</span>
                                            <span style="color: {{$item->category->category_color}};">{{$item->category_name}}</span>
                                        </a>
                                    </div>
                                    <div class="entry-meta">
                                            <a href="{{route('Same-Factory',$item->factory_id)}}">
                                                <span class="color-grey">شرکت</span>
                                                <span>{{$item->factory_name}}</span>
                                            </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
            @endforeach
        </div>

        </div>
</div>
@endsection
