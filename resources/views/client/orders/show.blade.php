@extends('client.layout.master')
@section('content')
   <div class="container mt-5">
    @if ($order->status == 1)
    <p class="bg-success p-4">پرداخت با موفقیت انجام گرفت.</p>

@else
    <p class="bg-danger p-4">پرداخت ناموفق بود</p>
@endif
   </div>
@endsection
