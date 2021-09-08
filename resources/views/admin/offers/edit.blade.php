@extends('admin.layout.master')
 @section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> ویرایش کد تخفیف {{$offer->code}}</h3>
                </div>
                <div class="card-body">
                    @php
                        $starts_at = Carbon\Carbon::parse($offer->starts_at);
                        $starts_at->diffForHumans();
                        $expirs_at = Carbon\Carbon::parse($offer->expirs_at);
                        $expirs_at->diffForHumans();


                    @endphp
                    @include('admin.layout.errors')
                    <form action="{{route('offers.update',$offer)}}" method="post">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label for="code">کد تخفیف</label>
                            <input type="text" class="form-control" id="code" name="code"
                            value="{{$offer->code}}">
                        </div>
                        <div class="form-group">
                            <label for="starts_at">تاریخ شروع</label>
                            <input type="date" name="starts_at" value="{{$starts_at->format('Y-m-d')}}">
                        </div>
                        <div class="form-group">
                            <label for="expires_at">تاریخ پایان</label>
                            <input type="date" name="expires_at" value="{{$expirs_at->format('Y-m-d')}}">
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
