<x-base>

    <x-includes.header :categories="$categories" />

    <section class="section-conten padding-y bg">
        <div class="container">
            <div class="row">
                <x-includes.dashboard_sidebar />
                <main class="col-md-9">
                    <article class="card">
                        <header class="card-header">
                            <strong class="d-inline-block mr-3">Your Subscriptions</strong>
                        </header>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">START DATE</th>
                                                <th scope="col">END DATE</th>
                                                <th scope="col">INVITAIONS</th>
                                                <th scope="col">PRICE</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($user_subscriptions as $user_subscription)
                                            <tr>
                                                <td>{{ $user_subscription->start_date }}</td>
                                                <td>{{ $user_subscription->end_date }}</td>
                                                <td>{{ $user_subscription->subscription->invitaions }}</td>
                                                <td>{{ $user_subscription->subscription->price }} LE</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div> <!-- row.// -->
                        </div> <!-- card-body .// -->

                    </article> <!-- order-group.// -->
                </main>
            </div> <!-- row.// -->
        </div>

    </section>

    <x-includes.footer />

</x-base>