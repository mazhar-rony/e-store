@extends('layouts.frontend.app')

@push('css')
    
@endpush

@section('content')

<!-- Hero section -->
<section class="hero-section">
	<div class="hero-slider owl-carousel">
		<div class="hs-item set-bg" data-setbg="{{ asset('frontend/assets/img/background/bg-3.jpg') }}">
			<div class="container">
				<div class="row">
					<div class="col-xl-6 col-lg-7 text-white">
						<span>New Arrivals</span>
						<h2>leather jackets</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum sus-pendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
						<a href="#" class="site-btn sb-line">DISCOVER</a>
						<a href="#" class="site-btn sb-white">ADD TO CART</a>
					</div>
				</div>
				<div class="offer-card text-white">
					<span>from</span>
					<h2>$29</h2>
					<p>SHOP NOW</p>
				</div>
			</div>
		</div>
		<div class="hs-item set-bg" data-setbg="{{ asset('frontend/assets/img/background/bg-4.jpg') }}">
			<div class="container">
				<div class="row">
					<div class="col-xl-6 col-lg-7 text-white">
						<span>New Arrivals</span>
						<h2>leather jackets</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum sus-pendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
						<a href="#" class="site-btn sb-line">DISCOVER</a>
						<a href="#" class="site-btn sb-white">ADD TO CART</a>
					</div>
				</div>
				<div class="offer-card text-white">
					<span>from</span>
					<h2>$29</h2>
					<p>SHOP NOW</p>
				</div>
			</div>
		</div>
        <div class="hs-item set-bg" data-setbg="{{ asset('frontend/assets/img/background/bg-5.jpg') }}">
			<div class="container">
				<div class="row">
					<div class="col-xl-6 col-lg-7 text-white">
						<span>New Arrivals</span>
						<h2>denim jackets</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum sus-pendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
						<a href="#" class="site-btn sb-line">DISCOVER</a>
						<a href="#" class="site-btn sb-white">ADD TO CART</a>
					</div>
				</div>
				<div class="offer-card text-white">
					<span>from</span>
					<h2>$29</h2>
					<p>SHOP NOW</p>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="slide-num-holder" id="snh-1"></div>
	</div>
</section>
<!-- Hero section end -->



<!-- Features section -->
<section class="features-section">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4 p-0 feature">
				<div class="feature-inner">
					<div class="feature-icon">
						<img src="{{ asset('frontend/assets/img/icons/1.png') }}" alt="#">
					</div>
					<h2>Fast Secure Payments</h2>
				</div>
			</div>
			<div class="col-md-4 p-0 feature">
				<div class="feature-inner">
					<div class="feature-icon">
						<img src="{{ asset('frontend/assets/img/icons/2.png') }}" alt="#">
					</div>
					<h2>Premium Products</h2>
				</div>
			</div>
			<div class="col-md-4 p-0 feature">
				<div class="feature-inner">
					<div class="feature-icon">
						<img src="{{ asset('frontend/assets/img/icons/3.png') }}" alt="#">
					</div>
					<h2>Free & fast Delivery</h2>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Features section end -->


<!-- letest product section -->
<section class="top-letest-product-section">
    <div class="container">
        <div class="section-title">
            <h2>LATEST PRODUCTS</h2>
        </div>
        <div class="product-slider owl-carousel">
            @foreach ($latestProducts as $latestProduct)
                <div class="product-item">
                    <div class="pi-pic">
                        <div class="tag-new">New</div>
                        <img src="{{ asset('uploads/product/'.$latestProduct->image) }}" alt="">
                        <div class="pi-links">
                            <a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
                            <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                        </div>
                    </div>
                    <div class="pi-text">
                        <h6><s style="color: red;">${{ $latestProduct->original_price }}</s>  ${{ $latestProduct->selling_price }}</h6>
                        <p>{{ $latestProduct->name }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- letest product section end -->



<!-- Product filter section -->
<section class="product-filter-section">
	<div class="container">
		<div class="section-title">
			<h2>BROWSE TOP SELLING PRODUCTS</h2>
		</div>
		<ul class="product-filter-menu">
			<li><a href="#">TOPS</a></li>
			<li><a href="#">JUMPSUITS</a></li>
			<li><a href="#">LINGERIE</a></li>
			<li><a href="#">JEANS</a></li>
			<li><a href="#">DRESSES</a></li>
			<li><a href="#">COATS</a></li>
			<li><a href="#">JUMPERS</a></li>
			<li><a href="#">LEGGINGS</a></li>
		</ul>
		<div class="row">
            @foreach ($trendings as $trending)
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="{{ asset('uploads/product/'.$trending->image) }}" alt="">
                            <div class="pi-links">
                                <a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
                                <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                            </div>
                        </div>
                        <div class="pi-text">
                            <h6>${{ $trending->selling_price }}</h6>
                        <p>{{ $trending->name }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
		</div>
		<div class="text-center pt-5">
			<button class="site-btn sb-line sb-dark">LOAD MORE</button>
		</div>
	</div>
</section>
<!-- Product filter section end -->


<!-- Banner section -->
<section class="banner-section">
	<div class="container">
		<div class="banner set-bg" data-setbg="{{ asset('frontend/assets/img/background/banner-bg.jpg') }}">
			<div class="tag-new">NEW</div>
			<span>New Arrivals</span>
			<h2>STRIPED SHIRTS</h2>
            {{--  <h2>MacBook Pro</h2>  --}}
			<a href="#" class="site-btn">SHOP NOW</a>
		</div>
	</div>
</section>
<!-- Banner section end  -->
    
@endsection

@push('js')
    
@endpush