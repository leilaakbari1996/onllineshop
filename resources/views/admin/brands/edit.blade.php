@extends('admin.layout.master')
 @section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">ویرایش برند {{$brand->name}}</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('brands.update',$brand)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label for="">نام</label>
                            <input type="text" class="form-control" id="name" name="name"
                            value="{{$brand->name}}">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="image">تصویر</label>
                                    <input type="file" class="formcontrol" id="image" name="image">
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{str_replace('public','/storage',$brand->image)}}"
                                    title="{{$brand->name}}" alt="{{$brand->name}}" width="100"/>
                                </div>
                            </div>

                        </div>
                        <div class="form-group mt-4">
                            <input type="submit" class="btn btn-sm btn-primary" value="ویرایش">
                        </div>
                    </form>
                </div>
                @if (count($errors->all()) > 0)
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-danger">{{$error}}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>

 @endsection
