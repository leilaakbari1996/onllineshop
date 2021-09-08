@extends('admin.layout.master')


@section('content')

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">کامنت های محصوا {{$product->name}}</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th>#</th>
                        <th>نام کاربر</th>
                        <th>متن کامنت</th>
                        <th>حذف</th>
                      </tr>
                      </thead>
                      <tbody>
                          @foreach ($comments as $comment)
                            <tr>
                                <td>{{$comment->id}}</td>
                                <td>{{$comment->user->name}}
                                </td>
                                <td>
                                    {{$comment->content}}
                                </td>
                                <td>
                                    <form action="{{route('products.comments.destroy',$comment)}}" method="POST">
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
