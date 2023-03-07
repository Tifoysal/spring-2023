@extends('admin.master')

@section('content')

    <form>
       <div class="row">
           <div class="col-md-2"></div>
           <div class="col-md-6">
               <div>
               <label for="">Enter Category Name:</label>
               <input placeholder="Enter category name" type="text" class="form-control">
               </div>

               <div>
                   <label for="">Select Status</label>
                   <select name="" id="" class="form-control">
                       <option value="">Active</option>
                       <option value="">InActive</option>
                   </select>
               </div>

               <div>
                   <label for="">Upload Image</label>
                   <input type="file" class="form-control">
               </div>

               <div>
                   <label for="">Write description</label>
                   <textarea placeholder="Enter description" class="form-control"></textarea>
               </div>

                <div>
                    <button type="submit" class="btn btn-success">Create</button>
                </div>

           </div>
           <div class="col-md-4"></div>

       </div>
    </form>
@endsection

