@extends('admin.layout.master')
 @section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">ایجاد کد تخفیف</h3>
                </div>
                <div class="card-body">
                    @include('admin.layout.errors')
                    <form action="{{route('offers.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="code">کد تخفیف</label>
                            <input type="text" class="form-control" id="code" name="code">
                        </div>
                        <div class="form-group">
                            <label for="starts_at">تاریخ شروع</label>
                            <input type="date" name="starts_at">
                        </div>
                        <div class="form-group">
                            <label for="expires_at">تاریخ پایان</label>
                            <input type="date" name="expires_at">
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
