<x-base>

    <x-includes.header :categories="$categories" />

    <section class="section-content padding-y bg">
        <div class="container">
            <!-- ============================ COMPONENT 1 ================================= -->

            <div class="row">
                <aside class="col-lg-6">
                    <div class="card">

                        <div class="card-body">
                            <h4 class="card-title mb-4">Billing Address</h4>
                            <form action="/place_order" method="POST">
                                @csrf
                                <div class="form-row">
                                    <div class="col form-group">
                                        <label for="">First Name</label>
                                        <input type="text" name="first_name" class="form-control" required>

                                        @error('first_name')
                                        <p class="danger text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col form-group">
                                        <label for="">Last Name</label>
                                        <input type="text" name="last_name" class="form-control" required>

                                        @error('last_name')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col form-group">
                                        <label for="">Email</label>
                                        <input type="email" name="email" class="form-control" required>

                                        @error('email')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col form-group">
                                        <label for="">Phone Number</label>
                                        <input type="text" name="phone" class="form-control" required>

                                        @error('phone')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col form-group">
                                        <label for="">Address line 1</label>
                                        <input type="text" name="address_line_1" class="form-control" required>

                                        @error('address_line_1')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col form-group">
                                        <label for="">Address line 2</label>
                                        <input type="text" name="address_line_2" class="form-control">

                                        @error('address_line_2')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col form-group">
                                        <label for="">City</label>
                                        <input type="text" name="city" class="form-control" required>

                                        @error('city')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col form-group">
                                        <label for="">State</label>
                                        <input type="text" name="state" class="form-control" required>

                                        @error('state')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col form-group">
                                        <label for="">Country</label>
                                        <input type="text" name="country" class="form-control" required>

                                        @error('country')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <label for="">Order Note</label>
                                    <textarea name="order_note" rows="2" class="form-control"></textarea>

                                    @error('order_note')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                        </div>

                    </div> <!-- card.// -->
                </aside> <!-- col.// -->
                <aside class="col-lg-6">

                    <div class="card">
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
                                    @foreach($cart_items as $cart_item)
                                    <tr>
                                        <td>
                                            <figure class="itemside align-items-center">
                                                <div class="aside"><img src="{{ asset('storage/' . $cart_item->product->image) }}" class="img-sm"></div>
                                                <figcaption class="info">
                                                    <a href="" class="title text-dark">{{ $cart_item->product->name }}</a>

                                                </figcaption>
                                            </figure>
                                        </td>
                                        <td>
                                            <!-- col.// -->
                                            <div class="col">
                                                <div class="input-group input-spinner">
                                                    <input type="text" class="form-control" value="{{ $cart_item->quantity }}">
                                                </div> <!-- input-group.// -->
                                            </div> <!-- col.// -->
                                        </td>
                                        <td>
                                            <div class="price-wrap">
                                                <var class="price">{{ $cart_item->product->price * $cart_item->quantity }} LE</var>
                                            </div> <!-- price-wrap .// -->
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Place Order</button>
                            </form>
                            <a href="" class="btn btn-light btn-block">Continue Shopping</a>
                        </div> <!-- card-body.// -->
                    </div> <!-- card.// -->
                </aside> <!-- col.// -->


            </div> <!-- row.// -->
            <!-- ============================ COMPONENT 1 END .// ================================= -->
        </div> <!-- container .//  -->
    </section>
    <x-includes.footer />
</x-base>