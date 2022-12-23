<x-base2>

    <!-- Start Header -->
    <x-includes.home_header />
    <!-- End Header -->

    <!-- start lasnding -->
    <div class="landing">
        <div class="text">
            <h2>build <span>your</span> body <span>strong</span></h2>
            <p>Ready to change your physique, but can't work out in the gym?</p>
            <a href="./register">Join with us</a>
        </div>
    </div>
    <!-- end lasnding -->


    <!-- start of classes -->
    <div class="all-articles">
        <div class="main-title">Featured Classes</div>
        <div class="container">
            <div class="article">
                <img src="imgs/class1.jpg" alt="">
                <div class="text">
                    <h2>Test Title</h2>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reprehenderit</p>
                </div>
                <div class="more">
                    <a href="#">Details</a>
                    <i class="fas fa-arrow-right"></i>
                </div>
            </div>
            <div class="article">
                <img src="imgs/class-5.jpg" alt="">
                <div class="text">
                    <h2>Test Title</h2>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reprehenderit</p>
                </div>
                <div class="more">
                    <a href="#">Details</a>
                    <i class="fas fa-arrow-right"></i>
                </div>
            </div>
            <div class="article">
                <img src="imgs/class-3.jpg" alt="">
                <div class="text">
                    <h2>Test Title</h2>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reprehenderit</p>
                </div>
                <div class="more">
                    <a href="#">Details</a>
                    <i class="fas fa-arrow-right"></i>
                </div>
            </div>
            <div class="article">
                <img src="imgs/class-7.jpg" alt="">
                <div class="text">
                    <h2>Test Title</h2>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reprehenderit</p>
                </div>
                <div class="more">
                    <a href="#">Details</a>
                    <i class="fas fa-arrow-right"></i>
                </div>
            </div>
        </div>
        <a href="" class="all">See all</a>
    </div>

    <!-- end of classes -->
    <!-- start of trainers-->
    <div class="trainers">
        <div class="main-title">Expert Trainers</div>
        <div class="container">
            <div class="trainer">
                <div class="image">
                    <img src="./imgs/trainer-360x360 (1).jpg" alt="">
                    <div class="social">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>

                </div>

                <h2>John Doe</h2>
                <p>Fitness Trainer</p>

            </div>
            <div class="trainer">
                <div class="image">
                    <div class="social">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                    <img src="./imgs/trainer_2-360x360 (1).jpg" alt="">
                </div>
                <h2> Selina Staurt</h2>
                <p>Fitness Trainer</p>
            </div>
            <div class="trainer">
                <div class="image">
                    <img src="./imgs/trainer_4-360x360 (1).jpg" alt="">
                    <div class="social">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <h2>Jecy Deuko</h2>
                <p>Fitness Trainer</p>
            </div>
            <div class="trainer">
                <div class="image">
                    <img src="./imgs/trainer_3-360x360 (1).jpg" alt="">
                    <div class="social">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <h2><a style="color: black;" href="/trainer">David Smith</a></h2>
                <p>Fitness Trainer</p>
            </div>
        </div>
        <a href="" class="all">See all</a>
    </div>
    <!-- end of trainers -->


    <!-- start Pricing -->
    <div class="pricing">
        <div class="main-title">Our Pricing Plan</div>
        <div class="container">

            <div class="plans">
                @foreach($subscriptions as $subscription)
                <form action="/create_sub/{{ $subscription->id }}" method="POST">
                    @csrf
                    <div class="plan" style="padding-bottom: 10px;">
                        <div class="head">
                            <h3>Basic</h3>
                            <span>{{ $subscription->price }}</span>
                        </div>
                        <ul>
                            <li><strong style="color: #fb5b21;">DURATION:</strong> <span>
                                    @if($subscription->duration > 1)
                                    {{ $subscription->duration }} Months
                                    @else
                                    {{ $subscription->duration }} Month
                                    @endif
                                </span></li>
                            <li><strong style="color: #fb5b21;">INVITAIONS:</strong> <span>
                                    {{ $subscription->invitaions }} Invitaions
                                </span></li>
                        </ul>
                        @auth
                        <div class="foot">
                            <button style="text-decoration: none;color: black;border:none;background:none;">Book Now</button>
                        </div>
                        @else
                        <div class="foot">
                            <a href="/login" style="text-decoration: none;color: black;border:none;background:none;">JOIN US</a>
                        </div>
                        @endauth
                    </div>
                </form>
                @endforeach
            </div>
        </div>
    </div>
    <!-- end of prices -->

    <div class="store">
        <div class="main-title">Our online store</div>
        <div class="container">
            <div class="products">
                @foreach($products as $product)
                <div class="product">
                    <img style="width: 280px;height: 230px;" src="{{ asset('storage/' . $product->image) }}" alt="">
                    <h2><a href="/{{ $product->slug }}" class="title">{{ $product->name }}</a></h2>
                    <div class="price-wrap mt-2">
                        <span class="price">{{ $product->price }} LE</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <a href="/store" class="all">Shop Now</a>
    </div>

</x-base2>