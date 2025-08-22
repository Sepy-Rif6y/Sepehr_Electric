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
    <div class="card-header">
      <h3 class="card-title">لیست مدیران</h3>
    </div>
    <div class="card-body">
        {{-- جدول مدیران --}}
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>ردیف</th>
          <th>نام واقعی مدیر</th>
          <th>نام مدیریتی</th>
          <th>تاریخ عضویت</th>
          <th style="width: 200px">عملیات</th>
        </tr>
        </thead>
        <tbody style="text-align: center">
            {{-- جایگزاری اطلاعات مدیران --}}
            @foreach ($Admins_info as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->realname}}</td>
                    <td>{{$item->username}}</td>
                    <td>{{$item->added_at}}</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default">حذف</button>
                            <button type="button" class="btn btn-default">تغییر وضعیت</button>
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
<script>
  $(function () {
    $("#example1").DataTable({
        "language": {
            "paginate": {
                "next": "بعدی",
                "previous" : "قبلی"
            }
        },
        "info" : false,
    });
    $('#example2').DataTable({
        "language": {
            "paginate": {
                "next": "بعدی",
                "previous" : "قبلی"
            }
        },
      "info" : false,
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "autoWidth": false
    });
  });
</script>
@endsection
