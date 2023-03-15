@extends('admin.master')
@section('content')
<h1>Category</h1>

<a href="{{url('/create/category')}}" class="btn btn-success">Add new</a>

<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Category Name</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>

    @foreach($bag as $peyara)

    <tr>
        <th scope="row">{{$peyara->id}}</th>
        <td>{{$peyara->name}}</td>
        <td>{{$peyara->status}}</td>
        <td>
            <a href="" class="btn btn-success">View</a>
            <a href="" class="btn btn-danger">Delete</a>
        </td>
    </tr>
    @endforeach

    </tbody>
</table>
@endsection
