<x-base>

    <x-includes.header :categories="$categories" />

    <section class="section-content padding-y bg">
        <div class="container">
            <!-- ============================ COMPONENT 1 ================================= -->
            <h4 class="text-center mb-20">Review Your Order and Make Payment</h4>
            <div class="row">

                <aside class="col-lg-8">
                    <div class="card">
                        <h5 class="card-header">Billing Address</h5>
                        <div class="card-body">
                            <p class="card-text mb-0">{{ $order->first_name }} {{ $order->last_name }}</p>
                            <p class="card-text mb-0">{{ $order->address_line_1 }} {{ $order->address_line_2 }}</p>
                            <p class="card-text mb-0">{{ $order->city }}, {{ $order->state }}</p>
                            <p class="card-text mb-0">{{ $order->country }}</p>
                            <p class="card-text mb-0">{{ $order->email }}</p>
                            <p class="card-text mb-0">{{ $order->phone }}</p>
                            @if($order->order_note)
                            <b>Order Note: </b> {{ $order->order_note }}
                            @endif
                        </div>
                    </div> <!-- card.// -->

                    <div class="card">
                        <h5 class="card-header">Payment Method</h5>
                        <div class="card-body">
                            <p class="card-text">PayPal</p>
                        </div>
                    </div> <!-- card.// -->

                    <div class="card">
                        <h5 class="card-header">Review products</h5>
                        <div class="card-body">
                            <table class="table table-borderless table-shopping-cart">
                                <thead class="text-muted">
                                    <tr class="small text-uppercase">
                                        <th scope="col">Product</th>
                                        <th scope="col" width="120">Quantity</th>
                                        <th scope="col" width="120">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cart_items as $item)
                                    <tr>
                                        <td>
                                            <figure class="itemside align-items-center">
                                                <div class="aside"><img src="{{ asset('storage/' . $item->product->image) }}" class="img-sm"></div>
                                                <figcaption class="info">
                                                    <a href="" class="title text-dark">{{ $item->product->name }}</a>
                                                </figcaption>
                                            </figure>
                                        </td>
                                        <td>
                                            <!-- col.// -->
                                            <div class="col">
                                                <div class="input-group input-spinner">
                                                    <input type="text" class="form-control" value="{{ $item->quantity }}">
                                                </div> <!-- input-group.// -->
                                            </div> <!-- col.// -->
                                        </td>
                                        <td>
                                            <div class="price-wrap">
                                                <var class="price">{{ $item->product->price * $item->quantity }} LE</var>
                                                <small class="text-muted">{{ $item->product->price }} LE each </small>
                                            </div> <!-- price-wrap .// -->
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div> <!-- card.// -->
                </aside> <!-- col.// -->
                <aside class="col-lg-4">

                    <div class="card">
                        <div class="card-body">
                            <dl class="dlist-align">
                                <dt>Total price:</dt>
                                <dd class="text-right">{{ $total }} LE</dd>
                            </dl>
                            <dl class="dlist-align">
                                <dt>Tax:</dt>
                                <dd class="text-right"> {{ $tax }} LE</dd>
                            </dl>
                            <dl class="dlist-align">
                                <dt>Grand Total:</dt>
                                <dd class="text-right text-dark b"><strong>{{ $grand_total }} LE</strong></dd>
                            </dl>
                            <hr>
                            <p class="text-center mb-3">
                                <img src="" height="26">
                            </p>


                            <div id="paypal-button-container"></div>
                        </div> <!-- card-body.// -->
                    </div> <!-- card.// -->
                </aside> <!-- col.// -->


            </div> <!-- row.// -->
            <!-- ============================ COMPONENT 1 END .// ================================= -->
        </div> <!-- container .//  -->
    </section>
    <!-- ========================= SECTION CONTENT END// ========================= -->



    <script>
        let amount = '{{ $grand_total }}'
        let url = "http://localhost:8000/api/payment"
        let orderID = "{{ $order->order_number }}"
        let total = `{{ $order->order_total }}`
        let payment_method = 'PayPal'
        let redirect_url = "/order_complete"
        let user_id = `{{ $user_id }}`


        paypal.Buttons({
            // Sets up the transaction when a payment button is clicked
            createOrder: (data, actions) => {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: amount // Can also reference a variable or function
                        }
                    }]
                });
            },
            // Finalize the transaction after payer approval
            onApprove: (data, actions) => {
                return actions.order.capture().then(function(orderData) {
                    // Successful capture! For dev/demo purposes:
                    const transaction = orderData.purchase_units[0].payments.captures[0];

                    function sendData() {
                        fetch(url, {
                                method: "POST",
                                headers: {
                                    "Content-type": "application/json",
                                },
                                body: JSON.stringify({
                                    "user_id": user_id,
                                    "orderID": orderID,
                                    "total": total,
                                    "transID": transaction.id,
                                    "payment_method": payment_method,
                                    "status": transaction.status
                                }),
                            })
                            .then((response) => response.json())
                            .then((data) => {
                                window.location.href = redirect_url + '?order_number=' + data.order_number + '&payment_id=' + data.transID
                            });
                    }
                    sendData();
                });
            }
        }).render('#paypal-button-container');
    </script>

    <x-includes.footer />
</x-base>