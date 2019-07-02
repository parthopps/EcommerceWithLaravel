@extends('layouts.app')




@section('content')


<div class="row">

  <div class="col-md-6 offset-3">
    <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{url('/add/Category/view')}}">Add Category</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$categories_info->category_name}}</li>
          </ol>
        </nav>
    <div class="card-header bg-success">
    Edit   Catagory Product


    </div>
  <form action="{{url('edit/Category/insert')}}" method="post">
    @csrf
  <div class="form-group">
      <label> Category Name </label>
      <input type="hidden"  class="form-control" name="category_id" value="{{$categories_info->id}}">

      <input type="text"  class="form-control" name="category_name" placeholder="catagory name" value="{{$categories_info->category_name}}">
   </div>
   <div class="form-group">
     <label> Menu_status </label>
     <input type="text"  class="form-control" name="menu_status" placeholder="catagory name"value="{{$categories_info->menu_status}}">

       <!-- <input type="text" name="menu_status" value="{{$categories_info->menu_status}}" id="menu"> <label for="menu">Use as Menu </label> -->
    </div>
 <button type="submit" class="btn btn-primary">Add catagory</button>

<hr>
<h3>Here ,</h3>
 <h4> 1 means = Use as Menu </h4>
 <h4> 0 means = doesnot Use as Menu </h4>


</form>
</div>
</div>

</div>





@endsection
