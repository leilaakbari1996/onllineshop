@extends('admin.layout.master')
 @section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">ایجاد نقش</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('roles.store')}}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="">عنوان</label>
                            <input type="text" value="" class="form-control" id="title" name="title">

                        </div>
                        <div class="form-group">
                            <label>انتخاب دسترسی ها</label>
                            <div class="row">
                                @foreach ($premissions as $premission)
                                    <label class="col-sm-3">
                                        <input type="checkbox" name="premissions[]"
                                        value="{{$premission->id}}"> {{$premission->lable}}
                                    </label>

                                @endforeach
                            </div>
                        </div>
                        <div class="form-group mt-4">
                            <input type="submit" class="btn btn-sm btn-primary" value="افزودن">
                        </div>
                    </form>
                    @include('admin.layout.errors')
                </div>
            </div>
        </div>
    </div>

 @endsection
