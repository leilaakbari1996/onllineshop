@extends('admin.layout.master')
 @section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">ایجاد محصول</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="category_id">دسته بندی</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="" disabled selected>دسته بندی را وارد کنید...</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="brand_id">برند</label>
                            <select name="brand_id" id="brand_id" class="form-control">
                                <option value="" disabled selected>برند را وارد کنید...</option>
                                @foreach ($brands as $brand)
                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">نام</label>
                            <input type="text" value="" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="slug">اسلاگ</label>
                            <input type="text" class="form-control" id="slug" name="slug">
                        </div>
                        <div class="form-group">
                            <label for="price">قیمت</label>
                            <input type="int" value="" class="form-control" id="price" name="price">
                        </div>
                        <div class="form-group">
                            <label for="image">تصویر</label>
                            <input type="file" class="formcontrol" id="image" name="image">
                        </div>
                        <div class="form-group">
                            <label for="desc">توضیحات</label>
                            <textarea id="desc" name="desc"></textarea>
                        </div>
                        <div class="form-group mt-4">
                            <input type="submit" class="btn btn-sm btn-primary" value="افزودن">
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
