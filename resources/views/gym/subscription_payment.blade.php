<x-base>
    <!-- start header -->
    <div class="header" id="header">
        <div class="container">
            <a href="#" class="logo"><img src="./imgs/logo.png" alt=""></a>
            <ul class="main-nav">
                <li><a href="#articles">Home</a></li>
                <li><a href="#gallery">Classes</a></li>
                <li><a href="#feature">Trainers</a></li>
                <li><a href="#">Other Links</a>
                    <!-- start maega-menue -->
                    <div class="mega-menue">
                        <!-- <div class="image">
                        <img src="imgs/megamenu.png" alt="">
                    </div> -->
                        <ul class="links">
                            <li><a href="#"><i class="far fa-comments fa-fw"></i> Testimonials</a></li>
                            <li><a href="#"><i class="far fa-user fa-fw"></i> Team Members</a></li>
                            <li><a href="#"><i class="far fa-building fa-fw"></i> Services</a></li>
                            <li><a href="#"><i class="far fa-check-circle fa-fw"></i> Our Skills</a></li>
                            <li><a href="#"><i class="far fa-clipboard fa-fw"></i> How It Works</a></li>
                        </ul>
                        <ul class="links">
                            <li><a href="#"><i class="far fa-calendar-alt fa-fw"></i>Events</a></li>
                            <li><a href="#"><i class="fas fa-server fa-fw"></i>Pricing Plans</a></li>
                            <li><a href="#"><i class="far fa-play-circle fa-fw"></i>Top Videos</a></li>
                            <li><a href="#"><i class="far fa-chart-bar fa-fw"></i>Stats</a></li>
                            <li><a href="#"><i class="fas fa-percent fa-fw"></i> Request A Discount</a></li>
                        </ul>
                    </div>
                    <!-- end maega-menue -->
                </li>
            </ul>
        </div>
    </div>
    <!-- end header -->

    <section class="section-content padding-y bg">
        <div class="container">
            <!-- ============================ COMPONENT 1 ================================= -->
            <h4 class="text-center mb-20">Review Your Subscription and Make Payment</h4>
            <div class="row">

                <aside class="col-lg-12">

                    <div class="card">
                        <h5 class="card-header">Payment Method</h5>
                        <div class="card-body">
                            <p class="card-text">PayPal</p>
                        </div>
                    </div> <!-- card.// -->

                    <div class="card">
                        <h5 class="card-header">Your Subscription</h5>
                        <div class="card-body">
                            <table class="table table-borderless table-shopping-cart">
                                <thead class="text-muted">
                                    <tr class="small text-uppercase">
                                        <th scope="col">Start Date</th>
                                        <th scope="col">End Date</th>
                                        <th scope="col" width="120">Invitaions</th>
                                        <th scope="col" width="120">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <figure class="itemside align-items-center">
                                                <figcaption class="info">
                                                    <a href="" class="title text-dark">{{ $user_subscription->start_date }}</a>
                                                </figcaption>
                                            </figure>
                                        </td>
                                        <td>
                                            <figure class="itemside align-items-center">
                                                <figcaption class="info">
                                                    <a href="" class="title text-dark">{{ $user_subscription->end_date }}</a>
                                                </figcaption>
                                            </figure>
                                        </td>
                                        <td>
                                            <!-- col.// -->
                                            <div class="col">
                                                <div class="input-group input-spinner">
                                                    <input type="text" class="form-control" value="{{ $user_subscription->subscription->invitaions }}">
                                                </div> <!-- input-group.// -->
                                            </div> <!-- col.// -->
                                        </td>
                                        <td>
                                            <div class="price-wrap">
                                                <var class="price">{{ $user_subscription->subscription->price }} LE</var>
                                            </div> <!-- price-wrap .// -->
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div> <!-- card.// -->

                </aside> <!-- col.// -->



            </div> <!-- row.// -->
            <div class="col-lg-6 m-auto" id="paypal-button-container"></div>
            <!-- ============================ COMPONENT 1 END .// ================================= -->
        </div> <!-- container .//  -->
    </section>
    <!-- ========================= SECTION CONTENT END// ========================= -->
    <script>
        let url = "http://localhost:8000/api/subscription_payment"
        let total = `{{ $user_subscription->subscription->price }}`
        let user_subscription = `{{ $user_subscription->id }}`
        let payment_method = 'PayPal'
        let redirect_url = "/subscription_complete"
        let user_id = `{{ Auth()->user()->id }}`


        paypal.Buttons({
            // Sets up the transaction when a payment button is clicked
            createOrder: (data, actions) => {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: total // Can also reference a variable or function
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
                                    "total": total,
                                    "transID": transaction.id,
                                    "payment_method": payment_method,
                                    "status": transaction.status,
                                    "user_subscription": user_subscription
                                }),
                            })
                            .then((response) => response.json())
                            .then((data) => {
                                window.location.href = redirect_url + '?user_subscription=' + data.user_subscription + '&payment_id=' + data.transID
                            });
                    }
                    sendData();
                });
            }
        }).render('#paypal-button-container');
    </script>
    <x-includes.footer />
</x-base>