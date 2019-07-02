@extends('layouts/app');


@section('content')
  <div class="container">
    <div class="row">
      <div class="col-10">
        <div class="card">

          <div class="card-header bg-success">
             Product Info
          </div>
          <div class="card-body">

            @if(session('deletestatus'))

            <div class="alert alert-danger" role="alert">
                {{ session('deletestatus') }}
            </div>
             @endif

            <table class="table table-striped table-dark">
              <thead>
                <tr>

                  <th>ca_id</th>
                  <th>product_name</th>
                  <th>product_description</th>
                  <th>product_price</th>
                  <th>product_quentity</th>
                  <th>quentity_alert</th>
                  <th>photos</th>
                  <th>Action</th>

                </tr>
              </thead>
              <tbody>
                @forelse($all_products as $product)

                <tr>

                  <td>{{ App\Category::find($product->category_id)->category_name}}</td>
                  <td>{{$product->product_name}}</td>
                  <td>{{ str_limit($product->product_description,20)}}</td>
                  <td>{{$product->product_price}}</td>
                  <td>{{$product->product_quentity}}</td>
                  <td>{{$product->quentity_alert}}</td>
                  <td>
                  <img  src= "{{ asset('uploads/product_photos') }}/{{ $product->product_image }}" alt="not found" width="50" ></td>
                  <td>
                    <a href="{{ url('edit/product') }}/{{ $product->id }}" class="btn btn-sm btn-success">Edit</a>
                    <a href="{{ url('delete/product') }}/{{ $product->id }}" class="btn btn-sm btn-danger">Delete</a>
                  </td>
                </tr>
                @empty
                <tr class="text-center bg-danger">
                  <td colspan="8"> NO DATA AVIABLE </td>
                </tr>
              @endforelse
                </tbody>
              </table>
              {{$all_products->links()}}
          </div>
      </div>
    </div>

      <div class="col-2">
        <div class="card">
          <div class="card-header bg-success">
            ADD Product Form
          </div>
          <div class="card-body">

            @if(session('status'))

            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
             @endif


                @if($errors->all())
                <div class="alert alert-danger">
                  @foreach($errors->all() as $error)
                  <li>{{($error)}}</li>
                  @endforeach

                </div>
                @endif





            <form action="{{url('add/product/insert')}}" method="post" enctype="multipart/form-data">
              @csrf
              <!-- New version -->
              <!-- {{csrf_field()}} old version -->
              <div class="form-group">
              <label> Category Name </label>
              <select class="form-control" name="category_id" >
                <option value="">--select one--</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}"> {{ $category->id }} </option>
                @endforeach
              </select>
            </div>

              <div class="form-group">
              <label> Product Name </label>
              <input type="text" name="product_name" class="form-control" placeholder="Enter your Product Name" value={{ old('product_name')}}>
            </div>
            <div class="form-group">
            <label>Product Description</label>
            <textarea name="product_description" class="form-control" rows="3">{{ old('product_description')}}</textarea>
          </div>
          <div class="form-group">
          <label>Product Price </label>
          <input type="text" name="product_price" class="form-control" placeholder="Enter your Product Price" value={{ old('product_price')}}>
        </div>
        <div class="form-group">
        <label>Product Quentity </label>
        <input type="text" name="product_quentity" class="form-control" placeholder="Enter your Product Quentity" value={{ old('product_quentity')}}>
      </div>
      <div class="form-group">
      <label> Quentity Alert </label>
      <input type="text" name="quentity_alert" class="form-control" placeholder="Enter your Product Quentity Alert" value={{ old('quentity_alert')}} >
    </div>
    <div class="form-group">
    <label> Product Image </label>
    <input type="file"  class="form-control" name="product_image">
  </div>

            <button type="submit" class="btn btn-primary">Add Product</button>



            </form>
          </div>
        </div>
      </div>


    </div>
  </div>





<div class="container">
  <div class="row">
    <div class="col-10">
      <div class="card">

        <div class="card-header bg-success">
        Restore (Deleted) Product Info
        </div>
        <div class="card-body">

          @if(session('deletestatus'))

          <div class="alert alert-danger" role="alert">
              {{ session('deletestatus') }}
          </div>
           @endif

          <table class="table table-striped table-dark">
            <thead>
              <tr>
                <td>SL.</td>
                <th>product_name</th>
                <th>product_description</th>
                <th>product_price</th>
                <th>product_quentity</th>
                <th>quentity_alert</th>
                <!-- <th>photos</th> -->
                <th>Action</th>

              </tr>
            </thead>
            <tbody>
              @forelse($Deleted_products as $Deleted_product)

              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$Deleted_product->product_name}}</td>
                <td>{{ str_limit($Deleted_product->product_description,20)}}</td>
                <td>{{$Deleted_product->product_price}}</td>
                <td>{{$Deleted_product->product_quentity}}</td>
                <td>{{$Deleted_product->quentity_alert}}</td>

                <td>
                  <a href="{{ url('restore/product') }}/{{ $Deleted_product->id }}" class="btn btn-sm btn-success">Retore</a>
                   <a href="{{ url('forcedelete/product') }}/{{  $Deleted_product->id }}" class="btn btn-sm btn-danger">Force Delete</a>
                </td>
              </tr>
              @empty
              <tr class="text-center bg-danger">
                <td colspan="7"> NO DATA AVIABLE </td>
              </tr>
            @endforelse
              </tbody>
            </table>
            {{$all_products->links()}}
        </div>
    </div>
  </div>
</div>
</div>



@endsection
