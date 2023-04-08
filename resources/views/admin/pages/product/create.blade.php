@extends('admin.master')

@section('content')

    <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">

            <div class="col-md-2"></div>
            <div class="col-md-6">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <p class="alert alert-danger">{{$error}}</p>
                    @endforeach
                @endif
                <div>
                    <label for="">Enter Product Name:</label>
                    <input required name="product_name" placeholder="Enter Product name" type="text" class="form-control">
                </div>
                <div>
                    <label for="">Enter Product Price:</label>
                    <input required min="100" name="product_price" placeholder="Enter Product Price" type="number" class="form-control">
                </div>

                <div>
                    <label for="">Enter Product Quantity:</label>
                    <input required name="product_qty" placeholder="Enter Product quantity" type="number" class="form-control">
                </div>

                <div>
                    <label for="">Select Status</label>
                    <select required name="status" id="" class="form-control">
                        <option value="active">Active</option>
                        <option value="inactive">InActive</option>
                    </select>
                </div>

                <div>
                    <label for="">Upload Image</label>
                    <input name="product_image" type="file" class="form-control">
                </div>

                <div>
                    <label for="">Write description</label>
                    <textarea name="description" placeholder="Enter description" class="form-control"></textarea>
                </div>

                <div>
                    <select name="category_id" id="" class="form-control">
                        @foreach($categories as $data)
                        <option value="{{$data->id}}">{{$data->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <button type="submit" class="btn btn-success">Create</button>
                </div>

            </div>
            <div class="col-md-4"></div>

        </div>
    </form>
@endsection

