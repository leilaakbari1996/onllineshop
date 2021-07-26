@extends('admin.layout.master')
 @section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">ویرایش دسته بندی {{$category->title}}</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('categories.update',$category)}}" method="post">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label for="category_id">دسته والد</label>
                            <select name="category_id" id="category_id">
                                <option value="" disabled selected>دسته ی والد را انتخاب کنید...</option>
                                @foreach ($categories as $parent)
                                   <option
                                         @if ($parent->id == $category->category_id)
                                            selected
                                         @endif
                                   value="{{$parent->id}}">{{$parent->title}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="">عنوان</label>
                            <input type="text" value="{{$category->title}}" class="form-control" id="title" name="title">
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
