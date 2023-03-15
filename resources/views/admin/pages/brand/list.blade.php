@extends('admin.master')

@section('content')


    <a href="{{route('brand.create')}}"  class="btn btn-success">Create new brand</a>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Brand Name</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($brands as $data)
        <tr>
            <th scope="row">{{$data->id}}</th>
            <td>{{$data->name}}</td>
            <td>{{$data->status}}</td>
            <td>

            </td>
        </tr>
        @endforeach

        </tbody>
    </table>



@endsection
