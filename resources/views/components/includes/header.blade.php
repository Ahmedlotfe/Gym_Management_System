@props(["categories"])

<header class="section-header">
    <nav class="navbar p-md-0 navbar-expand-sm navbar-light border-bottom">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTop4" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTop4">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link"> English </a>

                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link"> USD </a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li><a href="#" class="nav-link"> <i class="fa fa-envelope"></i> Email </a></li>
                    <li><a href="#" class="nav-link"> <i class="fa fa-phone"></i> Call us </a></li>
                </ul> <!-- list-inline //  -->
            </div> <!-- navbar-collapse .// -->
        </div> <!-- container //  -->
    </nav>

    <section class="header-main border-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-2 col-md-3 col-6">
                    <a href="./" class="brand-wrap">
                        <img class="logo" src="./images/logo.png">
                    </a> <!-- brand-wrap.// -->
                </div>
                <div class="col-lg col-sm col-md col-6 flex-grow-0">
                    <div class="category-wrap dropdown d-inline-block float-right">
                        <button style="background-color: #FB5B21;color: white;" type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bars"></i> All category
                        </button>
                        <div class="dropdown-menu">
                            @foreach($categories as $category)
                            <a class="dropdown-item" href="/store?category={{ $category->slug }}">{{ ucwords($category->name) }}</a>
                            @endforeach
                        </div>
                    </div> <!-- category-wrap.// -->
                </div> <!-- col.// -->
                <a href="./store" style="background-color: #FB5B21;color: white;" type="button" class="btn">Store</a>
                <div class="col-lg  col-md-6 col-sm-12 col">
                    <form action="/store" class="search">
                        <div class="input-group w-100">
                            <input type="text" class="form-control" style="width:60%;" placeholder="Search" name="search" value="{{ request('search') }}">

                            <div class="input-group-append">
                                <button style="background-color: #FB5B21;color: white;" type="button" class="btn" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form> <!-- search-wrap .end// -->
                </div> <!-- col.// -->
                <div class="col-lg-3 col-sm-6 col-8 order-2 order-lg-3">
                    <div class="d-flex justify-content-end mb-3 mb-lg-0">
                        <div class="widget-header">
                            @auth
                            <small class="title text-muted">Welcome {{ auth()->user()->name }}</small>
                            @else
                            <small class="title text-muted">Welcome Guest!</small>
                            @endauth
                            <div>
                                @auth
                                <form style="display: inline;" action="/logout" method="post">
                                    @csrf
                                    <!-- <input class="btn-primary" type="submit" value="Log Out"> -->
                                    <!-- <a href="/logout">Log Out</a> <span class="dark-transp"> | </span> -->
                                    <button style="background-color: #FB5B21;color: white;" class="btn">
                                        Log Out
                                    </button>
                                    <span class="dark-transp"> | </span>
                                </form>
                                <a href="/dashboard"> Dashboard</a>
                                @else
                                <a href="/login">Sign in</a> <span class="dark-transp"> | </span>
                                <a href="/register"> Register</a>
                                @endauth
                            </div>
                        </div>
                        <a href="/cart" class="widget-header pl-3 ml-3">
                            @auth
                            <div class="icon icon-sm rounded-circle border"><i class="fa fa-shopping-cart"></i></div>
                            <span class="badge badge-pill badge-danger notify">{{ Auth()->user()->cartItems(); }}</span>
                            @endauth
                        </a>
                    </div> <!-- widgets-wrap.// -->
                </div> <!-- col.// -->
            </div> <!-- row.// -->
        </div> <!-- container.// -->
    </section> <!-- header-main .// -->




</header> <!-- section-header.// -->