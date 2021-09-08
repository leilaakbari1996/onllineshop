@extends('client.layout.master')

@section('content')



  <div id="container">
    <div class="container">
      <!-- Breadcrumb Start-->
      <ul class="breadcrumb">
        <li><a href="index.html"><i class="fa fa-home"></i></a></li>
        <li><a href="#">حساب کاربری</a></li>
        <li><a href="wishlist.html">لیست علاقه مندی من</a></li>
      </ul>
      <!-- Breadcrumb End-->
      <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-12">
          <h1 class="title">لیست علاقه مندی های من</h1>
          <div class="table-responsive">
             @if ($likes->count() == 0)
                 <h2>شما هیچ محصولی را لایک نکرده اید.</h2>
             @else
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <td class="text-center">تصویر</td>
                        <td class="text-left">نام محصول</td>
                        <td class="text-left">مدل</td>
                        <td class="text-left">دسته بندی</td>
                        <td class="text-right">موجودی</td>
                        <td class="text-right">قیمت واحد</td>
                        <td class="text-right">عملیات</td>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($likes as $like)
                        <tr>
                            <td class="text-center"><a href="{{route('client.products.show',$like)}}">
                                <img src="{{str_replace('public','/storage',$like->image)}}"
                                alt="{{$like->name}}" title="{{$like->name}}" width="50px"/></a>
                            </td>
                            <td class="text-left"><a href="{{route('client.products.show',$like)}}">{{$like->name}}</a></td>
                            <td class="text-left">{{$like->brand->name}}</td>
                            <td class="text-left">{{$like->category->title}}</td>
                            <td class="text-right">موجود</td>
                            <td class="text-right"><div class="price"> {{$like->price}} تومان </div></td>
                            <td class="text-right"><button class="btn btn-primary" title="" data-toggle="tooltip"
                                onClick="cart.add('48');" type="button" data-original-title="افزودن به سبد">
                                <i class="fa fa-shopping-cart"></i></button>
                                <form method="POST" action="{{route('client.likes.destroy',$like)}}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger" title="" data-toggle="tooltip"
                                    data-original-title="حذف"><i class="fa fa-times"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
            @endif
        </div>
    </div>
        <!--Middle Part End -->
      </div>
    </div>
  </div>



@endsection
