@extends('layouts/app');


@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-8">
      <div class="card-header bg-success">
      Catagory Product list
      </div>
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">sl_No</th>
            <th scope="col">Category</th>
            <th scope="col">Menu_status</th>
            <th scope="col">created_at</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($categories as $category)
          <tr>
          <td> {{ $loop->index +1}} </td>
            <td>{{ $category->category_name }}</td>
            <td>{{ $category->menu_status}}</td>
             <td>{{ $category->created_at}}</td>

            <td>
             <a href="{{ url('edit/Category')}}/{{ $category->id }}" class="btn btn-sm btn-success">Edit</a>
             <a href="{{ url('delete/Category')}}/{{ $category->id }}" class="btn btn-sm btn-danger">Delete</a>
           </td>
         </tr>


           @empty
           <tr class="text-center bg-danger">
             <td colspan="8"> NO DATA AVIABLE </td>
           </tr>

          @endforelse

        </tbody>
      </table>
    </div>



        <div class="col-md-4">

          <div class="card-header bg-success">
             Catagory Product Info
          </div>
        <form action="{{url('add/Category/insert')}}" method="post">
          @csrf
        <div class="form-group">
            <label> Category Name </label>
            <input type="text"  class="form-control" name="category_name" placeholder="catagory name" value="{{old('category_name')}}">
         </div>
         <div class="form-group">
             <input type="checkbox" name="menu_status" value="1" id="menu"> <label for="menu">Use as Menu </label>
          </div>
       <button type="submit" class="btn btn-primary">Add catagory</button>

      <hr>
      <h3>Here ,</h3>
       <h4> 1 means = Use as Menu </h4>
       <h4> 0 means = doesnot Use as Menu </h4>


   </form>
  </div>

</div>

<!-- <div class="row">
  <div class="col-md-8"></div>
  <div class="col-md-4">

    <div class="card-header bg-success">
    Edit   Catagory Product


    </div>
  <form action="{{url('add/Category/insert')}}" method="post">
    @csrf
  <div class="form-group">
      <label> Category Name </label>

      <input type="text"  class="form-control" name="category_name" placeholder="catagory name" value="">
   </div>
   <div class="form-group">
       <input type="checkbox" name="menu_status" value="1" id="menu"> <label for="menu">Use as Menu </label>
    </div>
 <button type="submit" class="btn btn-primary">Add catagory</button>

<hr>
<h3>Here ,</h3>
 <h4> 1 means = Use as Menu </h4>
 <h4> 0 means = doesnot Use as Menu </h4>


</form>
</div>
</div>

</div> -->





@endsection
