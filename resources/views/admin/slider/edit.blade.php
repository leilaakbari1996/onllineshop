@extends('admin.layout.master')
 @section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">ویرایش اسلاید {{$slider->id}}</h3>
                </div>
                <div class="card-body">
                    @include('admin.layout.errors')
                    <form action="{{route('sliders.update',$slider)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label for="">لینک</label>
                            <input type="text" class="form-control" id="link" name="link"
                            value="{{$slider->link}}">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="image">تصویر</label>
                                    <input type="file" class="formcontrol" id="image" name="image">
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{str_replace('public','/storage',$slider->image)}}"
                                    title="{{$slider->name}}" alt="{{$slider->name}}" width="100"/>
                                </div>
                            </div>

                        </div>
                        <div class="form-group mt-4">
                            <input type="submit" class="btn btn-sm btn-primary" value="ویرایش">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

 @endsection
