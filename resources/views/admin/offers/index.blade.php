@extends('admin.layout.master')


@section('content')

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">کد های تخفیف</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th>#</th>
                        <th>کد تخفیف</th>
                        <th>تاریخ شروع کد تخفیف</th>
                        <th>تاریخ اتمام کد تخفیف</th>
                        <th>ویرایش</th>
                        <th>حذف</th>
                      </tr>
                      </thead>
                      <tbody>
                          @foreach ($offers as $offer)
                            @php
                                $starts_at = Carbon\Carbon::parse($offer->starts_at);
                                $starts_at->diffForHumans();
                                $expirs_at = Carbon\Carbon::parse($offer->expirs_at);
                                $expirs_at->diffForHumans();


                            @endphp

                            <tr>
                                <td>{{$offer->id}}</td>
                                <td>{{$offer->code}}
                                </td>
                                <td>{{$starts_at->format('Y-m-d')}}</td>
                                <td>{{$expirs_at->format('Y-m-d')}}</td>
                                <td>
                                    <a href="{{route('offers.edit',$offer)}}" class="btn btn-primary
                                         btn-sm">ویرایش</a>

                                </td>
                                <td>
                                    <form action="{{route('offers.destroy',$offer)}}" method="POST">
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
                        <th>کد تخفیف</th>


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
