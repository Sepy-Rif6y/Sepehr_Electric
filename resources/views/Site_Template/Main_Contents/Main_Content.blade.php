{{-- اتصال به قالب اصلی --}}
@extends("Site_Template.index")
{{-- عنوان صفحه --}}
@section("title")
@parent
@endsection
{{-- جایگذاری در ییلد --}}
@section("MainContent")
{{-- featured post --}}
<div class="col-lg-8 col-md-12" style="height: 100%">
    <div class="featured-post mb-50">
        <h4 class="widget-title mb-30"><span>جدیدترین </span> محصول <span>امروز</span></h4>
        @foreach ($products as $item)
            @if ($loop->first)
            <div class="featured-slider-1 border-radius-10 mb-200">
                <div class="featured-slider-1-items">
                    <div class="slider-single p-10">
                        <div class="img-hover-slide border-radius-15 mb-30 position-relative overflow-hidden">
                            <a href="{{route('Single-Show',$item->id)}}">
                                @if (file_exists(public_path('storage\\ProductsImage\\').$item->image))
                                <img src='{{asset('storage\\ProductsImage\\').$item->image}}' style="width: 100%: height:100%;" alt="post-slider">
                                @else
                                <img src="{{asset('Images/Image Not Found.jpg')}}" style="width: 100%: height:100%;" alt="post-slider">
                                @endif
                            </a>
                            <div class="d-flex justify-content-between">
                                <h5>
                                    <a href="{{route('Single-Show',$item->id)}}">{{$item->title}}</a>
                                </h5>
                                <div class="entry-meta">
                                    <a class="entry-meta meta-0" href="{{route('Same-Category',$item->category_id)}}"><span class="post-in text-white font-x-small" style="background-color: {{$item->category->category_color}}">{{$item->category_name}}</span></a>
                                </div>
                            </div>
                        </div>
                        <div class="pr-10 pl-10">
                            <h4 class="post-title mb-20"><a href="{{route('Single-Show',$item->id)}}">{{$item->short_description}}</a></h4>
                            <div class="mb-30 overflow-hidden">
                                <div class="entry-meta meta-2 float-right">
                                    <a href="{{route('Same-Factory',$item->factory_id)}}" tabindex="0"><span class="author-name text-grey h-100"> شرکت {{$item->factory_name}}</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        @endforeach
    </div>
    <!--Videos-->
    <div class="sidebar-widget">
        <div class="widget-header position-relative mb-20">
            <div class="row">
                <div class="col-7">
                    <h5 class="widget-title mb-0">محصولات <span>دیگر</span></h5>
                </div>
                <div class="col-5 text-left">
                    <h6 class="font-medium pl-15">
                        <a class="text-muted font-small" href="{{route('All-Products')}}">مشاهده همه</a>
                    </h6>
                </div>
            </div>
        </div>
            <div class="row">
                @foreach ($products as $item)
                    @if (!$loop->first)
                            <div class="slider-single col-md-4 mb-30">
                                <div class="img-hover-scale border-radius-10">
                                    <a href="{{route('Single-Show',$item->id)}}">
                                        @if (file_exists(public_path('storage\\ProductsImage\\').$item->image))
                                        <img class="border-radius-10" src='{{asset('storage\\ProductsImage\\').$item->image}}' alt="post-slider">
                                        @else
                                        <img class="border-radius-10" src="{{asset('Images/Image Not Found.jpg')}}">
                                        @endif
                                    </a>
                                </div>
                                <h5 class="post-title pr-5 pl-5 mb-10 mt-15 text-limit-2-row">
                                    <a href="{{route('Single-Show',$item->id)}}">{{$item->title}}</a>
                                </h5><br>
                                <div class="entry-meta mb-30">
                                    <a class="entry-meta meta-0" href="{{route('Same-Category',$item->category_id)}}"><span class="post-in text-white font-x-small" style="background-color: {{$item->category->category_color}}">{{$item->category_name}}</span></a>
                                    /
                                    <a href="{{route('Same-Factory',$item->factory_id)}}" tabindex="0"><span class="author-name text-grey h-100"> شرکت {{$item->factory_name}}</span></a>
                                </div>
                            </div>
                    @endif
                @endforeach
            </div>
    </div>
</div>
@endsection
