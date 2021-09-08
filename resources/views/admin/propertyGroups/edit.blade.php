@extends('admin.layout.master')
 @section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> ویرایش {{$propertyGroup->title}}</h3>
                </div>
                <div class="card-body">
                    @include('admin.layout.errors')
                    <form action="{{route('propertyGroups.update',$propertyGroup)}}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="">عنوان</label>
                            <input type="text" value="{{$propertyGroup->title}}" class="form-control" id="title" name="title">
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
