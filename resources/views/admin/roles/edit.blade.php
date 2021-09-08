@extends('admin.layout.master')
 @section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">ویرایش {{$role->title}}</h3>
                </div>
                 <div class="card-body">
                    @include('admin.layout.errors')
                    <form action="{{route('roles.update',$role)}}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="">عنوان</label>
                            <input type="text" class="form-control" id="title" name="title"
                             value="{{$role->title}}"><br>
                             <div class="form-group">
                                <label>ویرایش دسترسی ها</label>
                                <div class="row">
                                    @foreach ($premissions as $premission)
                                       <label class="col-sm-3">
                                       <input type="checkbox" value="{{$premission->id}}" name="premissions[]"
                                            @foreach ($role->role_premissions as $item)
                                                @if ($item->id == $premission->id)
                                                    checked
                                                @endif
                                            @endforeach

                                            > {{$premission->lable}}
                                        </label>

                                    @endforeach
                                </div>
                            </div>
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
