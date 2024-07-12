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
                        <h1 class="page-title">Cart</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="index.html">Shop</a></li>
                        <li>Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Shopping Cart -->
    <div class="shopping-cart section">
        <div class="container">
            <div class="cart-list-head">
                <!-- Cart List Title -->
                <div class="cart-list-title">
                    <div class="row">
                        <div class="col-lg-1 col-md-1 col-12">

                        </div>
                        <div class="col-lg-4 col-md-3 col-12">
                            <p>Product Name</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Quantity</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Subtotal</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Discount</p>
                        </div>
                        <div class="col-lg-1 col-md-2 col-12">
                            <p>Remove</p>
                        </div>
                    </div>
                </div>
                <!-- End Cart List Title -->
                @foreach($cartDetails as $cartItem)
                <!-- Cart Single List list -->
                <div class="cart-single-list product_data"  id="product_data{{$cartItem->Product->id}}">
                    <div class="row align-items-center">
                        <div class="col-lg-1 col-md-1 col-12">
                            <a href="product-details.html"><img src="https://via.placeholder.com/220x200" alt="#"></a>
                        </div>
                        <div class="col-lg-4 col-md-3 col-12  ">
                            <input class="Product_id" type="hidden" value="{{$cartItem->Product->id}}">
                            <h5 class="product-name"><a href="#">
                                    {{$cartItem->Product->name}}</a></h5>
                            <p class="product-des">
                                <span><em>Type:</em> Mirrorless</span>
                                <span><em>Color:</em> Black</span>
                            </p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <div class="count-input">
                                <select id="productQuantity{{$cartItem->Product->id}}" class="form-control productQuantity">
                                    <option value="1"@selected($cartItem->quantity ==1)>1</option>
                                    <option value="2" @selected($cartItem->quantity==2)>2</option>
                                    <option value="3" @selected($cartItem->quantity==3)>3</option>
                                    <option value="4" @selected($cartItem->quantity==4)>4</option>
                                    <option value="5" @selected($cartItem->quantity==5)>5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12 ">
                            <p class="productPrice{{$cartItem->Product->id}}">${{$cartItem->Product->price}}</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12 ">
                            <p id="" class="comparePrice{{$cartItem->Product->id}}">${{$cartItem->Product->compare_price}}</p>
                        </div>
                        <div class="col-lg-1 col-md-2 col-12">
                            <a class="remove-item" href="javascript:void(0)"><i class="lni lni-close"></i></a>
                        </div>
                    </div>
                </div>
                <!-- End Single List list -->
                @endforeach

            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Total Amount -->
                    <div class="total-amount">
                        <div class="row">
                            <div class="col-lg-8 col-md-6 col-12">
                                <div class="left">
                                    <div class="coupon">
                                        <form action="#" target="_blank">
                                            <input name="Coupon" placeholder="Enter Your Coupon">
                                            <div class="button">
                                                <button class="btn">Apply Coupon</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="right">
                                    <ul>
                                        <li>Cart Subtotal<span>$2560.00</span></li>
                                        <li>Shipping<span>Free</span></li>
                                        <li>You Save<span>$29.00</span></li>
                                        <li class="last">You Pay<span>$2531.00</span></li>
                                    </ul>
                                    <div class="button">
                                        <a href="{{route('Checkout')}}" class="btn">Checkout</a>
                                        <a href="product-grids.html" class="btn btn-alt">Continue shopping</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ End Total Amount -->
                </div>
            </div>
        </div>
    </div>
    <!--/ End Shopping Cart -->
@endsection


@section('scripts')

<script>

$(document).ready(function(){

    // update product to shopping cart
    $('.productQuantity').change(function(event){
        event.preventDefault(); 
        var product_id = $(this).closest('.product_data').find('.Product_id').val();
        var quantity = $(this).val();


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }});
                // AJAX update product request
        $.ajax({
            url: "{{ route('cart.update') }}",
            method: 'post',
            data: {
                'product_id': product_id,
                'productQuantity': quantity
                
            },
            success: function(response) {

                
                if(response.productId === product_id){
                    $('.productPrice'+product_id).html(response.newPrice)
                    $('.comparePrice'+product_id).text(response.discount)

                    Cookies.set('newPriceCookie'+ product_id, response.newPriceCookie)

                }
                
            },
            error: function(xhr, status, error) {
                console.error('Error details:', xhr.responseText);
                alert('Failed to update product to cart.');
            }
        });

    })

        // fetch data with cookie when page relode 

        // $('.product_data').each(function(){
        //     //event.preventDefault();
        // var product_id = $(this).closest('.product_data').find('.Product_id').val();
        // var productPriceCookie = Cookies.get('newPriceCookie');
        // // var productPriceStored = localStorage.getItem("newPrice" + product_id);
        //     //productPrice42 // newPriceCookie42
        // $('.productPrice'+product_id).text(productPriceCookie)
        // console.log(product_id)
        
        // })

})

</script>
@endsection

