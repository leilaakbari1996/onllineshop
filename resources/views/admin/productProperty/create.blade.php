@extends('admin.layout.master')

@section('content')


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">ویژگی های محصول {{$product->name}}</h3>
            </div>
            @php
                $propertyGroups = $product->category->propertyGroups;
            @endphp
            <div class="card-body">
                @include('admin.layout.errors')
                <form action="{{route('products.properties.store',$product)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @foreach ($propertyGroups as $group)
                       <h3>{{$group->title}}</h3>
                       @foreach ($group->properties as $property)
                            <div class="form-group col-sm-6">
                                <div class="row">
                                    <div class="col-sm-2"><label for="">{{$property->title}}</label></div>
                                    <div class="col-sm-10"> <input type="text" class="form-control"
                                        value="{{$property->getValueForProperty($product)}}"
                                        id="name" name="properties[{{$property->id}}][value]"></div>
                                </div>
                            </div>
                       @endforeach
                    @endforeach
                    <div class="form-group mt-4">
                        <input type="submit" class="btn btn-sm btn-primary" value="افزودن">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
