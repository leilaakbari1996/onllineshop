@extends('admin.layout.master')
 @section('content')

    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">ایجاد تخفیف</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('products.discount.store',$product)}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="discount">مقدار </label>
                            <input type="number" max="100" min="1" value="" class="form-control" id="discount" name="discount">
                        </div>

                        <div class="form-group mt-4">
                            <input type="submit" class="btn btn-sm btn-primary" value="افزودن">
                        </div>
                    </form>
                </div>
               @include('admin.layout.errors')
            </div>
        </div>
    </div>

 @endsection
