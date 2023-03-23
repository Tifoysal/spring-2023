@extends('admin.master')
@section('content')

    <a href="{{route('product.create.form')}}" class="btn btn-success">Create new product</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
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
            <td>{{$product->category_id}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->quantity}}</td>
            <td>
                <a href="" class="btn btn-info">View</a>
            </td>
        </tr>
@endforeach
        </tbody>
    </table>
@endsection
