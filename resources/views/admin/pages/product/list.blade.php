@extends('admin.master')
@section('content')

    <form action="{{route('product.list')}}">


    <div class="row" style="padding-top: 40px;padding-bottom: 20px;">
        <div class="col-md-4">
            <label for="">From Date</label>
            <input type="date" name="from_date" class="form-control" value="{{request()->from_date}}">
        </div>
        <div class="col-md-4">
            <label for="">To Date</label>
            <input type="date" name="to_date" class="form-control" value="{{request()->to_date}}">
        </div>
        <div class="col-md-4">

            <button class="btn btn-success" type="submit">Search</button>
            <button class="btn btn-primary" onclick="printDiv('printArea')" type="button">Print</button>
        </div>
    </div>

    </form>



    <a href="{{route('product.create.form')}}" class="btn btn-success">Create new product</a>
    <div id="printArea">

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

    </div>



    <script>
        // function test(){
        //     alert("hello print")
        // }
        function printDiv(divID){
            var printContents = document.getElementById(divID).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;

        }
    </script>
@endsection
