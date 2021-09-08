@extends('admin.layout.master')
 @section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> ویرایش {{$property->title}} </h3>
                </div>
                <div class="card-body">
                    @include('admin.layout.errors')
                    <form action="{{route('properties.update',$property)}}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="property_group_id">گروه مشخصات</label>
                            <select name="property_group_id" id="property_group_id">
                                <option value="" disabled selected> گروه مشخصات را انتخاب کنید...</option>
                                @foreach ($groups as $group)
                                   <option value="{{$group->id}}"
                                    @if ($group->id == $property->property_group_id)
                                        selected
                                    @endif
                                    >{{$group->title}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="">عنوان</label>
                            <input type="text" value="{{$property->title}}" class="form-control" id="title" name="title">
                            <div class="form-group mt-4">
                                <input type="submit" class="btn btn-sm btn-primary" value="ویرایش">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

 @endsection
