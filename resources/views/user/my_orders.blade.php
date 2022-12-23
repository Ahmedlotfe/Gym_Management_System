<x-base>

    <x-includes.header :categories="$categories" />

    <section class="section-conten padding-y bg">
        <div class="container">
            <div class="row">
                <x-includes.dashboard_sidebar />
                <main class="col-md-9">
                    <article class="card">
                        <header class="card-header">
                            <strong class="d-inline-block mr-3">Your orders history</strong>
                        </header>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Order #</th>
                                                <th scope="col">Billing Name</th>
                                                <th scope="col">Phone</th>
                                                <th scope="col">Order Total</th>
                                                <th scope="col">Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($orders as $order)
                                            <tr>
                                                <th scope="row"><a href="/order_detail?id={{$order->id}}">{{ $order->order_number }}</a></th>
                                                <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                                                <td>{{ $order->phone }}</td>
                                                <td>{{ $order->order_total }} LE</td>
                                                <td>{{ $order->created_at }}</td>
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