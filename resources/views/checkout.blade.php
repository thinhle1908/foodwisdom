<x-layout>
    @section('script')
        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }
        </style>
    @endsection
    @section('content')
        <section class="h-100 h-custom">
            <div class="container h-100 py-5">
                <div class="py-5 text-center">
                    <h2>Checkout form</h2>
                </div>
                <div class="row">
                    <div class="col-md-4 order-md-2 mb-4">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">Your cart</span>
                            <span class="badge badge-secondary badge-pill">{{ Cart::getContent()->count() }}</span>
                        </h4>
                        <ul class="list-group mb-3">
                            @foreach ($cartItems as $item)
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <h6 class="my-0">{{ $item->name }}</h6>
                                        <small class="text-muted">Quantity:{{ $item->quantity }}</small>
                                    </div>
                                    <span class="text-muted">${{ $item->price }}</span>

                                </li>
                            @endforeach
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Total (USD)</span>
                                <strong>${{ Cart::getTotal() }}</strong>
                            </li>
                        </ul>

                        <form class="card p-2">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Promo code">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-secondary">Redeem</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-8 order-md-1">
                        <h4 class="mb-3">Billing address</h4>
                        <form class="needs-validation" method="POST" action="{{ route('checkout.payment') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="firstName">Name</label>
                                    <input type="text" class="form-control" id="firstName" placeholder=""
                                        value="{{ $user->name }}" required>
                                    <div class="invalid-feedback">
                                        Valid first name is required.
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email">Email <span class="text-muted">(Optional)</span></label>
                                <input type="email" class="form-control" id="email" placeholder="you@example.com"
                                    value="{{ $user->email }}">
                                <div class="invalid-feedback">
                                    Please enter a valid email address for shipping updates.
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" placeholder="1234 Main St"
                                    value="{{ $user->profile->line1 }}" required>
                                <div class="invalid-feedback">
                                    Please enter your shipping address.
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                                <input type="text" class="form-control" id="address2" placeholder="Apartment or suite"
                                    value="{{ $user->profile->line2 }}">
                            </div>
                            <div class="mb-3">
                                <label for="phone">Phone <span class="text-muted">(Optional)</span></label>
                                <input type="text" class="form-control" id="phone" placeholder="phone number"
                                    value="{{ $user->profile->mobile }}">
                            </div>

                            <div class="row">
                                <div class="col-md-5 mb-3">
                                    <label for="zip">Country</label>
                                    <input type="text" class="form-control" id="zip" placeholder="" required
                                        value="{{ $user->profile->country }}">
                                    <div class="invalid-feedback">
                                        Zip code required.
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="zip">Province</label>
                                    <input type="text" class="form-control" id="zip" placeholder="" required
                                        value="{{ $user->profile->province }}">
                                    <div class="invalid-feedback">
                                        Zip code required.
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="zip">Zip</label>
                                    <input type="text" class="form-control" id="zip" placeholder="" required
                                        value="{{ $user->profile->zipcode }}">
                                    <div class="invalid-feedback">
                                        Zip code required.
                                    </div>
                                </div>
                            </div>
                            <hr class="mb-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="same-address">
                                <label class="custom-control-label" for="same-address">Shipping address is the same as my
                                    billing address</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="save-info">
                                <label class="custom-control-label" for="save-info">Save this information for next
                                    time</label>
                            </div>
                            <hr class="mb-4">

                            <h4 class="mb-3">Payment</h4>

                            <div class="d-block my-3">
                                <div class="custom-control custom-radio">
                                    <input id="credit" name="paymentMethod" type="radio"
                                        class="custom-control-input" checked required>
                                    <label class="custom-control-label" for="credit">Credit card</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input id="debit" name="paymentMethod" type="radio"
                                        class="custom-control-input" required>
                                    <label class="custom-control-label" for="debit">Debit card</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input id="paypal" name="paymentMethod" type="radio"
                                        class="custom-control-input" required>
                                    <label class="custom-control-label" for="paypal">PayPal</label>
                                </div>
                            </div>
                            <hr class="mb-4">
                            {{-- <button id="checkout-button" type="button" class="btn btn-primary btn-lg">Proceed To Checkout</button> --}}
                            <button id="checkout-button" class="btn btn-primary btn-lg btn-block" type="submit">Continue
                                to checkout</button>
                        </form>
                       
                    </div>
                </div>

                <footer class="my-5 pt-5 text-muted text-center text-small">
                    <p class="mb-1">&copy; 2017-2019 Company Name</p>
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="#">Privacy</a></li>
                        <li class="list-inline-item"><a href="#">Terms</a></li>
                        <li class="list-inline-item"><a href="#">Support</a></li>
                    </ul>
                </footer>
            </div>
        </section>
    @endsection
</x-layout>
