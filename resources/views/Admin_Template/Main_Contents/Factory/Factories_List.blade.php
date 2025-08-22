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
        <div>
            <h3 class="card-title mb-3">لیست کارخانه ها</h3>

        </div>
        <a href="{{route('Factory-Add')}}" class="btn btn-primary">افزودن کارخانه</a>
    </div>
    <div class="card-body">
        {{-- صفحه آرایی --}}
        <div class="d-flex justify-content-between align-items-center" style="margin-bottom: 10px">
            <div>
                <div>
                    <span>نمایش</span>
                    <span>{{($Factories->currentPage() - 1) * $Factories->perPage() + 1}}</span>
                    <span>تا</span>
                    <span>
                        @if ($Factories->lastPage() == $Factories->currentPage())
                            {{$Factories->total()}}
                        @else
                        {{$Factories->currentPage() * $Factories->perPage()}}
                        @endif
                    </span>
                    <span>از</span>
                    <span>{{$Factories->total()}}</span>
                    <span>مورد</span>
                </div>

                <!-- SEARCH FORM -->
                <form class="form-inline ml-3" enctype="multipart/form-data" style="direction: ltr">
                    <div class="input-group input-group-sm">
                        <input class="form-control" style="border-radius: 10px 0px 0px 10px !important; border-right: none !important; direction: rtl;" name="FactorySearch" value="{{request()->FactorySearch}}" type="search" placeholder="جستجو کارخانه">
                        <div>
                            <button class="btn btn-default" style="border-radius: 0px 10px 10px 0px; border-left: none;" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="d-flex align-items-center CustomPageNumber">{{$Factories->appends(request()->input())->links("pagination::bootstrap-4")}}</div>
            <form>
                <label>تعداد در هر صفحه</label>
                <select name="Per_Page" class="form-control d-inline" style="width: 75px">
                    <option @if($Factories->perPage() == 5) selected @endif value="5">5</option>
                    <option @if($Factories->perPage() == 10) selected @endif value="10">10</option>
                    <option @if($Factories->perPage() == 15) selected @endif value="15">15</option>
                    <option @if($Factories->perPage() == 20) selected @endif value="20">20</option>
                    <option @if($Factories->perPage() == 50) selected @endif value="50">50</option>
                </select>
                <input type="submit" value="تایید" class="btn btn-info">
            </form>

        </div>
        {{-- جدول لیست کارخانه --}}
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>ردیف</th>
          <th>نام کارخانه</th>
          <th>تعداد محصولات</th>
          <th style="width: 200px">عملیات</th>
        </tr>
        </thead>
        <tbody style="text-align: center">
            {{-- جایگزاری اطلاعات دسته بندی --}}
            @foreach ($Factories as $item)
                <tr>
                    <td>{{($Factories->currentPage() - 1) * $Factories->perPage() + $loop->iteration}}</td>
                    <td>{{$item->factory_title }}</td>
                    <td>{{$item->products_count}} عدد </td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger Delete-Factory" data-factory-title = "{{$item->factory_title}}" data-id = "{{$item->id}}" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-trash"></i> حذف</button>
                            <a href="{{route('Factory-Edit',$item->id)}}" class="btn btn-info"><i class="fa fa-edit"></i> ویرایش</a>
                          </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>ردیف</th>
            <th>نام کارخانه</th>
            <th>تعداد محصولات</th>
            <th>عملیات</th>
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
            {{-- نمایش عنوان دسته بندی --}}
            <span>آیا از حذف کارخانه</span>
            <mark id="factory-title-for-delete"></mark>
            <span>مطمئن هستید؟</span>
        </h5>
        </div>
        <div class="modal-footer justify-content-between">
            <form action="{{route('Factory-Delete')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="FactoryId" id="factory_id" value="">
                <button type="submit" class="btn btn-danger">بله حذف کن</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
            </form>
        </div>
      </div>
    </div>
  </div>

@endsection
{{-- جایگذاری در ییلد جی کواری --}}
@section("jquery")
    <script>
        $(document).ready(function (){
            $(".Delete-Factory").click(function (){
                    $("#factory-title-for-delete").text($(this).data('factory-title'));
                    $("#factory_id").val($(this).data('id'));
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
