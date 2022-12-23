<x-base>

    <div class="container" style="margin-top: 50px;">
        <center><i class="fas fa-check-circle" style="font-size: 72px;margin-bottom: 20px;color: #FB5B21;"></i></center>
        <h2 class="text-center">Payment Successful</h2>
        <br>
        <div class="text-center">
            <a href="/store" style="background-color: #FB5B21;color: white;" class="btn">Go Shoping</a>
        </div>
    </div>

    <div class="container" style="margin: 0 auto;width: 50%;padding: 50px;background: #f1f1f1;margin-top: 50px;margin-bottom: 50px;">
        <div class="row invoice row-printable">
            <div class="col-md-12">
                <!-- col-lg-12 start here -->
                <div class="panel panel-default plain" id="dash_0">
                    <!-- Start .panel -->
                    <div class="panel-body p30">
                        <div class="row">
                            <!-- Start .row -->
                            <div class="col-lg-6">
                                <!-- col-lg-6 start here -->
                                <div class="invoice-logo"><img src="./images/logo.png" alt="Invoice logo" style="max-height: 40px;"></div>
                            </div>
                            <!-- col-lg-6 end here -->

                            <!-- col-lg-6 end here -->
                            <div class="col-lg-12">
                                <!-- col-lg-12 start here -->
                                <div class="invoice-details mt25">
                                    <div class="well">
                                        <ul class="list-unstyled mb0">
                                            <li><strong>Transaction</strong> {{ $payment->pay_id }}</li>
                                            <li><strong>Status:</strong> {{ $payment->status }}</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="invoice-items">
                                    <div class="table-responsive" style="overflow: hidden; outline: none;" tabindex="0">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="per70 text-center">START DATE</th>
                                                    <th class="per5 text-center">END DATE</th>
                                                    <th class="per25 text-center">INVITAIONS</th>
                                                    <th class="per25 text-center">PRICE</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center">{{ $user_subscription->start_date }}</td>
                                                    <td class="text-center">{{ $user_subscription->end_date }}</td>
                                                    <td class="text-center">{{ $user_subscription->subscription->invitaions }}</td>
                                                    <td class="text-center">{{ $user_subscription->subscription->price }} LE</td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="2" class="text-right">Total:</th>
                                                    <th class="text-center">${{ $user_subscription->subscription->price }} LE</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div class="invoice-footer mt25">
                                    <h3 class="text-center">Thank you for Your <span style="color: #FB5B21;">Subscription</span> with us!</h3>
                                </div>
                            </div>
                            <!-- col-lg-12 end here -->
                        </div>
                        <!-- End .row -->
                    </div>
                </div>
                <!-- End .panel -->
            </div>
            <!-- col-lg-12 end here -->
        </div>
    </div>

    <x-includes.footer />
</x-base>