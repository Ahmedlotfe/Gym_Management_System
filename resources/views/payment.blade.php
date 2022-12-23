<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Edge</title>
    <!--Rander all elements normally-->
    <link rel="stylesheet" href="css/normalize.css" />
    <!--Main CSS-->
    <link rel="stylesheet" href="css/elzero.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="js/all.min.js">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;700&display=swap" rel="stylesheet" />
</head>

<body>
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
            <h4 class="text-center mb-20">Review Your Order and Make Payment</h4>
            <div class="row">

                <aside class="col-lg-8">
                    <div class="card">
                        <h5 class="card-header">Billing Address</h5>
                        <div class="card-body">
                            <p class="card-text mb-0">name</p>
                            <p class="card-text mb-0">state</p>
                            <p class="card-text mb-0">country</p>
                            <p class="card-text mb-0">email</p>
                            <p class="card-text mb-0">phone</p>
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

                                    <tr>
                                        <td>
                                            <figure class="itemside align-items-center">
                                                <figcaption class="info">
                                                    <a href="" class="title text-dark"></a>
                                                </figcaption>
                                            </figure>
                                        </td>
                                        <td>
                                            <!-- col.// -->
                                            <div class="col">
                                                <div class="input-group input-spinner">
                                                    <input type="text" class="form-control" value="3">
                                                </div> <!-- input-group.// -->
                                            </div> <!-- col.// -->
                                        </td>
                                        <td>
                                            <div class="price-wrap">
                                                <var class="price">$300</var>
                                                <small class="text-muted"> $200 each </small>
                                            </div> <!-- price-wrap .// -->
                                        </td>

                                    </tr>
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
                                <dd class="text-right">$200</dd>
                            </dl>
                            <dl class="dlist-align">
                                <dt>Tax:</dt>
                                <dd class="text-right"> $100</dd>
                            </dl>
                            <dl class="dlist-align">
                                <dt>Grand Total:</dt>
                                <dd class="text-right text-dark b"><strong>$500</strong></dd>
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

</body>

</html>