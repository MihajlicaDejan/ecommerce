@extends('layouts.app')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1 class="text-center">
                Edit Product
            </h1>
        </div>
        <div class="panel-body">
            @include('include.error')
            <div class="col-lg-5">
                <img src="{{asset($product->image)}}" width="150px" height="200px">
            </div>
            <div class="col-lg-7">
                <form method="post" action="{{route('update.product', $product->id)}}" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" name="name" class="form-control" value="{{$product->name}}">
                    </div>
                    <div class="form-group">
                        <label>Image:</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Price:</label>
                        <input type="number" name="price" class="form-control" value="{{$product->price}}">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description">{{$product->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="form-control btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection