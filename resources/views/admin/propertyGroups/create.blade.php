@extends('admin.layout.master')
 @section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">ایجاد گروه مشخصات</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('propertyGroups.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">عنوان</label>
                            <input type="text" value="" class="form-control" id="title" name="title">
                        </div>

                        <div class="form-group mt-4">
                            <input type="submit" class="btn btn-sm btn-primary" value="افزودن">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

 @endsection
