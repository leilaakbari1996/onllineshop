@extends('admin.layout.master')

@section('content')


<div class="row">
    <div class="col-7">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">ویژگی های محصول {{$product->name}}
                   <a href="{{route('products.properties.create',$product)}}" class="btn-primary btn btn-sm">ویرایش</a>
                </h3>
            </div>
             <!-- /.card-header -->
             <div class="card-body">
                <table id="example2" class="table table-bordered table-hover table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>نام</th>
                    <th>مقدار</th>
                  </tr>
                  </thead>
                  <tbody>
                      @foreach ($product->properties as $property)
                        <tr>
                            <td>{{$property->id}}</td>
                            <td>{{$property->title}}
                            </td>
                            <td>{{$property->pivot->value}}</td>


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
            @include('admin.layout.errors')
        </div>
    </div>
</div>
@endsection
