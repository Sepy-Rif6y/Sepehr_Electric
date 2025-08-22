<div>
    {{-- دریافت اطلاعات کارخانه ها و قرار دادن در لیست --}}
    @foreach ($Factories as $item)
        <div >
            <a href="{{route('Same-Factory',$item->id)}}">
                <li class="FactoryChild">
                    {{$item->factory_title}}
                </li>
            </a>
        </div>
    @endforeach
</div>
