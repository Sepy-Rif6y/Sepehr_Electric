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
        <h3 class="card-title">لیست کاربران</h3>
        <a href="{{route('User-Add')}}" class="btn btn-primary">افزودن کاربر</a>
    </div>
    <div class="card-body">
        {{-- صفحه آرایی --}}
        <div class="d-flex justify-content-between align-items-center" style="margin-bottom: 10px">
            <div>
                <div>
                    <span>نمایش</span>
                    <span>{{($users->currentPage() - 1) * $users->perPage() + 1}}</span>
                    <span>تا</span>
                    <span>
                        @if ($users->lastPage() == $users->currentPage())
                        {{$users->total()}}
                        @else
                        {{$users->currentPage() * $users->perPage()}}
                        @endif
                    </span>
                    <span>از</span>
                    <span>{{$users->total()}}</span>
                    <span>مورد</span>
                </div>
                <!-- SEARCH FORM -->
                <form class="form-inline ml-3" enctype="multipart/form-data" style="direction: ltr">
                    <div class="input-group input-group-sm">
                        <input class="form-control" style="border-radius: 10px 0px 0px 10px !important; border-right: none !important; direction: rtl;" name="UserSearch" value="{{request()->UserSearch}}" type="search" placeholder="جستجو کاربر">
                        <div>
                            <button class="btn btn-default" style="border-radius: 0px 10px 10px 0px; border-left: none;" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            @if (!$message == null)
                <div class="alert alert-warning" style="text-align: center">
                    {{$message}}
                </div>
            @else
                <div class="d-flex align-items-center CustomPageNumber">{{$users->appends(request()->input())->links("pagination::bootstrap-4")}}</div>
            @endif

            <div>
                <form>
                    <label>تعداد در هر صفحه</label>
                    <select name="Per_Page" class="form-control d-inline" style="width: 75px">
                        <option @if($users->perPage() == 5) selected @endif value="5">5</option>
                        <option @if($users->perPage() == 10) selected @endif value="10">10</option>
                        <option @if($users->perPage() == 15) selected @endif value="15">15</option>
                        <option @if($users->perPage() == 20) selected @endif value="20">20</option>
                        <option @if($users->perPage() == 50) selected @endif value="50">50</option>
                    </select>
                    <input type="submit" value="تایید" class="btn btn-info">
                </form>
            </div>
        </div>
        {{-- جدول لیست کاربران --}}
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>ردیف</th>
          <th>نام واقعی کاربر</th>
          <th>نام کاربری</th>
          <th>تاریخ عضویت</th>
          <th>ادمین / یوزر</th>
          <th style="width: 200px">عملیات</th>
        </tr>
        </thead>
        <tbody style="text-align: center">
            {{-- جایگزاری اطلاعات کاربران --}}
            @foreach ($users as $item)
                <tr>
                    <td>{{($users->currentPage() - 1) * $users->perPage() + $loop->iteration}}</td>
                    <td>{{$item->realname}}</td>
                    <td>{{$item->username}}</td>
                    <td>{{$item->created_at}} / {{$item->real_time}}</td>
                    <td>
                        @if ($item->status == 0)
                            {{"user"}}
                        @else
                            {{"Admin"}}
                        @endif
                    </td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger Delete-User" data-username = "{{$item->username}}" data-id = "{{$item->id}}" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-trash"></i> حذف</button>
                            <a href="{{route('Admin-User-Edit',$item->id)}}" class="btn btn-info"><i class="fa fa-edit"></i> ویرایش</a>
                            <a href="{{route('Change-Status',$item->id)}}" class="btn btn-warning"><i class="fa fa-exchange"></i> تغییر وضعیت</a>
                          </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>ردیف</th>
            <th>نام واقعی کاربر</th>
            <th>نام کاربری</th>
            <th>تاریخ عضویت</th>
            <th>ادمین / یوزر</th>
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
            <span>آیا از حذف کاربر</span>
            <mark id="username-for-delete"></mark>
            <span>مطمئن هستید؟</span>
        </h5>
        </div>
        <div class="modal-footer justify-content-between">
            <form action="{{route('User-Delete')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="UserId" id="user_id" value="">
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
            $(".Delete-User").click(function (){
                $("#username-for-delete").text($(this).data('username'));
                $("#user_id").val($(this).data('id'));
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
