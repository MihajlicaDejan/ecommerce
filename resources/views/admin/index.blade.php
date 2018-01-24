@extends('layouts.app')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1 class="text-center">
                Product
            </h1>
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                @if($products->count() !== 0)
                    @foreach($products as $product)
                        <tr>
                            <td><img src="{{asset($product->image)}}" width="150px" height="200px" alt="{{$product->name}}"></td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->price}}</td>
                            <td><a href="{{route('edit.product', $product->id)}}" class="btn btn-success">Edit</a></td>
                            <td><a href="{{route('delete.product', $product->id)}}" class="btn btn-danger">Delete</a></td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td>
                            <h1 class="text-center">No product to show</h1>
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection