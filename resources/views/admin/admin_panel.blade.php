<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/master.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700;900&family=Open+Sans:wght@400;700&family=Roboto:wght@100;300;500&family=Work+Sans:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <title>DashBoard</title>
</head>

<body>
    <div class="main-page">
        <!-- start of menu-bar -->
        <div class="menu-bar">
            <div class="logo">
                <img src="/imgs/logo.png" alt="">
            </div>
            <div class="items">
                <ul>
                    <li class="active"><a href="index.html"><i class="fa-solid fa-chart-simple "></i> <span>Dashboard</span></a></li>
                    <li><a href="#"><i class="fa-solid fa-gear"></i> <span>Settings</span></a></li>
                    <li><a href="#"><i class="fa-regular fa-user"></i> <span>Profile</span></a></li>
                    <li><a href="#"><i class="fa-solid fa-diagram-project"></i> <span>Coaches</span></a></li>
                    <li><a href="#"><i class="fa-solid fa-graduation-cap"></i> <span>Orders</span></a></li>
                    <li><a href="#"><i class="fa-solid fa-user-group"></i><span>Employees</span></a></li>
                    <li><a href="#"><i class="fa-solid fa-file"></i><span>Products</span></a></li>
                    <li><a href="#"><i class="fa-brands fa-studiovinari"></i><span>plans</span></a></li>
                </ul>
            </div>
        </div>
        <!-- end of menu-bar -->

        <!-- start of interface-section -->

        <!-- start of nav-bar -->

        <div class="interface">
            <!-- end of nav-bar -->
            <div class="nav-bar">

                <div class="search">
                    <i class="fa-solid fa-magnifying-glass icon"></i>
                    <input type="search" placeholder="Search" name="" id="">
                </div>

                <div class="icons">
                    <span><i class="fa-regular fa-bell"></i></span>
                    <img src="imgs/avatar.png" alt="">
                </div>

            </div>
            <!-- end of nav-bar -->

            <h3 class="i-name">Dashboard</h3>

            <div class="values">
                <div class="value-box">
                    <div class="icon"> <i class="fas fa-users"></i></div>
                    <div class="data">
                        <div class="numbers">8.267</div>
                        <p>New Tranees</p>
                    </div>
                </div>
                <div class="value-box">
                    <div class="icon"> <i class="fa-solid fa-cart-shopping"></i></div>
                    <div class="data">
                        <div class="numbers">8.267</div>
                        <p>Total Orders</p>
                    </div>
                </div>
                <div class="value-box">
                    <div class="icon"> <i class="fa-brands fa-product-hunt"></i></i></div>
                    <div class="data">
                        <div class="numbers">8.267</div>
                        <p>Product sell</p>
                    </div>
                </div>
                <div class="value-box">
                    <div class="icon"> <i class="fa-solid fa-dollar-sign"></i></div>
                    <div class="data">
                        <div class="numbers">8.267</div>
                        <p>This Month</p>
                    </div>
                </div>
            </div>
            <div class="board">
                <table>
                    <thead>
                        <tr>
                            <td>Name</td>
                            <td>Title</td>
                            <td>Status</td>
                            <td>Role</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="people">
                                <img src="./imgs/avatar-01.png" alt="">
                                <div class="people-de">
                                    <h5>John Doe</h5>
                                    <p>john@example.com</p>
                                </div>
                            </td>
                            <td class="people-des">
                                <h5>Trainee</h5>

                            </td>
                            <td class="active">
                                <p> Active</p>
                            </td>
                            <td class="role">
                                <p>Client</p>
                            </td>
                            <td class="edit"><a href="#">Edit</a></td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <td class="people">
                                <img src="./imgs/avatar-02.png" alt="">
                                <div class="people-de">
                                    <h5>John Doe</h5>
                                    <p>john@example.com</p>
                                </div>
                            </td>
                            <td class="people-des">
                                <h5>Trainee</h5>
                            </td>
                            <td class="active">
                                <p> Active</p>
                            </td>
                            <td class="role">
                                <p>Client</p>
                            </td>
                            <td class="edit"><a href="#">Edit</a></td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <td class="people">
                                <img src="./imgs/avatar-03.png" alt="">
                                <div class="people-de">
                                    <h5>John Doe</h5>
                                    <p>john@example.com</p>
                                </div>
                            </td>
                            <td class="people-des">
                                <h5>Trainee</h5>
                            </td>
                            <td class="active">
                                <p> Active</p>
                            </td>
                            <td class="role">
                                <p>Client</p>
                            </td>
                            <td class="edit"><a href="#">Edit</a></td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <td class="people">
                                <img src="./imgs/avatar-04.png" alt="">
                                <div class="people-de">
                                    <h5>John Doe</h5>
                                    <p>john@example.com</p>
                                </div>
                            </td>
                            <td class="people-des">
                                <h5>Trainee</h5>
                            </td>
                            <td class="active">
                                <p> Active</p>
                            </td>
                            <td class="role">
                                <p>Client</p>
                            </td>
                            <td class="edit"><a href="#">Edit</a></td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <td class="people">
                                <img src="./imgs/team-01.png" alt="">
                                <div class="people-de">
                                    <h5>John Doe</h5>
                                    <p>john@example.com</p>
                                </div>
                            </td>
                            <td class="people-des">
                                <h5>Trainee</h5>
                            </td>
                            <td class="active">
                                <p> Active</p>
                            </td>
                            <td class="role">
                                <p>Client</p>
                            </td>
                            <td class="edit"><a href="#">Edit</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- end of interface-section -->
    </div>


    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/all.min.js"></script>
</body>

</html>