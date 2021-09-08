@extends('admin.layout.master')
 @section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">ویرایش محصول {{$product->name}}</h3>
                </div>
                <div class="card-body">
                    @include('admin.layout.errors')
                    <form action="{{route('products.update',$product)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label for="category_id">دسته بندی</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="" disabled selected>دسته بندی را وارد کنید...</option>
                                @foreach ($categories as $category)
                                    <option
                                    @if ($category->id == $product->category_id)
                                        selected

                                    @endif
                                    value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="brand_id">برند</label>
                            <select name="brand_id" id="brand_id" class="form-control">
                                <option value="" disabled selected>برند را وارد کنید...</option>
                                @foreach ($brands as $brand)
                                    <option
                                    @if ($brand->id == $product->brand_id)
                                        selected
                                    @endif
                                    value="{{$brand->id}}">{{$brand->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">نام</label>
                            <input type="text" value="{{$product->name}}" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="slug">اسلاگ</label>
                            <input type="text" class="form-control" id="slug" name="slug"
                            value="{{$product->slug}}">
                        </div>
                        <div class="form-group">
                            <label for="price">قیمت</label>
                            <input type="int" value="{{$product->price}}" class="form-control" id="price" name="price">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">

                                        <label for="image">تصویر</label>
                                        <input type="file" class="formcontrol" id="image" name="image">
                                </div>

                                <div class="col-sm-6">
                                    <img src="{{str_replace('public','/storage',$product->image)}}"
                                    alt="{{$product->image}}" width="400">
                                </div>


                        </div>
                        <div class="form-group">
                            <label for="desc">توضیحات</label>
                            <textarea id="desc" name="desc" class="mt-4">{{$product->desk}}</textarea>
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
