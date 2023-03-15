@extends('admin.master')

@section('content')

    <form action="{{route('brand.store')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <label for="">Enter Brand Name:</label>
                <input name="brand_name" class="form-control" type="text" placeholder="enter brand name">

                <label for="">Select Status</label>
                <select class="form-control" name="status" id="">
                    <option value="active">Active</option>
                    <option value="inactive">InActive</option>
                </select>

                <button type="submit" class="btn btn-success">Submit</button>
            </div>
            <div class="col-md-3"></div>
        </div>

    </form>


@endsection
