@extends('layouts.app')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1 class="text-center">
                Create Product
            </h1>
        </div>
        <div class="panel-body">
            @include('include.error')
            <form method="post" action="{{route('store.product')}}" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group">
                    <label>Name:</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label>Image:</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <label>Price:</label>
                    <input type="number" name="price" class="form-control">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="description"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="form-control btn btn-success">Create</button>
                </div>
            </form>
        </div>
    </div>
@endsection