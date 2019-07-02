@extends('layouts.frontendapp');

@section('frontend_content')
<header class="header-section header-normal">
		<div class="container-fluid">
			<!-- logo -->
			<div class="site-logo">
				<a href="{{url('/')}}">		<img src="{{ asset('frontend_assets/img/logo.png') }}" alt="logo"></a>
			</div>
			<!-- responsive -->
			<div class="nav-switch">
				<i class="fa fa-bars"></i>
			</div>
			<div class="header-right">
				<a href="cart.html" class="card-bag"><img src="img/icons/bag.png" alt=""><span>2</span></a>
				<a href="#" class="search"><img src="img/icons/search.png" alt=""></a>
			</div>
			<!-- site menu -->
			<ul class="main-menu">
				@php
				$menus = App\Category::where('menu_status',1)->get();
				@endphp
				<li><a href="{{url('/')}}">Home</a></li>

				@foreach($menus as $menu)
				<li><a href="{{url('category/wise/product')}}/{{$menu->id}}">{{$menu->category_name}}</a></li>
				@endforeach

				<li><a href="contact.html">Contact</a></li>
			</ul>
		</div>
	</header>
<div class="page-info-section page-info-big">
		<div class="container">
			<h2>Dresses</h2>
			<div class="site-breadcrumb">
				<a href="">Home</a> /
				<span>Dresses</span>
			</div>
			<img src="{{ asset('frontend_assets/img/categorie-page-top.png') }}" alt="" class="cata-top-pic">
		</div>
	</div>
	<!-- Page Info end ---------------------------->


	<!-- Page -->
	<div class="page-area categorie-page spad">
		<div class="container">
			<div class="categorie-filter-warp">
				<p>Showing 12 results</p>
				<div class="cf-right">
					<div class="cf-layouts">
						<a href="#"><img src="{{ asset('frontend_assets/img/icons/layout-1.png') }}" alt=""></a>
						<a class="active" href="#"><img src="{{ asset('frontend_assets/img/icons/layout-2.png') }}" alt=""></a>
					</div>
					<!-- <form action="#">
						<select>
							<option>Color</option>
						</select>
						<select>
							<option>Brand</option>
						</select>
						<select>
							<option>Sort by</option>
						</select>
					</form> -->
				</div>
			</div>
			<div class="row">
				@forelse($display_products as $product1)

				<div class="col-lg-3">
					<div class="product-item">
						<figure>

							<img src="{{ asset('uploads/product_photos') }}/{{ $product1->product_image }}" alt="#">

							<div class="pi-meta">
								<div class="pi-m-left">
									<img src="{{ asset('frontend_assets/img/icons/eye.png') }}" alt="">
									<p>quick view</p>
								</div>
								<div class="pi-m-right">
									<img src="{{ asset('frontend_assets/img/icons/heart.png') }}" alt="">
									<p>save</p>
								</div>
							</div>

						</figure>
						<div class="product-info">
							<h6>{{ $product1->product_name }}</h6>
               <p>{{$product1->product_price}}</p>
							<a href="{{ url('product/details')}}/{{$product1->id}}"  class="site-btn btn-line">ADD TO CART</a>


						</div>
					</div>
				</div>
				@empty
				NO PRODUCT AVIABLE
				@endforelse

			</div>
			<div class="site-pagination">
				<span class="active">01.</span>
				<a href="">02.</a>
				<a href="">03.</a>
				<a href="">04.</a>
				<a href="">05.</a>
				<a href="">06</a>
			</div>
		</div>
	</div>
	<!-- Page -->


@endsection
