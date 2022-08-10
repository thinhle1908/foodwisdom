<x-layout>
    @section('scripts')
        <style>
            @media (min-width: 1025px) {
                .h-custom {
                    height: 100vh !important;
                }
            }
        </style>
    @endsection
    @section('content')
        <section class="h-100 h-custom">
            <div class="container h-100 py-5">
                @if (Cart::getContent()->count() > 0)
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col">

                            <div class="table-responsive">
                                @if ($message = Session::get('success'))
                                    <div class="p-4 mb-3 bg-green-400 rounded">
                                        <p class="text-green-800">{{ $message }}</p>
                                    </div>
                                @endif
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="h5">Shopping Bag</th>
                                            <th scope="col">Format</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cartItems as $item)
                                            <tr>
                                                <th scope="row">
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ asset('images') }}/{{ $item->attributes->image }}"
                                                            class="img-fluid rounded-3" style="width: 120px;"
                                                            alt="Book">
                                                        <div class="flex-column ms-4">
                                                            <p class="mb-2">{{ $item->name }}</p>
                                                        </div>
                                                    </div>
                                                </th>
                                                <td class="align-middle">
                                                    <p class="mb-0" style="font-weight: 500;">Digital</p>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="d-flex flex-row">
                                                        <form action="{{ route('cart.update') }}" method="POST">
                                                            @csrf

                                                            <button type="submit" class="btn btn-link px-2"
                                                                onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                                <i class="fas fa-minus"></i>
                                                            </button>

                                                            <input type="hidden" name="id"
                                                                value="{{ $item->id }}">
                                                            <input type="number" name="quantity"
                                                                value="{{ $item->quantity }}"
                                                                class="w-6 text-center bg-gray-300" />
                                                            <button type="submit" class="btn btn-link px-2"
                                                                onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                                <i class="fas fa-plus"></i>
                                                            </button>
                                                        </form>

                                                    </div>
                                                </td>
                                                <td class="align-middle">
                                                    <p class="mb-0" style="font-weight: 500;"> ${{ $item->price }}</p>
                                                </td>
                                                <td class="align-middle">
                                                    <form action="{{ route('cart.remove') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" value="{{ $item->id }}" name="id">
                                                        <button class="">x</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="card shadow-2-strong mb-5 mb-lg-0" style="border-radius: 16px;">
                                <div class="card-body p-4">

                                    <div class="row">
                                        <div class="col-md-6 col-lg-4 col-xl-6 mb-4 mb-md-0">
                                            <form>
                                                <div class="d-flex flex-row pb-3">
                                                    <div class="d-flex align-items-center pe-2">
                                                        <input class="form-check-input" type="radio" name="radioNoLabel"
                                                            id="radioNoLabel1v" value="" aria-label="..." checked />
                                                    </div>
                                                    <div class="rounded border w-100 p-3">
                                                        <p class="d-flex align-items-center mb-0">
                                                            <i class="fab fa-cc-mastercard fa-2x text-dark pe-2"></i>Credit
                                                            Card
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row pb-3">
                                                    <div class="d-flex align-items-center pe-2">
                                                        <input class="form-check-input" type="radio" name="radioNoLabel"
                                                            id="radioNoLabel2v" value="" aria-label="..." />
                                                    </div>
                                                    <div class="rounded border w-100 p-3">
                                                        <p class="d-flex align-items-center mb-0">
                                                            <i class="fab fa-cc-visa fa-2x fa-lg text-dark pe-2"></i>Debit
                                                            Card
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row">
                                                    <div class="d-flex align-items-center pe-2">
                                                        <input class="form-check-input" type="radio" name="radioNoLabel"
                                                            id="radioNoLabel3v" value="" aria-label="..." />
                                                    </div>
                                                    <div class="rounded border w-100 p-3">
                                                        <p class="d-flex align-items-center mb-0">
                                                            <i
                                                                class="fab fa-cc-paypal fa-2x fa-lg text-dark pe-2"></i>PayPal
                                                        </p>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="col-lg-4 col-xl-6">
                                            <div class="d-flex justify-content-between" style="font-weight: 500;">
                                                <p class="mb-2">Subtotal</p>
                                                <p class="mb-2">${{ Cart::getTotal() }}</p>
                                            </div>

                                            <div class="d-flex justify-content-between" style="font-weight: 500;">
                                                <p class="mb-0">Shipping</p>
                                                <p class="mb-0">Free</p>
                                            </div>

                                            <hr class="my-4">

                                            <div class="d-flex justify-content-between mb-4" style="font-weight: 500;">
                                                <p class="mb-2">Total (tax included)</p>
                                                <p class="mb-2">${{ Cart::getTotal() }}</p>
                                            </div>

                                            <button type="button" class="btn btn-primary btn-block btn-lg">
                                                <div class="d-flex justify-content-between">
                                                    <span>Checkout</span>
                                                    <span>$26.48</span>
                                                </div>
                                            </button>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <p>No item in your cart</p>
                    </div>
                @endif
            </div>
        </section>
    @endsection
</x-layout>x
