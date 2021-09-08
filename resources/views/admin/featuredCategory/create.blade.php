@extends('admin.layout.master')
 @section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> ایجاد دسته بندی ویژه</h3>
                </div>
                <div class="card-body">

                    <form action="{{route('featuredCategory.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="category_id">دسته بندی ویژه</label>
                            <select name="category_id" id="category_id">
                                <option value=""
                                disabled selected>دسته بندی ویژه را انتخاب کنید...</option>
                                @foreach ($categories as $category)
                                   <option value="{{$category->id}}"
                                    @if ($category->id == $featuredCategory->category_id)
                                         selected
                                    @endif
                                    >{{$category->title}}</option>
                                @endforeach
                            </select>

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
