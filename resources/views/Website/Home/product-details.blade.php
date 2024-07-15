@extends('Website.Layouts.master')

@section('title')
x-cite
@endsection


@section('content')
    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Single Product</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="index.html">Shop</a></li>
                        <li>Single Product</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Item Details -->
    <section class="item-details section">
        <div class="container product_data">
            <div class="top-area">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-images">
                            <main id="gallery">
                                <div class="main-img">
                                    <img src="https://via.placeholder.com/1000x670" id="current" alt="#">
                                </div>
                                <div class="images">
                                    <img src="https://via.placeholder.com/1000x670" class="img" alt="#">
                                    <img src="https://via.placeholder.com/1000x670" class="img" alt="#">
                                    <img src="https://via.placeholder.com/1000x670" class="img" alt="#">
                                    <img src="https://via.placeholder.com/1000x670" class="img" alt="#">
                                    <img src="https://via.placeholder.com/1000x670" class="img" alt="#">
                                </div>
                            </main>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-info">
                            <input type="hidden"class='product_id' value="{{$product->id}}" >
                            <h2 class="title">{{$product->name}}</h2>
                            <p class="category"><i class="lni lni-tag"></i> {{$product->category->name}}</p>
                            <h3 class="price">${{$product->price}}<span>${{$product->compare_price}}</span></h3>
                            <p class="info-text">{{$product->description}}</p>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="form-group color-option">
                                        <label class="title-label" for="size">Choose color</label>
                                        <div class="single-checkbox checkbox-style-1">
                                            <input type="checkbox" id="checkbox-1" checked>
                                            <label for="checkbox-1"><span></span></label>
                                        </div>
                                        <div class="single-checkbox checkbox-style-2">
                                            <input type="checkbox" id="checkbox-2">
                                            <label for="checkbox-2"><span></span></label>
                                        </div>
                                        <div class="single-checkbox checkbox-style-3">
                                            <input type="checkbox" id="checkbox-3">
                                            <label for="checkbox-3"><span></span></label>
                                        </div>
                                        <div class="single-checkbox checkbox-style-4">
                                            <input type="checkbox" id="checkbox-4">
                                            <label for="checkbox-4"><span></span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="color">Battery capacity</label>
                                        <select class="form-control" id="color">
                                            <option>5100 mAh</option>
                                            <option>6200 mAh</option>
                                            <option>8000 mAh</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="form-group quantity">
                                        <label for="color">Quantity</label>
                                        <select class="form-control prodcutQuantity">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="bottom-content">
                                <div class="row align-items-end">
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="button cart-button">
                                            <form action="{{ route('cart.store', $product->id) }}" method="POST">
                                                @csrf
                                                <button type="button" class="btn addCartBtn" style="padding: 10px;">Add to Cart</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="wish-button">
                                            <button class="btn"><i class="lni lni-reload"></i> Compare</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="wish-button">
                                            <button class="btn"><i class="lni lni-heart"></i> To Wishlist</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-details-info">
                <div class="single-block">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="info-body custom-responsive-margin">
                                <h4>Details</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                    irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat.</p>
                                <h4>Features</h4>
                                <ul class="features">
                                    <li>Capture 4K30 Video and 12MP Photos</li>
                                    <li>Game-Style Controller with Touchscreen</li>
                                    <li>View Live Camera Feed</li>
                                    <li>Full Control of HERO6 Black</li>
                                    <li>Use App for Dedicated Camera Operation</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="info-body">
                                <h4>Specifications</h4>
                                <ul class="normal-list">
                                    <li><span>Weight:</span> 35.5oz (1006g)</li>
                                    <li><span>Maximum Speed:</span> 35 mph (15 m/s)</li>
                                    <li><span>Maximum Distance:</span> Up to 9,840ft (3,000m)</li>
                                    <li><span>Operating Frequency:</span> 2.4GHz</li>
                                    <li><span>Manufacturer:</span> GoPro, USA</li>
                                </ul>
                                <h4>Shipping Options:</h4>
                                <ul class="normal-list">
                                    <li><span>Courier:</span> 2 - 4 days, $22.50</li>
                                    <li><span>Local Shipping:</span> up to one week, $10.00</li>
                                    <li><span>UPS Ground Shipping:</span> 4 - 6 days, $18.00</li>
                                    <li><span>Unishop Global Export:</span> 3 - 4 days, $25.00</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-12">
                        <div class="single-block give-review">
                            <h4>4.5 (Overall)</h4>
                            <ul>
                                <li>
                                    <span>5 stars - 38</span>
                                    <i class="lni lni-star-filled"></i>
                                    <i class="lni lni-star-filled"></i>
                                    <i class="lni lni-star-filled"></i>
                                    <i class="lni lni-star-filled"></i>
                                    <i class="lni lni-star-filled"></i>
                                </li>
                                <li>
                                    <span>4 stars - 10</span>
                                    <i class="lni lni-star-filled"></i>
                                    <i class="lni lni-star-filled"></i>
                                    <i class="lni lni-star-filled"></i>
                                    <i class="lni lni-star-filled"></i>
                                    <i class="lni lni-star"></i>
                                </li>
                                <li>
                                    <span>3 stars - 3</span>
                                    <i class="lni lni-star-filled"></i>
                                    <i class="lni lni-star-filled"></i>
                                    <i class="lni lni-star-filled"></i>
                                    <i class="lni lni-star"></i>
                                    <i class="lni lni-star"></i>
                                </li>
                                <li>
                                    <span>2 stars - 1</span>
                                    <i class="lni lni-star-filled"></i>
                                    <i class="lni lni-star-filled"></i>
                                    <i class="lni lni-star"></i>
                                    <i class="lni lni-star"></i>
                                    <i class="lni lni-star"></i>
                                </li>
                                <li>
                                    <span>1 star - 0</span>
                                    <i class="lni lni-star-filled"></i>
                                    <i class="lni lni-star"></i>
                                    <i class="lni lni-star"></i>
                                    <i class="lni lni-star"></i>
                                    <i class="lni lni-star"></i>
                                </li>
                            </ul>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn review-btn" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Leave a Review
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-8 col-12">
                        <div class="single-block">
                            <div class="reviews">
                                <h4 class="title">Latest Reviews</h4>
                                <!-- Start Single Review -->
                                <div class="single-review">
                                    <img src="https://via.placeholder.com/150x150" alt="#">
                                    <div class="review-info">
                                        <h4>Awesome quality for the price
                                            <span>Jacob Hammond
                                            </span>
                                        </h4>
                                        <ul class="stars">
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                        </ul>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor...</p>
                                    </div>
                                </div>
                                <!-- End Single Review -->
                                <!-- Start Single Review -->
                                <div class="single-review">
                                    <img src="https://via.placeholder.com/150x150" alt="#">
                                    <div class="review-info">
                                        <h4>My husband love his new...
                                            <span>Alex Jaza
                                            </span>
                                        </h4>
                                        <ul class="stars">
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star"></i></li>
                                        </ul>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor...</p>
                                    </div>
                                </div>
                                <!-- End Single Review -->
                                <!-- Start Single Review -->
                                <div class="single-review">
                                    <img src="https://via.placeholder.com/150x150" alt="#">
                                    <div class="review-info">
                                        <h4>I love the built quality...
                                            <span>Jacob Hammond
                                            </span>
                                        </h4>
                                        <ul class="stars">
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                        </ul>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor...</p>
                                    </div>
                                </div>
                                <!-- End Single Review -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Item Details -->

    <!-- Review Modal -->
    <div class="modal fade review-modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Leave a Review</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="review-name">Your Name</label>
                                <input class="form-control" type="text" id="review-name" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="review-email">Your Email</label>
                                <input class="form-control" type="email" id="review-email" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="review-subject">Subject</label>
                                <input class="form-control" type="text" id="review-subject" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="review-rating">Rating</label>
                                <select class="form-control" id="review-rating">
                                    <option>5 Stars</option>
                                    <option>4 Stars</option>
                                    <option>3 Stars</option>
                                    <option>2 Stars</option>
                                    <option>1 Star</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="review-message">Review</label>
                        <textarea class="form-control" id="review-message" rows="8" required></textarea>
                    </div>
                </div>
                <div class="modal-footer button">
                    <button type="button" class="btn">Submit Review</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Review Modal -->
@endsection

@section('scripts')

    <script>

    $(document).ready(function(){

        // Add product to shopping cart
        $('.addCartBtn').click(function(e){
            e.preventDefault();       
            var product_id = $(this).closest('.product_data').find('.product_id').val();
            var quantity = $(this).closest('.product_data').find('.prodcutQuantity').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }});
                    // AJAX add product request
            $.ajax({
                url: "{{ route('cart.store') }}",
                method: 'post',
                data: {
                    'product_id': product_id,
                    'prodcutQuantity': quantity
                    
                },
                success: function(response) {

                    
                },
                error: function(xhr, status, error) {
                    console.error('Error adding product to cart:', error);
                    alert('Failed to add product to cart.');
                }
            });



        })

        
    })

    </script>
@endsection
