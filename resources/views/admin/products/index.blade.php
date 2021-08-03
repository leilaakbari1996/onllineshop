@extends('admin.layout.master')


@section('content')

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">محصولات</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th>#</th>
                        <th>نام</th>
                        <th>فیمت</th>
                        <th>برند</th>
                        <th>دسته بندی</th>
                        <th>تاریخ ایجاد</th>
                        <th>تصویر</th>
                        <th>گالری</th>
                        <th>تخفیف</th>
                        <th>ویرایش</th>
                        <th>حذف</th>
                      </tr>
                      </thead>
                      <tbody>
                          @foreach ($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->name}}
                                </td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->brand->name}}</td>
                                <td>{{$product->category->title}}</td>
                                <td>{{$product->id}}</td>
                                <td>
                                    <img src="{{str_replace('public','/storage',$product->image)}}"
                                     alt="{{$product->image}}" width="50">
                                </td>
                                <td>
                                    <a href="{{route('products.pictures.index',$product)}}"
                                     class="btn btn-sm btn-warning">گالری</a>
                                </td>
                                <td>
                                    @if (!$product->has_discount)
                                        <a href="{{route('products.discount.create',$product)}}"
                                        class="btn btn-sm btn-success">ایجاد تخفیف</a>


                                    @else
                                        <p>{{$product->discount_value}}</p>
                                        <form action="{{route('products.discount.destroy',[
                                            'product' => $product,
                                            'discount' => $product->discount
                                             ])}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="حذف" class="btn btn-sm btn-danger">
                                        </form>

                                    @endif

                                </td>
                                <td>
                                    <a href="{{route('products.edit',$product)}}" class="btn btn-primary
                                         btn-sm">ویرایش</a>

                                </td>
                                <td>
                                    <form action="{{route('products.destroy',$product)}}" method="POST">
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
                        <th>فیمت</th>
                        <th>برند</th>
                        <th>دسته بندی</th>
                        <th>تاریخ ایجاد</th>

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
