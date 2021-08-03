@extends('admin.layout.master')

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('products.pictures.store',$product)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="image">آپلود</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-sm btn-primary" value="آپلود">
                        </div>

                    </form>
                </div>
            </div>
        </div>
        @include('admin.layout.errors')
        @foreach ($product->pictures as $picture)
           <div class="col-md-12 col-lg-3">
                <div class="card">
                    <img src="{{str_replace('public','/storage',$picture->image)}}" alt="$product->image"
                    class="card-img-top img-responsive">
                    <div class="card-body">

                        <form action="{{route('products.pictures.destroy',
                        ['product' => $product,'picture'=>$picture])}}" method="POST">
                            @csrf
                            @method('delete')
                            <input type="submit" class="btn btn-sm btn-danger" value="حذف">
                        </form>
                    </div>


                </div>
            </div>
        @endforeach
    </div>
@endsection
