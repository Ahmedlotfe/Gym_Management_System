<x-base>
    <x-includes.header :categories="$categories" />

    <section class="section-content padding-y bg">
        <div class="container">

            <!-- ============================ COMPONENT 1 ================================= -->
            @if(!$total)
            <h2 class="text-center">Your Shopping Cart is Empty</h2>
            <br>
            <div class="text-center">
                <a href="/store" class="btn btn-primary">Continue Shopping</a>
            </div>
            @else
            <div class="row">
                <aside class="col-lg-9">
                    <div class="card">
                        <table class="table table-borderless table-shopping-cart">
                            <thead class="text-muted">
                                <tr class="small text-uppercase">
                                    <th scope="col">Product</th>
                                    <th scope="col" width="120">Quantity</th>
                                    <th scope="col" width="120">Price</th>
                                    <th scope="col" class="text-right" width="200"> </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cart_items as $cart_item)
                                <tr>
                                    <td>
                                        <figure class="itemside align-items-center">
                                            <div class="aside"><img src="{{ asset('storage/' . $cart_item->product->image) }}" class="img-sm"></div>
                                            <figcaption class="info">
                                                <a href="/{{ $cart_item->product->slug }}" class="title text-dark">{{ $cart_item->product->name }}</a>
                                            </figcaption>
                                        </figure>
                                    </td>
                                    <td>
                                        <!-- col.// -->
                                        <div class="col">
                                            <div class="input-group input-spinner">
                                                <div class="input-group-prepend">
                                                    <form action="/remove_cart/{{ $cart_item->product->slug }}" method="POST">
                                                        @csrf
                                                        <button class="btn btn-light" type="submit" id="button-plus"> <i class="fa fa-minus"></i> </button>
                                                    </form>
                                                </div>
                                                <input type="text" class="form-control" value="{{ $cart_item->quantity }}">
                                                <div class="input-group-append">
                                                    <form action="/add_cart/{{ $cart_item->product->slug }}" method="POST">
                                                        @csrf
                                                        <button class="btn btn-light" type="submit" id="button-minus"> <i class="fa fa-plus"></i> </button>
                                                    </form>
                                                </div>
                                            </div> <!-- input-group.// -->
                                        </div> <!-- col.// -->
                                    </td>
                                    <td>
                                        <div class="price-wrap">
                                            <var class="price">{{ $cart_item->product->price * $cart_item->quantity }} LE</var>
                                        </div> <!-- price-wrap .// -->
                                    </td>
                                    <td class="text-right">
                                        <form action="/remove_cart_item/{{ $cart_item->product->slug }}" method="POST">
                                            @csrf
                                            <button class="btn btn-danger" type="submit" id="button-minus"> Remove </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> <!-- card.// -->

                </aside> <!-- col.// -->
                <aside class="col-lg-3">

                    <div class="card">
                        <div class="card-body">
                            <dl class="dlist-align">
                                <dt>Total price:</dt>
                                <dd class="text-right">{{ $total }} LE</dd>
                            </dl>
                            <dl class="dlist-align">
                                <dt>Tax:</dt>
                                <dd class="text-right">{{ $tax }} LE</dd>
                            </dl>
                            <dl class="dlist-align">
                                <dt>Total:</dt>
                                <dd class="text-right text-dark b"><strong>{{ $grand_total }} LE</strong></dd>
                            </dl>
                            <hr>
                            <p class="text-center mb-3">
                                <img src="./images/misc/payments.png" height="26">
                            </p>
                            <a href="/checkout" class="btn btn-primary btn-block"> Checkout </a>
                            <a href="/store" class="btn btn-light btn-block">Continue Shopping</a>
                        </div> <!-- card-body.// -->
                    </div> <!-- card.// -->

                </aside> <!-- col.// -->


            </div> <!-- row.// -->
            <!-- ============================ COMPONENT 1 END .// ================================= -->
            @endif
        </div> <!-- container .//  -->
    </section>
    <!-- ========================= SECTION CONTENT END// ========================= -->

    <x-includes.footer />
</x-base>