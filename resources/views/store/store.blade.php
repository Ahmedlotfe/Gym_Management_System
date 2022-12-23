<x-base>
    <x-includes.header :categories="$categories" />

    <!-- ========================= SECTION PAGETOP ========================= -->
    <section class="section-pagetop bg">
        <div class="container">
            <h2 class="title-page">Our Store</h2>

        </div> <!-- container //  -->
    </section>
    <!-- ========================= SECTION INTRO END// ========================= -->


    <!-- ========================= SECTION CONTENT ========================= -->
    <section class="section-content padding-y">
        <div class="container">

            <div class="row">
                <main class="col-md-12">

                    <header class="border-bottom mb-4 pb-3">
                        <div class="form-inline">
                            <span class="mr-md-auto">{{ $products->count() }} Items found </span>

                        </div>
                    </header><!-- sect-heading -->

                    <div class="row">
                        @foreach($products as $product)
                        <div class="col-md-4">
                            <figure class="card card-product-grid">
                                <div class="img-wrap">

                                    <img src="{{ asset('storage/' . $product->image) }}">

                                </div> <!-- img-wrap.// -->
                                <figcaption class="info-wrap">
                                    <div class="fix-height">
                                        <a href="/{{ $product->slug }}" class="title">{{ $product->name }}</a>
                                        <div class="price-wrap mt-2">
                                            <span class="price">{{ $product->price }} LE</span>
                                        </div> <!-- price-wrap.// -->
                                    </div>
                                    <a href="/{{ $product->slug }}" class="btn btn-block btn-primary">Product Details</a>
                                </figcaption>
                            </figure>
                        </div> <!-- col.// -->
                        @endforeach
                    </div> <!-- row end.// -->

                </main> <!-- col.// -->

            </div>

        </div> <!-- container .//  -->
    </section>

    <!-- ========================= SECTION CONTENT END// ========================= -->
    <x-includes.footer />
</x-base>