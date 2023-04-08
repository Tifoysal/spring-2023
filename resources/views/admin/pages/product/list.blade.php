@extends('admin.master')
@section('content')

    <a href="{{route('product.create.form')}}" class="btn btn-success">Create new product</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">image</th>
            <th scope="col">Category</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
@foreach($products as $product)
        <tr>
            <th scope="row">{{$product->id}}</th>
            <td>{{$product->name}}</td>
            <td>
                <img src="{{url('/uploads/'.$product->image)}}" alt="image">
            </td>
            <td>{{$product->category->name}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->quantity}}</td>
            <td>
                <a href="{{route('product.view',$product->id)}}" class="btn btn-info">View</a>
                <a href="{{route('product.delete',$product->id)}}" class="btn btn-danger">Delete</a>
            </td>
        </tr>
@endforeach
        </tbody>
    </table>
@endsection
