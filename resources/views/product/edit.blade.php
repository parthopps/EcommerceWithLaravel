@extends('layouts/app');


@section('content')

            <div class="container">
              <div class="row">
                <div class="col-md-6 offset-3">
                  <div class="card">
                    <nav aria-label="breadcrumb">
                          <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{url('/add/product/view')}}">Add Product</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$single_product_info->product_name}}</li>
                          </ol>
                        </nav>
                    <div class="card-header bg-success">
                      Edit Product Form

                    </div>
                    <div class="card-body">

                      @if(session('status'))

                      <div class="alert alert-success" role="alert">
                          {{ session('status') }}
                      </div>
                       @endif


                      <form action="{{url('edit/product/insert')}}" method="post" enctype="multipart/form-data">
                        @csrf <!-- New version -->
                        <!-- {{csrf_field()}} old version -->
                      
                        <div class="form-group">
                        <label> Product Name </label>
                        <input type="hidden" name="product_id"  value="{{$single_product_info->id}}">

                        <input type="text" name="product_name" class="form-control" placeholder="Enter your Product Name" value="{{$single_product_info->product_name}}">
                      </div>
                      <div class="form-group">
                      <label>Product Description</label>
                      <textarea name="product_description" class="form-control" rows="3">{{$single_product_info->product_description}}</textarea>
                    </div>
                    <div class="form-group">
                    <label>Product Price </label>
                    <input type="text" name="product_price" class="form-control" placeholder="Enter your Product Price" value="{{$single_product_info->product_price}}">
                  </div>
                  <div class="form-group">
                  <label>Product Quentity </label>
                  <input type="text" name="product_quentity" class="form-control" placeholder="Enter your Product Quentity" value="{{$single_product_info->product_quentity}}">
                </div>
                <div class="form-group">
                <label> Quentity Alert </label>
                <input type="text" name="quentity_alert" class="form-control" placeholder="Enter your Product Quentity Alert" value="{{$single_product_info->quentity_alert}}" >
              </div>
              <div class="form-group">
              <label> Product Image </label>
              <input type="file" name="product_image" class="form-control">
                  <img  src= "{{ asset('uploads/product_photos') }}/{{ $single_product_info->product_image }}" alt="not found" width="100" >
            </div>



                      <button type="submit" class="btn btn-primary">Edited Product</button>



                      </form>
                    </div>
                  </div>
                </div>


              </div>
            </div>




@endsection
