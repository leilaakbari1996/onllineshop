@extends('admin.layout.master')
 @section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">ایجاد برند</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('brands.store')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="">نام</label>
                            <input type="text" value="" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="image">تصویر</label>
                            <input type="file" class="formcontrol" id="image" name="image">
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
