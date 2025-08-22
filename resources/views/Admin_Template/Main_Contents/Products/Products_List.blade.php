{{-- اتصال به قالب اصلی --}}
@extends("Admin_Template.index")
{{-- عنوان صفحه --}}
@section('title')
@parent
{{$title}}
@endsection
{{-- جایگذاری در ییلد --}}
@section("MainContent")
<div class="card">
    <div class="d-flex justify-content-between border-bottom" style="padding: 10px 30px; font-weight: bold;">
        <h3 class="card-title">لیست محصولات</h3>
        <div class="btn-group">
            <button type="button" disabled class="btn btn-default">نمایش بر اساس: </button>
            <a href="{{route('Products-List')}}" class="btn btn-info">همه محصولات</a>
            <a href="{{route('Products-List', 'rejected')}}" class="btn btn-danger">لغو انتشار شده ها</a>
            <a href="{{route('Products-List', 'draft')}}" class="btn btn-warning">در صف انتظار ها</a>
            <a href="{{route('Products-List', 'published')}}" class="btn btn-success">منتشر شده ها</a>
        </div>
        <a href="{{route('Product-Add')}}" class="btn btn-primary">افزودن محصول</a>
    </div>
    <div class="card-body">
        {{-- صفحه آرایی --}}
        <div class="d-flex justify-content-between align-items-center" style="margin-bottom: 10px">
            <div>
                <div>
                    <span>نمایش</span>
                    <span>{{($Products_info->currentPage() - 1) * $Products_info->perPage() + 1}}</span>
                    <span>تا</span>
                    <span>
                        @if ($Products_info->lastPage() == $Products_info->currentPage())
                            {{$Products_info->total()}}
                        @else
                        {{$Products_info->currentPage() * $Products_info->perPage()}}
                        @endif
                    </span>
                    <span>از</span>
                    <span>{{$Products_info->total()}}</span>
                    <span>مورد</span>
                </div>
                <!-- SEARCH FORM -->
                <form class="form-inline ml-3" enctype="multipart/form-data" style="direction: ltr">
                    <div class="input-group input-group-sm">
                        <input class="form-control" style="border-radius: 10px 0px 0px 10px !important; border-right: none !important; direction: rtl;" name="ProductSearch" value="{{request()->ProductSearch}}" type="search" placeholder="جستجو محصول">
                        <div>
                            <button class="btn btn-default" style="border-radius: 0px 10px 10px 0px; border-left: none;" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="d-flex align-items-center CustomPageNumber">{{$Products_info->appends(request()->input())->links("pagination::bootstrap-4")}}</div>
            <form>
                <label>تعداد در هر صفحه</label>
                <select name="Per_Page" class="form-control d-inline" style="width: 75px">
                    <option @if($Products_info->perPage() == 5) selected @endif value="5">5</option>
                    <option @if($Products_info->perPage() == 10) selected @endif value="10">10</option>
                    <option @if($Products_info->perPage() == 15) selected @endif value="15">15</option>
                    <option @if($Products_info->perPage() == 20) selected @endif value="20">20</option>
                    <option @if($Products_info->perPage() == 50) selected @endif value="50">50</option>
                </select>
                <input type="submit" value="تایید" class="btn btn-info">
            </form>
        </div>
        {{-- جدول لیست کاربران --}}
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>ردیف</th>
          <th style="width: 70px">وضعیت</th>
          <th>عکس</th>
          <th>عنوان</th>
          <th>شرح</th>
          <th>تاریخ ایجاد</th>
          <th>نام کارخانه</th>
          <th>عنوان دسته بندی</th>
          <th>عملیات</th>
        </tr>
        </thead>
        <tbody style="text-align: center">
            {{-- جایگزاری اطلاعات محصولات --}}
            @foreach ($Products_info as $item)
                <tr>
                    <td>{{($Products_info->currentPage() - 1) * $Products_info->perPage() + $loop->iteration}}</td>
                    <td style="font-size: larger">
                        {!! $item->change_status !!}
                    </td>
                    <td>
                        @if (file_exists(public_path('storage\\ProductsImage\\').$item->image))
                        <img src="{{asset('storage\\ProductsImage\\').$item->image}}">
                        @else
                        <img src="{{asset('Images/Image Not Found.jpg')}}">
                        @endif
                    </td>
                    <td>{{$item->title}}</td>
                    <td>{{$item->short_description}}</td>
                    <td>{{$item->created_at}} <br> {{$item->real_time}}</td>
                    <td>{{$item->factory_name}}</td>
                    <td>{{$item->category_name}}</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger Delete-Product" data-title = "{{$item->title}}" data-id = "{{$item->id}}" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-trash"></i> حذف</button>
                            <a href="{{route('Product-Edit',$item->id)}}" class="btn btn-info"><i class="fa fa-edit"></i> ویرایش</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>ردیف</th>
            <th>وضعیت</th>
            <th>عکس</th>
            <th>عنوان</th>
            <th>شرح</th>
            <th>تاریخ ایجاد</th>
            <th>نام کارخانه</th>
            <th>عنوان دسته بندی</th>
            <th style="width: 200px">عملیات</th>
        </tr>
        </tfoot>
      </table>
    </div>
</div>
<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('plugins/datatables/dataTables.bootstrap4.js')}}"></script>
<!-- SlimScroll -->
<script src="{{asset('plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<!-- page script -->
@endsection

{{-- جایگذاری در ییلد --}}
@section("Modal")
  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <h5 class="modal-title" id="exampleModalLongTitle">
            <span>آیا از حذف محصول</span>
            <mark id="title-for-delete"></mark>
            <span>مطمئن هستید؟</span>
        </h5>
        </div>
        <div class="modal-footer justify-content-between">
            <form action="{{route('Product-Delete')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="ProductId" id="Product_id" value="">
                <button type="submit" class="btn btn-danger">بله حذف کن</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection
@section("jquery")
    <script>
        $(document).ready(function (){
            $(".Delete-Product").click(function (){
                $("#title-for-delete").text($(this).data('title'));
                $("#Product_id").val($(this).data('id'));
            });
        });
    </script>
    @if (Session()->get('message'))
        <script>
            $(document).ready(function (){
                $('#AlertModal').modal('show');
            });
        </script>
    @endif
@endsection
