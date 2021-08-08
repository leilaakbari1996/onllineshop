@extends('admin.layout.master')


@section('content')

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">کاربر ها</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th>#</th>
                        <th>نام</th>
                        <th>ایمیل</th>
                        <th>نقش</th>
                        <th>ویرایش</th>
                        <th>حذف</th>
                      </tr>
                      </thead>
                      <tbody>
                          @foreach ($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}
                                </td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->role->title}}</td>
                                <td>
                                    <a href="{{route('users.edit',$user)}}" class="btn btn-primary
                                         btn-sm">ویرایش</a>

                                </td>
                                <td>
                                    <form action="{{route('users.destroy',$user)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" class="btn btn-danger btn-sm" value="حذف">
                                    </form>
                                </td>
                            </tr>

                          @endforeach

                      <tfoot>
                      <tr>
                        <th>#</th>
                        <th>نام</th>

                      </tr>
                      </tfoot>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

@endsection



@section('script')
    <!-- DataTables -->
    <script src="/admin/plugins/datatables/jquery.dataTables.js"></script>
    <script src="/admin/plugins/datatables/dataTables.bootstrap4.js"></script>
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
