<div>
    {{-- دریافت اطلاعات دسته بندی ها و قرار دادن در لیست --}}
    @foreach ($categories as $item)
        <div >
            <a href="{{route('Same-Category',$item->id)}}">
                <li style="border: 2px solid {{$item->category_color}}; color:{{$item->category_color}};" class="CategoryChild">
                    {{$item->category_title}}
                </li>
            </a>
        </div>
    @endforeach
</div>
