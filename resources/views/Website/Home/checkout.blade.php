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
                        <h1 class="page-title">checkout</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="index.html">Shop</a></li>
                        <li>checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!--====== Checkout Form Steps Part Start ======-->

    <section class="checkout-wrapper section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="checkout-steps-form-style-1">
                        <ul id="accordionExample">
                        <form action="{{route('Checkout')}}" method="POST">
                                @csrf
                            <li>
                                <h6 class="title" data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                    aria-expanded="true" aria-controls="collapseThree">Your Personal Details </h6>
                                <section class="checkout-steps-form-content collapse show" id="collapseThree"
                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="single-form form-default">
                                                <label>User Name</label>
                                                <div class="row">
                                                    <div class="col-md-6 form-input form">
                                                        <input type="text" name="addr[billing][first_name]" id="billingfirst_name" placeholder="First Name" value="{{old("addr[billing][first_name]")}}" class="@error('addr[billing][first_name]') is-invalid @enderror" required>
                                                        @error('addr[billing][first_name]')<div class="alert alert-danger">{{ $message }}</div>@enderror
                                                    </div>

                                                    <div class="col-md-6 form-input form">
                                                        <input type="text" name="addr[billing][last_name]" id="billinglast_name" placeholder="Last Name" value="{{old("addr[billing][last_name]")}}" class="@error('addr[billing][last_name]') is-invalid @enderror" required>
                                                        @error('addr[billing][last_name]')<div class="alert alert-danger">{{ $message }}</div>@enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Email Address</label>
                                                <div class="form-input form">
                                                    <input type="email" name="addr[billing][email]" id="billingemail" placeholder="Email Address" value="{{old("addr[billing][email]")}}" class="@error('addr[billing][email]') is-invalid @enderror" required>
                                                    @error('addr[billing][email]')<div class="alert alert-danger">{{ $message }}</div>@enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Phone Number</label>
                                                <div class="form-input form">
                                                    <input type="text" name="addr[billing][phone_number]"  id="billingphone_number"  placeholder="Phone Number" value="{{old("addr[billing][phone_number]")}}" class="@error('addr[billing][phone_number]') is-invalid @enderror" required >
                                                    @error('addr[billing][phone_number]')<div class="alert alert-danger">{{ $message }}</div>@enderror

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>city</label>
                                                <div class="form-input form">
                                                    <input type="text" placeholder="city" id="billingcity" name="addr[billing][city]" value="{{old("addr[billing][city]")}}" class="@error('addr[billing][city]') is-invalid @enderror" required>
                                                    @error('addr[billing][city]')<div class="alert alert-danger">{{ $message }}</div>@enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>street</label>
                                                <div class="form-input form">
                                                    <input type="text" name="addr[billing][street]" id="billingstreet" placeholder="street Name" value="{{old("addr[billing][street]")}}" class="@error('addr[billing][street]') is-invalid @enderror" required>
                                                    @error('addr[billing][street]')<div class="alert alert-danger">{{ $message }}</div>@enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="single-form form-default">
                                                <label>More Details</label>
                                                <div class="form-input form">
                                                    <input type="text" name="addr[billing][more_details]" id="billingmore_details" placeholder="More Details Addreess"value="{{old("addr[billing][more_details]")}}" class="@error('addr[billing][more_details]') is-invalid @enderror" required>
                                                    @error('addr[billing][more_details]')<div class="alert alert-danger">{{ $message }}</div>@enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="single-checkbox checkbox-style-3">
                                                <input type="checkbox" id="billingCheckbox">
                                                <label for="billingCheckbox"><span></span></label>
                                                <p>My delivery and mailing addresses are the same.</p>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="single-form button">
                                                <button type="button"  class="btn" id="nextstep-btn" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseFour" aria-expanded="false"
                                                    aria-controls="collapseFour">nextstep</button>
                                                    
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </li>

                                {{-- shipping Addrress--}}
                                <li>
                                    <h6 class="title collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                        aria-expanded="false" aria-controls="collapseFour">Shipping Address</h6>
                                    <section class="checkout-steps-form-content collapse" id="collapseFour"
                                        aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <label>User Name</label>
                                                    <div class="row">
                                                        <div class="col-md-6 form-input form">
                                                            <input type="text" name="addr[shipping][first_name]" id='shippingfirst_name' placeholder="First Name" value="{{old("addr[shipping][first_name]")}}" class="@error('addr[shipping][first_name]') is-invalid @enderror" required>
                                                            @error('addr[shipping][first_name]')<div class="alert alert-danger">{{ $message }}</div>@enderror
                                                        </div>

                                                        <div class="col-md-6 form-input form">
                                                            <input type="text" name="addr[shipping][last_name]" id='shippinglast_name' placeholder="Last Name" value="{{old("addr[shipping][last_name]")}}" class="@error('addr[shipping][last_name]') is-invalid @enderror" required>
                                                            @error('addr[shipping][last_name]')<div class="alert alert-danger">{{ $message }}</div>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>Email Address</label>
                                                    <div class="form-input form">
                                                        <input type="email" name="addr[shipping][email]" id='shippingemail' placeholder="Email Address" value="{{old("addr[shipping][email]")}}" class="@error('addr[shipping][email]') is-invalid @enderror" required>
                                                        @error('addr[shipping][email]')<div class="alert alert-danger">{{ $message }}</div>@enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>Phone Number</label>
                                                    <div class="form-input form">
                                                        <input type="text" name="addr[shipping][phone_number]" id='shippingphone_number' placeholder="Phone Number" value="{{old("addr[shipping][phone_number]")}}" class="@error('addr[shipping][phone_number]') is-invalid @enderror" required >
                                                        @error('addr[shipping][phone_number]')<div class="alert alert-danger">{{ $message }}</div>@enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>city</label>
                                                    <div class="form-input form">
                                                        <input type="text" placeholder="city" id='shippingcity' name="addr[shipping][city]" value="{{old("addr[shipping][city]")}}" class="@error('addr[shipping][city]') is-invalid @enderror" required>
                                                        @error('addr[shipping][city]')<div class="alert alert-danger">{{ $message }}</div>@enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>street</label>
                                                    <div class="form-input form">
                                                        <input type="text" name="addr[shipping][street]" id='shippingstreet' placeholder="street Name" value="{{old("addr[shipping][street]")}}" class="@error('addr[shipping][street]') is-invalid @enderror" required>
                                                        @error('addr[shipping][street]')<div class="alert alert-danger">{{ $message }}</div>@enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <label>More Details</label>
                                                    <div class="form-input form">
                                                        <input type="text" name="addr[shipping][more_details]" id='shippingmore_details' placeholder="More Details Addreess"value="{{old("addr[shipping][more_details]")}}" class="@error('addr[shipping][more_details]') is-invalid @enderror" required>
                                                        @error('addr[shipping][more_details]')<div class="alert alert-danger">{{ $message }}</div>@enderror
                                                    </div>
                                                </div>
                                            </div>
        
                                            <div class="col-md-12">
                                                <div class="row">
                                                <div class="steps-form-btn button col-md-6">
                                                    <button class="btn "  data-bs-toggle="collapse"
                                                        data-bs-target="#collapseThree" aria-expanded="false"
                                                        aria-controls="collapseThree">previous</button>
                                                    {{-- <a type="submit" href="javascript:void(0)" class="btn btn-alt">Save & Continue</a> --}}
                                                </div>
                                                <div class="steps-form-btn button col-md-6">
                                                    <button type="submit" class="btn" >save$continue</button>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </li>
                                {{-- paymant form --}}
                                <li>
                                    <h6 class="title collapsed" data-bs-toggle="collapse" data-bs-target="#collapsefive"
                                        aria-expanded="false" aria-controls="collapsefive">Payment Info</h6>
                                    <section class="checkout-steps-form-content collapse" id="collapsefive"
                                        aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="checkout-payment-form">
                                                    <div class="single-form form-default">
                                                        <label>Cardholder Name</label>
                                                        <div class="form-input form">
                                                            <input type="text" placeholder="Cardholder Name">
                                                        </div>
                                                    </div>
                                                    <div class="single-form form-default">
                                                        <label>Card Number</label>
                                                        <div class="form-input form">
                                                            <input id="credit-input" type="text"
                                                                placeholder="0000 0000 0000 0000">
                                                            <img src="assets/images/payment/card.png" alt="card">
                                                        </div>
                                                    </div>
                                                    <div class="payment-card-info">
                                                        <div class="single-form form-default mm-yy">
                                                            <label>Expiration</label>
                                                            <div class="expiration d-flex">
                                                                <div class="form-input form">
                                                                    <input type="text" placeholder="MM">
                                                                </div>
                                                                <div class="form-input form">
                                                                    <input type="text" placeholder="YYYY">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="single-form form-default">
                                                            <label>CVC/CVV <span><i
                                                                        class="mdi mdi-alert-circle"></i></span></label>
                                                            <div class="form-input form">
                                                                <input type="text" placeholder="***">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="single-form form-default button">
                                                        <button type="button" class="btn">pay now</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </li>
                            
                            </form>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="checkout-sidebar">
                        <div class="checkout-sidebar-coupon">
                            <p>Appy Coupon to get discount!</p>
                            <form action="#">
                                <div class="single-form form-default">
                                    <div class="form-input form">
                                        <input type="text" placeholder="Coupon Code">
                                    </div>
                                    <div class="button">
                                        <button class="btn">apply</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="checkout-sidebar-price-table mt-30">
                            <h5 class="title">Pricing Table</h5>

                            <div class="sub-total-price">
                                <div class="total-price">
                                    <p class="value">Subotal Price:</p>
                                    <p class="price">$144.00</p>
                                </div>
                                <div class="total-price shipping">
                                    <p class="value">Subotal Price:</p>
                                    <p class="price">$10.50</p>
                                </div>
                                <div class="total-price discount">
                                    <p class="value">Subotal Price:</p>
                                    <p class="price">$10.00</p>
                                </div>
                            </div>

                            <div class="total-payable">
                                <div class="payable-price">
                                    <p class="value">Subotal Price:</p>
                                    <p class="price">$164.50</p>
                                </div>
                            </div>
                            <div class="price-table-btn button">
                                <a href="javascript:void(0)" class="btn btn-alt">Checkout</a>
                            </div>
                        </div>
                        <div class="checkout-sidebar-banner mt-30">
                            <a href="product-grids.html">
                                <img src="https://via.placeholder.com/400x330" alt="#">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Checkout Form Steps Part Ends ======-->
    
@endsection




@section('scripts')

    <script>
        $(document).ready(function(){

            $('#nextstep-btn').click(function(){

                if($('#billingCheckbox').prop('checked')){
                    $('#shippingfirst_name').val($('#billingfirst_name').val());
                    $('#shippinglast_name').val($('#billinglast_name').val());
                    $('#shippingemail').val($('#billingemail').val());
                    $('#shippingphone_number').val($('#billingphone_number').val());
                    $('#shippingcity').val($('#billingcity').val());
                    $('#shippingstreet').val($('#billingstreet').val());
                    $('#shippingmore_details').val($('#billingmore_details').val());
                }
                $('#collapseFour').collapse('show');
                $('#collapseThree').collapse('hide');

            })



        })

    </script>
@endsection