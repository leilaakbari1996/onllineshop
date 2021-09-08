@extends('client.layout.master')
@section('content')
<div id="container">
    <div class="container">
      <!-- Breadcrumb Start-->
      <ul class="breadcrumb">
        <li><a href="index.html"><i class="fa fa-home"></i></a></li>
        <li><a href="cart.html">سبد خرید</a></li>
        <li><a href="checkout.html">تسویه حساب</a></li>
      </ul>
      <!-- Breadcrumb End-->
      <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-12">
          <h1 class="title">ثبت سفارش</h1>
          <form action="{{route('client.order.store')}}" method="post">
              @csrf
              <div class="row">
                <div class="col-sm-12">







                    <div class="col-sm-12">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h4 class="panel-title"><i class="fa fa-ticket"></i> استفاده از کوپن تخفیف</h4>
                        </div>
                          <div class="panel-body">
                            <label for="input-coupon" class="col-sm-3 control-label">کد تخفیف خود را وارد کنید</label>
                            <div class="input-group">
                              <input type="text" class="form-control" id="input-coupon"
                              placeholder="کد تخفیف خود را در اینجا وارد کنید" value="" name="offer_code">
                              <span class="input-group-btn">
                              <input type="button" class="btn btn-primary" data-loading-text="بارگذاری ..." id="button-coupon" value="اعمال کوپن">
                              </span></div>
                          </div>
                      </div>
                    </div>

                    <div class="col-sm-12">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h4 class="panel-title"><i class="fa fa-shopping-cart"></i> سبد خرید</h4>
                        </div>
                          <div class="panel-body">
                            <div class="table-responsive">
                              <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <td class="text-center">تصویر</td>
                                    <td class="text-left">نام محصول</td>
                                    <td class="text-left">تعداد</td>
                                    <td class="text-right">قیمت واحد</td>
                                    <td class="text-right">کل</td>
                                  </tr>
                                </thead>
                                <tbody id="cart-table-body">
                                    @php
                                        $itemsCart = \App\Models\Cart::itemCart();
                                    @endphp
                                    @foreach ($itemsCart as $item)
                                        <tr id="cart-row-{{$item['product']->id}}">
                                            <td class="text-center">
                                                <a href="{{route('client.products.show',$item['product'])}}">
                                                    <img class="img-thumbnail" width="50"
                                                    title="{{$item['product']->name}}"
                                                    alt="{{$item['product']->name}}"
                                                    src="{{str_replace('public','/storage',$item['product']->image)}}">
                                                </a>
                                            </td>
                                            <td class="text-left"><a href="{{route('client.products.show',$item['product'])}}">
                                                {{$item['product']->name}}
                                               </a>
                                            </td>
                                            <td class="text-right">x {{$item['quantity']}}</td>
                                            <td class="text-right">{{$item['product']->cost_with_discount}} تومان</td>
                                            <td class="text-left"><div class="input-group btn-block quantity">
                                                <input type="text" name="quantity" value="{{$item['quantity']}}"
                                                size="1" class="form-control" id="quantity"/>
                                                <span class="input-group-btn">
                                                <button type="button" data-toggle="tooltip" title="بروزرسانی"
                                                onclick="updateCart({{$item['product']->id}})"
                                                class="btn btn-primary"><i class="fa fa-refresh"></i></button>
                                                <button type="button" data-toggle="tooltip" title="حذف" class="btn btn-danger" onClick=""><i class="fa fa-times-circle"></i></button>
                                                </span></div></td>
                                        </tr>
                                    @endforeach


                                </tbody>
                                <tfoot>
                                  <tr>
                                    <td class="text-right" colspan="4"><strong>جمع کل:</strong></td>
                                    <td class="text-right" ><span id="total">{{\App\Models\Cart::totalAmountwithOutDiscount()}} تومان
                                    </span></td>
                                  </tr>

                                  <tr>
                                    <td class="text-right" colspan="4"><strong>کسر هدیه:</strong></td>
                                    <td class="text-right"><span id="total_amount_discount">
                                        {{\App\Models\Cart::totalDiscount() }} تومان
                                    </span>
                                    </td>
                                  </tr>

                                  <tr>
                                    <td class="text-right" colspan="4"><strong>کل :</strong></td>
                                    <td class="text-right"><span id="total_amount_cart">
                                        {{\App\Models\Cart::totalAmount() }}  تومان
                                    </span>

                                    </td>
                                  </tr>
                                </tfoot>
                              </table>
                            </div>
                          </div>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h4 class="panel-title"><i class="fa fa-pencil"></i> آدرس خود را وارد کنید.</h4>
                        </div>
                          <div class="panel-body">
                            <textarea rows="4" class="form-control" id="address" name="address"></textarea>
                            <br>
                            <div class="buttons">
                              <div class="pull-right">
                                <input type="submit" class="btn btn-primary" id="button-confirm" value="تایید سفارش">
                              </div>
                            </div>
                          </div>
                      </div>
                    </div>

              </div>
          </form>

        </div>
        <!--Middle Part End -->
      </div>
    </div>
  </div>
@endsection
