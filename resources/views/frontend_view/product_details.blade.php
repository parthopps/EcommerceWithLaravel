@extends('layouts.frontendapp')

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
				<li><a href="{{url('/')}}">Home</a></li>
				<li><a href="#">Woman</a></li>
				<li><a href="#">Man</a></li>
				<li><a href="#">LookBook</a></li>
				<li><a href="#">Blog</a></li>
				<li><a href="contact.html">Contact</a></li>
			</ul>
		</div>
	</header>

	<!-- Page Info -->
	<div class="page-info-section page-info">
		<div class="container">
			<div class="site-breadcrumb">
				<a href="{{url('/')}}">Home</a> /
				<!-- <a href="">Sales</a> /
				<a href="">Bags</a> / -->
				<span>{{$all_products->product_name}}</span>
			</div>
			<img src="{{ asset('frontend_assets/img/page-info-art.png') }}" alt="" class="page-info-art">
		</div>
	</div>
	<!-- Page Info end -->


	<!-- Page -->
	<div class="page-area product-page spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<figure>
						<img class="product-big-img" src="{{ asset('uploads/product_photos') }}/{{ $all_products->product_image }}" alt="">
					</figure>
					<div class="product-thumbs">
						<!-- <div class="product-thumbs-track">
							<div class="pt" data-imgbigurl="{{ asset('frontend_assets/img/product/1.jpg') }}"><img src="{{ asset('frontend_assets/img/product/thumb-1.jpg') }}" alt=""></div>
							<div class="pt" data-imgbigurl="{{ asset('frontend_assets/img/product/2.jpg') }}"><img src="{{ asset('frontend_assets/img/product/thumb-2.jpg') }}" alt=""></div>
							<div class="pt" data-imgbigurl="{{ asset('frontend_assets/img/product/3.jpg') }}"><img src="{{ asset('frontend_assets/img/product/thumb-3.jpg') }}" alt=""></div>
							<div class="pt" data-imgbigurl="{{ asset('frontend_assets/img/product/4.jpg') }}"><img src="{{ asset('frontend_assets/img/product/thumb-4.jpg') }}" alt=""></div>
						</div> -->
					</div>
				</div>
				<div class="col-lg-6">

					<div class="product-content">
						<h2>{{$all_products->product_name}}</h2>
						<h6> Category Name : {{ App\Category::find($all_products->category_id)->category_name}} </h6>
						<br>
						<div class="pc-meta">
							<h4 class="price">${{$all_products->product_price}}</h4>
						</div>
              <p>{{$all_products->product_description}}</p>

						</div>
						<a href="#" class="site-btn btn-line">ADD TO CART</a>

					</div>
				</div>
			</div>
			<div class="product-details">
				<div class="row">
					<div class="col-lg-10 offset-lg-1">
						<ul class="nav" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="1-tab" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Description</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="2-tab" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Additional information</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="3-tab" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">Reviews (0)</a>
							</li>
						</ul>
						<div class="tab-content">
							<!-- single tab content -->
							<div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab-1">
               <p>{{$all_products->product_description}}</p>
						</div>
							<div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab-2">
								  <p>{{$all_products->product_description}}</p>
							</div>
							<div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="tab-3">

							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="text-center rp-title">
				<h5>Related products</h5>
			</div>
			<div class="row">
        	@foreach($related_products as $product1)
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
        @endforeach
			</div>
		</div>
	</div>
	<!-- Page end -->


	<!-- Footer top section -->
	<section class="footer-top-section home-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-8 col-sm-12">
					<div class="footer-widget about-widget">
						<img src="img/logo.png" class="footer-logo" alt="">
						<p>Donec vitae purus nunc. Morbi faucibus erat sit amet congue mattis. Nullam fringilla faucibus urna, id dapibus erat iaculis ut. Integer ac sem.</p>
						<div class="cards">
							<img src="img/cards/5.png" alt="">
							<img src="img/cards/4.png" alt="">
							<img src="img/cards/3.png" alt="">
							<img src="img/cards/2.png" alt="">
							<img src="img/cards/1.png" alt="">
						</div>
					</div>
				</div>
				<div class="col-lg-2 col-md-4 col-sm-6">
					<div class="footer-widget">
						<h6 class="fw-title">usefull Links</h6>
						<ul>
							<li><a href="#">Partners</a></li>
							<li><a href="#">Bloggers</a></li>
							<li><a href="#">Support</a></li>
							<li><a href="#">Terms of Use</a></li>
							<li><a href="#">Press</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-4 col-sm-6">
					<div class="footer-widget">
						<h6 class="fw-title">Sitemap</h6>
						<ul>
							<li><a href="#">Partners</a></li>
							<li><a href="#">Bloggers</a></li>
							<li><a href="#">Support</a></li>
							<li><a href="#">Terms of Use</a></li>
							<li><a href="#">Press</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-4 col-sm-6">
					<div class="footer-widget">
						<h6 class="fw-title">Shipping & returns</h6>
						<ul>
							<li><a href="#">About Us</a></li>
							<li><a href="#">Track Orders</a></li>
							<li><a href="#">Returns</a></li>
							<li><a href="#">Jobs</a></li>
							<li><a href="#">Shipping</a></li>
							<li><a href="#">Blog</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-4 col-sm-6">
					<div class="footer-widget">
						<h6 class="fw-title">Contact</h6>
						<div class="text-box">
							<p>Your Company Ltd </p>
							<p>1481 Creekside Lane  Avila Beach, CA 93424, </p>
							<p>+53 345 7953 32453</p>
							<p>office@youremail.com</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	@endsection
