<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SpaceFinder</title>
    <link rel="shortcut icon" type="x-icon" href="../Img/Logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <!-- Google Web Fonts -->
         
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">  

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=person" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href=" LP After Login.css">
    <script src=" LP After Login.js"></script>
</head>

<body>
    <!-- Loading Spinner -->
    <div id="loadingSpinner">
        <div class="spinner-border text-primary" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
      </div>
    <!-- Loading Spinner -->
     
    <?php
session_start();
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="../Img/Logo.png" alt="Logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav nav nav-pills mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#Home" style="color: white;">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#About">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="..//Room Page/RoomPage.html">Rooms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Booking">Enquiry</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#team">Our Team</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="../PropertyListPage/property.html" style="color: white;">Rent Your Property</a>
                    </li>
                </ul>
    
            <div class="d-flex">
                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']): ?>
                    <span class="navbar-text">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>! &nbsp</span>
                <?php else: ?>
                    <button type="button" class="btn btn-outline-primary me-2" data-bs-toggle="modal" data-bs-target="#signInModal">Sign In</button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">Log In</button>
                <?php endif; ?>
                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']): ?>
    <a href="logout.php" class="btn btn-danger">Log Out</a>
<?php endif; ?>

            </div>
        </div>
    </div>
</nav>
<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Log In</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="login.php" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Log In</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Sign Up Modal -->
<div class="modal fade" id="signInModal" tabindex="-1" aria-labelledby="signInModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signInModalLabel">Sign Up</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="signup.php" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Enter Username</label>
                        <input type="text" class="form-control" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Sign Up</button>
                </form>
            </div>
        </div>
    </div>
</div>

    <!-- Carousel -->
    <div class="custom-jumbotron">
        <div id="luxuryCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <!-- Slide 1 -->
                <div class="carousel-item active"
                    style="background-image: url('https://i.pinimg.com/736x/79/f6/b9/79f6b9d476d942a67e0411f8857b832d.jpg'); background-size: cover; background-position: center; height: 75vh;">
                    <div class="carousel-caption text-center">
                        <h1 class="display-4 fw-bold d-none d-md-block">Find Spaces <br> At Affordable</h1>
                        <h2 class="fs-4 fw-bold d-md-none">Find Spaces At Affordable</h2>
                        <p class="text-white lead d-none d-md-block">Luxury living like never before</p>
                        <p class="text-white d-md-none">Luxury living like never before</p>
                        <div>
                            <a href="..//Room Page/RoomPage.html" class="btn btn-custom btn-primary m-1">Our Rooms</a>
                            <a href="#Booking" class="btn btn-custom btn-secondary m-1">Enquiry</a>
                        </div>
                    </div>
                </div>
                <!-- Slide 2 -->
                <div class="carousel-item"
                    style="background-image: url('https://i.pinimg.com/736x/79/f6/b9/79f6b9d476d942a67e0411f8857b832d.jpg'); background-size: cover; background-position: center; height: 75vh;">
                    <div class="carousel-caption text-center">
                        <h1 class="display-4 fw-bold d-none d-md-block">Experience Paradise</h1>
                        <h2 class="fs-4 fw-bold d-md-none">Experience Paradise</h2>
                        <p class="text-white lead d-none d-md-block">Relax and rejuvenate in style</p>
                        <p class="text-white d-md-none">Relax and rejuvenate in style</p>
                        <div>
                            <a href="..//Room Page/RoomPage.html" class="btn btn-custom btn-primary m-1">Our Rooms</a>
                            <a href="#Booking" class="btn btn-custom btn-secondary m-1">Enquiry</a>
                        </div>
                    </div>
                </div>
                <!-- Slide 3 -->
                <div class="carousel-item"
                    style="background-image: url('https://i.pinimg.com/736x/79/f6/b9/79f6b9d476d942a67e0411f8857b832d.jpg'); background-size: cover; background-position: center; height: 75vh;">
                    <div class="carousel-caption text-center">
                        <h1 class="display-4 fw-bold d-none d-md-block">Welcome to SpaceFinder</h1>
                        <h2 class="fs-4 fw-bold d-md-none">Welcome to SpaceFinder</h2>
                        <p class="text-white lead d-none d-md-block">Unwind in unparalleled comfort</p>
                        <p class="text-white d-md-none">Unwind in unparalleled comfort</p>
                        <div>
                            <a href="..//Room Page/RoomPage.html" class="btn btn-custom btn-primary m-1">Our Rooms</a>
                            <a href="#Booking" class="btn btn-custom btn-secondary m-1">Enquiry</a>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- Carousel Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#luxuryCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#luxuryCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel -->
    

     <!-- About Section -->
    <div class="container-xxl" id="About">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <h6 class="section-title text-start text-uppercase mb-4 logoname">About Us</h6>
                    <h1 class="mb-4">Welcome to <span class=" text-uppercase logoname">Space Finder</span></h1>
                    <p class="mb-4 text-muted">Space Finder provides affordable, fully furnished rental accommodations with flexible 11-month agreements, ideal for students and working professionals. Whether you're looking for a quiet study space or a comfortable home, we offer well-maintained rooms for men and women, ensuring a convenient and hassle-free stay.</p>
                    <div class="row g-3 pb-4">
                        <div class="col-sm-4 wow fadeIn" data-wow-delay="0.1s">
                            <div class="border rounded p-4 shadow-lg text-center bg-white">
                                <i class="fa fa-hotel fa-3x mb-3" style="color: #ffa500;"></i>
                                <h2 class="mb-1" data-toggle="counter-up">10</h2>
                                <p class="mb-0 text-muted">Rooms</p>
                            </div>
                        </div>
                        <div class="col-sm-4 wow fadeIn" data-wow-delay="0.3s">
                            <div class="border rounded p-4 shadow-lg text-center bg-white">
                                <i class="fa fa-users-cog fa-3x mb-3" style="color: #ffa500;"></i>
                                <h2 class="mb-1" data-toggle="counter-up">5</h2>
                                <p class="mb-0 text-muted">Team</p>
                            </div>
                        </div>
                        <div class="col-sm-4 wow fadeIn" data-wow-delay="0.5s">
                            <div class="border rounded p-4 shadow-lg text-center bg-white">
                                <i class="fa fa-users fa-3x mb-3" style="color: #ffa500;"></i>
                                <h2 class="mb-1" data-toggle="counter-up">10</h2>
                                <p class="mb-0 text-muted">Clients</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row g-3">
                        <div class="col-6 text-end">
                            <img class="img-fluid rounded shadow-lg wow zoomIn" src="https://is1-3.housingcdn.com/01c16c28/decea1852d6c7f4abd99a4d0ab9500ec/v0/fs/4_bhk_independent_house-for-rent-agarpara-Kolkata-bedroom_four.jpg" style="margin-top: 25%; transition: transform 0.3s ease;">
                        </div>
                        <div class="col-6 text-end">
                            <img class="img-fluid rounded shadow-lg wow zoomIn" src="https://images.pexels.com/photos/1643383/pexels-photo-1643383.jpeg?cs=srgb&dl=pexels-fotoaibe-1643383.jpg&fm=jpg" style="margin-top: 25%; transition: transform 0.3s ease;">
                        </div>
                        <div class="col-6 text-end">
                            <img class="img-fluid rounded shadow-lg wow zoomIn" src="https://media.designcafe.com/wp-content/uploads/2023/07/05141750/aesthetic-room-decor.jpg" style="transition: transform 0.3s ease;">
                        </div>
                        <div class="col-6 text-end">
                            <img class="img-fluid rounded shadow-lg wow zoomIn" src="https://img.squareyards.com/secondaryPortal/638588830546355688-1008241037343734.jpg" style="transition: transform 0.3s ease;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
    <!-- Room Start -->
    <div class="container-xxl py-5" id="Room">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-center text-uppercase logoname">---Our Rooms---</h6>
                <h1 class="mb-5">Explore Our <span class="logoname text-uppercase">Rooms</span></h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="room-item shadow rounded overflow-hidden">
                        <div class="position-relative">
                            <img class="img-fluid" src="https://imganuncios.mitula.net/3_bhk_independent_house_in_salt_lake_city_for_rent_kolkata_the_reference_number_is_15830898_7450000732015715882.jpg" alt="">
                            <small class="position-absolute start-0 top-100 translate-middle-y text-white rounded py-1 px-3 ms-4" style="background-color: #ffa500;">₹5000/Month</small>
                        </div>
                        <div class="p-4 mt-2">
                            <div class="d-flex justify-content-between mb-3">
                                <h5 class="mb-0">At Barasat</h5>
                                <div class="ps-2">
                                    <small class="fa fa-star" style="color: #ffa500;"></small>
                                    <small class="fa fa-star" style="color: #ffa500;"></small>
                                    <small class="fa fa-star" style="color: #ffa500;"></small>
                                    <small class="fa fa-star" style="color: #ffa500;"></small>
                                    <small class="fa fa-star" style="color: #ffa500;"></small>
                                </div>
                            </div>
                            <div class="d-flex mb-3">
                                <small class="border-end me-3 pe-3"><i class="fa fa-bed me-2" style="color: #ffa500;"></i>3 Bed</small>
                                <small class="border-end me-3 pe-3"><i class="fa fa-bath me-2" style="color: #ffa500;"></i>1 Bath</small>
                                <small><i class="fa fa-wifi me-2" style="color: #ffa500;"></i>Wifi Free</small>
                            </div>
                            <p class="text-body mb-3">🏠Home for Rent! Just ₹3000/month with FREE WiFi!✨</p>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-sm btn-primary rounded py-2 px-4" data-bs-toggle="modal" data-bs-target="#detailsModal">View Detail</button>
                                <a class="btn btn-sm btn-primary rounded py-2 px-4" style="background-color: black;" href="BookingPage/BookingPage.html">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="room-item shadow rounded overflow-hidden">
                        <div class="position-relative">
                            <img class="img-fluid" src="https://is1-2.housingcdn.com/01c16c28/f87e1a41a0f741df3f2249a2254d71d8/v0/fs/2_bhk_apartment-for-rent-vip_nagar-Kolkata-living_room.jpg" alt="">
                            <small class="position-absolute start-0 top-100 translate-middle-y text-white rounded py-1 px-3 ms-4" style="background-color: #ffa500;">₹2000/Month</small>
                        </div>
                        <div class="p-4 mt-2">
                            <div class="d-flex justify-content-between mb-3">
                                <h5 class="mb-0">At Belgharia</h5>
                                <div class="ps-2">
                                    <small class="fa fa-star" style="color: #ffa500;"></small>
                                    <small class="fa fa-star" style="color: #ffa500;"></small>
                                    <small class="fa fa-star" style="color: #ffa500;"></small>
                                    <small class="fa fa-star" style="color: #ffa500;"></small>
                                </div>
                            </div>
                            <div class="d-flex mb-3">
                                <small class="border-end me-3 pe-3"><i class="fa fa-bed me-2" style="color: #ffa500;"></i>2 Bed</small>
                                <small class="border-end me-3 pe-3"><i class="fa fa-bath me-2" style="color: #ffa500;"></i>1 Bath</small>
                                <small><i class="fa fa-wifi me-2" style="color: #ffa500;"></i>200/-Wifi</small>
                            </div>
                            <p class="text-body mb-3">🏠Cozy Home for Rent! Just ₹2000/month with RS 200/- WiFi!✨</p>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-sm btn-primary rounded py-2 px-4" data-bs-toggle="modal" data-bs-target="#detailsModal2">View Detail</button>
                                <a class="btn btn-sm btn-primary rounded py-2 px-4" style="background-color: black;" href="BookingPage/BookingPage.html">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="room-item shadow rounded overflow-hidden">
                        <div class="position-relative">
                            <img class="img-fluid" src="https://is1-3.housingcdn.com/01c16c28/e2daf2296b3c42c465480a2cc3d6f6bb/v0/fs/1_rk_independent_house-for-rent-newtown-Kolkata-bedroom.jpg" alt="">
                            <small class="position-absolute start-0 top-100 translate-middle-y text-white rounded py-1 px-3 ms-4" style="background-color: #ffa500;">₹3000/Month</small>
                        </div>
                        <div class="p-4 mt-2">
                            <div class="d-flex justify-content-between mb-3">
                                <h5 class="mb-0">At DumDum</h5>
                                <div class="ps-2">
                                    <small class="fa fa-star"style="color: #ffa500;"></small>
                                    <small class="fa fa-star"style="color: #ffa500;"></small>
                                    <small class="fa fa-star"style="color: #ffa500;"></small>
                                    <small class="fa fa-star"style="color: #ffa500;"></small>
                                    <small class="fa fa-star"style="color: #ffa500;"></small>
                                </div>
                            </div>
                            <div class="d-flex mb-3">
                                <small class="border-end me-3 pe-3"><i class="fa fa-bed me-2" style="color: #ffa500;"></i>3 Bed</small>
                                <small class="border-end me-3 pe-3"><i class="fa fa-bath me-2" style="color: #ffa500;"></i>1 Bath</small>
                                <small><i class="fa fa-wifi me-2" style="color: #ffa500;"></i>Wifi Free</small>
                            </div>
                            <p class="text-body mb-3">🏠Home for Rent! Just ₹3000/month with FREE WiFi!✨</p>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-sm btn-primary rounded py-2 px-4" data-bs-toggle="modal" data-bs-target="#detailsModal2">View Detail</button>
                                <a class="btn btn-sm btn-primary rounded py-2 px-4" style="background-color: black;" href="BookingPage/BookingPage.html">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <!-- Modal 1: Details Modal -->
<div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="detailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailsModalLabel">Room Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Modal within Modal -->
                <div class="row">
                    <div class="col-md-6">
                        <img src="https://imganuncios.mitula.net/3_bhk_independent_house_in_salt_lake_city_for_rent_kolkata_the_reference_number_is_15830898_7450000732015715882.jpg" class="img-fluid rounded" alt="Room Image 1">
                    </div>
                    <div class="col-md-6">
                        <img src="https://is1-2.housingcdn.com/01c16c28/8778062ffdfb47f2d0cf29e2f4764f92/v1/fs/2_bhk_independent_house-for-rent-belghoria-Kolkata-bedroom.jpg" class="img-fluid rounded" alt="Room Image 2">
                    </div>
                </div>
                <p class="mt-3">This Room offers a spacious layout with modern amenities, including a comfortable bed, fully equipped bathroom, and high-speed WiFi. Ideal for students or professionals who need a peaceful and convenient living space. Located in a prime area, this suite promises a comfortable stay for all guests.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal 2: Details Modal -->
<div class="modal fade" id="detailsModal2" tabindex="-1" aria-labelledby="detailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailsModalLabel">Room Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Modal within Modal -->
                <div class="row">
                    <div class="col-md-6">
                        <img src="https://imganuncios.mitula.net/3_bhk_independent_house_in_salt_lake_city_for_rent_kolkata_the_reference_number_is_15830898_7450000732015715882.jpg" class="img-fluid rounded" alt="Room Image 1">
                    </div>
                    <div class="col-md-6">
                        <img src="https://is1-2.housingcdn.com/01c16c28/89cbfbdb42f50cb3c0ab9cb85ae38be6/v0/fs/2_bhk_independent_house-for-rent-mukundapur_kolkata-Kolkata-hall.jpg" class="img-fluid rounded" alt="Room Image 2">
                    </div>
                </div>
                <p class="mt-3">This Room offers a spacious layout with modern amenities, including a comfortable bed, fully equipped bathroom, and high-speed WiFi. Ideal for students or professionals who need a peaceful and convenient living space. Located in a prime area, this suite promises a comfortable stay for all guests.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal 3: Details Modal -->
<div class="modal fade" id="detailsModal3" tabindex="-1" aria-labelledby="detailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailsModalLabel">Room Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Modal within Modal -->
                <div class="row">
                    <div class="col-md-6">
                        <img src="https://imganuncios.mitula.net/3_bhk_independent_house_in_salt_lake_city_for_rent_kolkata_the_reference_number_is_15830898_7450000732015715882.jpg" class="img-fluid rounded" alt="Room Image 1">
                    </div>
                    <div class="col-md-6">
                        <img src="https://dynamic.realestateindia.com/prop_images/3245835/1214433_1-350x350.jpg" class="img-fluid rounded" alt="Room Image 2">
                    </div>
                </div>
                <p class="mt-3">This Room offers a spacious layout with modern amenities, including a comfortable bed, fully equipped bathroom, and high-speed WiFi. Ideal for students or professionals who need a peaceful and convenient living space. Located in a prime area, this suite promises a comfortable stay for all guests.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
    <!-- Room End -->

   <!-- Booking Section Start -->
<div class="container-xxl py-5" id="Booking">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title text-center text-uppercase logoname">---Enquiry---</h6>
            <h1 class="mb-5">Enquiry For <span class="logoname text-uppercase">Stay</span></h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <form class="bg-light shadow rounded p-4" id="bookingForm" action="submit_enquiry.php" method="post">
                    <div class="row g-3">
                        <!-- Username -->
                        <div class="col-md-6">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
                        </div>
                        <!-- Email -->
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                        </div>
                        <!-- Phone -->
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" required>
                        </div>
                        <!-- Booking Date -->
                        <div class="col-md-6">
                            <label for="bookingDate" class="form-label">Booking Date</label>
                            <input type="date" class="form-control" id="bookingDate" name="bookingDate" required>
                        </div>
                        <!-- Room Type -->
                        <div class="col-md-6">
                            <label for="roomType" class="form-label">Room Type</label>
                            <select class="form-select" id="roomType" name="roomType" required>
                                <option selected disabled>Select Room Type</option>
                                <option value="Single Room">Single Room</option>
                                <option value="Double Room">Double Room</option>
                                <option value="Family Suite">Family Suite</option>
                            </select>
                        </div>
                        <!-- Location Dropdown -->
                        <div class="col-md-6">
                            <label for="location" class="form-label">Which Location You Stay?</label>
                            <select class="form-select" id="location" name="location" required>
                                <option selected disabled>Select Location</option>
                                <option value="Barasat">Barasat</option>
                                <option value="Belgharia">Belgharia</option>
                                <option value="DumDum">DumDum</option>
                                <option value="Newtown">Newtown</option>
                                <option value="Salt Lake">Salt Lake</option>
                            </select>
                        </div>
                        <!-- Special Requests -->
                        <div class="col-12">
                            <label for="message" class="form-label">Special Requests</label>
                            <textarea class="form-control" id="message" name="message" rows="3" placeholder="Add any special requests..."></textarea>
                        </div>
                        <!-- Submit Button -->
                        <div class="col-12 text-center">
                            <button type="submit" name="submit" class="btn btn-primary py-2 px-4 rounded">Submit</button>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>
<!-- Booking Section End -->


     <!-- Service Section -->
    <section id="services" class="py-5">
        <div class="container text-center">
          <h6 class=" mb-3 logoname">--OUR SERVICES--</h6>
          <h1 class="mb-5">Explore Our <span class=" logoname">SERVICES</span></h1>
          <div class="row g-4 mt-4">
            <!-- Card 1 -->
            <div class="col-md-4">
              <div class="card h-100 shadow-sm border-0">
                <div class="card-body text-center">
                  <div class="icon mb-3">
                    <img src="https://img.icons8.com/color/64/000000/building.png" alt="Rooms Icon" />
                  </div>
                  <h5 class="card-title fw-bold">House Rent</h5>
                  <p class="card-text text-muted">
                    <li>Affordable rental homes tailored to your needs.</li>
                    <li>Hassle-free renting with 24/7 support.</li>
                    <li>Well-maintained homes in prime locations.</li>
                  </p>
                </div>
              </div>
            </div>
            <!-- Card 2 -->
            <div class="col-md-4">
              <div class="card h-100 shadow-sm border-0">
                <div class="card-body text-center">
                  <div class="icon mb-3">
                    <img src="https://img.icons8.com/color/64/000000/restaurant.png" alt="Food Icon" />
                  </div>
                  <h5 class="card-title fw-bold">Food And Restaurant</h5>
                  <p class="card-text text-muted">
                    <li>Excellence in every bite, served with a smile.</li>
                    <li>Quick, friendly, top-notch service.</li>
                    <li>Great food, impeccable service.</li>
                  </p>
                </div>
              </div>
            </div>
            <!-- Card 3 -->
            <div class="col-md-4">
              <div class="card h-100 shadow-sm border-0">
                <div class="card-body text-center">
                  <div class="icon mb-3">
                    <img src="https://img.icons8.com/color/64/000000/building.png" alt="Spa Icon" />
                  </div>
                  <h5 class="card-title fw-bold">Night Stay Rooms</h5>
                  <p class="card-text text-muted">
                    <li>24/7 Support: Always here for you.</li>
                    <li>Clean Rooms: Hygienic and cozy spaces.</li>
                    <li>Quick Check-in: Smooth and easy process.</li>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Service Section -->
      <!-- Testimonial Start -->
      <h1 class="mb-5 text-center">Customer <span class=" logoname">FEEDBACKS</span></h1>
<div class="container-xxl testimonial my-5 py-5 bg-dark text-white">
    <div class="container">
        <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <!-- Testimonial Item 1 -->
                <div class="carousel-item active review">
                    <div class="testimonial-item bg-white text-dark rounded p-4 position-relative">
                        <p>The house is spacious, well-maintained, and in a great location. The landlord is friendly and responsive!</p>
                        <div class="d-inline-flex align-items-start">
                            <img class="img-fluid flex-shrink-0 rounded" src="https://i.pinimg.com/474x/43/9e/2b/439e2b3ef4ee8547b20a8a2ed0a0d152.jpg" alt="Client Image" style="width: 45px; height: 45px;">
                            <div class="ps-3">
                                <h6 class="fw-bold mb-1">Purba Das</h6>
                                <small>Student</small>
                            </div>
                        </div>
                        <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i>
                    </div>
                </div>
                <!-- Testimonial Item 2 -->
                <div class="carousel-item">
                    <div class="testimonial-item bg-white text-dark rounded p-4 position-relative">
                        <p>Lovely home with a cozy atmosphere. Perfect for students, and the rent is reasonable!</p>
                        <div class="d-inline-flex align-items-start">
                            <img class="img-fluid flex-shrink-0 rounded" src="https://img.freepik.com/free-photo/friendly-confident-woman-writing-her-organizer-isolated-white-wall_231208-1176.jpg" alt="Client Image" style="width: 45px; height: 45px;">
                            <div class="ps-3">
                                <h6 class="fw-bold mb-1">Prapti Das</h6>
                                <small>Student</small>
                            </div>
                        </div>
                        <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i>
                    </div>
                </div>
                <!-- Testimonial Item 3 -->
                <div class="carousel-item">
                    <div class="testimonial-item bg-white text-dark rounded p-4 position-relative">
                        <p>Overall, a decent place, but some maintenance issues need attention, like plumbing and electricity.</p>
                        <div class="d-inline-flex align-items-start">
                            <img class="img-fluid flex-shrink-0 rounded" src="https://media.istockphoto.com/id/1222372717/photo/indian-young-girl-stock-images.jpg?s=612x612&w=0&k=20&c=OYtnDHPUcBMzT_CYBKETl1_f5DFOCHfXo3hY0R9pinM=" alt="Client Image" style="width: 45px; height: 45px;">
                            <div class="ps-3">
                                <h6 class="fw-bold mb-1">Shilpa Roy</h6>
                                <small>Student</small>
                            </div>
                        </div>
                        <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i>
                    </div>
                </div>
            </div>
            <!-- Carousel Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>
<!-- Testimonial End -->

<!-- Refund Section -->
<div class="container py-5">
    <h6 class=" mb-3 logoname text-center">--Refund Process--</h6>
    <h1 class="text-center mb-4">Refund <span class="logoname">Request</span></h1>
    <div class="row justify-content-center">
        <!-- Refund Form -->
        <div class="col-md-8">
            <div class=" shadow-lg p-4">
                <form action="submit_refund.php" method="POST">
                    <!-- Username -->
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" required>
                    </div>

                    <!-- Amount -->
                    <div class="mb-3">
                        <label for="amount" class="form-label">Refund Amount</label>
                        <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter Amount" step="0.01" required>
                    </div>

                    <!-- Reason -->
                    <div class="mb-3">
                        <label for="reason" class="form-label">Reason for Refund</label>
                        <textarea class="form-control" id="reason" name="reason" rows="3" placeholder="Enter Reason" required></textarea>
                    </div>

                    <!-- Booking Date -->
                    <div class="mb-3">
                        <label for="bookingDate" class="form-label">Booking Date</label>
                        <input type="date" class="form-control" id="bookingDate" name="bookingDate" required>
                    </div>

                    <!-- UPI ID -->
                    <div class="mb-3">
                        <label for="upiId" class="form-label">UPI ID</label>
                        <input type="text" class="form-control" id="upiId" name="upiId" placeholder="Enter UPI ID" required>
                    </div>

                    <!-- Phone Number -->
                    <div class="mb-3">
                        <label for="phoneNumber" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Enter Phone Number" required>
                    </div>

                    <!-- Buttons -->
                    <div class="d-flex justify-content-between">
                        <!-- Modal Button -->
                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#refundRulesModal">
                            Refund Rules
                        </button>
                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Refund Rules Modal -->
<div class="modal fade" id="refundRulesModal" tabindex="-1" aria-labelledby="refundRulesModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="refundRulesModalLabel">Refund Rules</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul>
                <li>Refund requests must be made within <strong>30 days of booking</strong> or as per the cancellation policy mentioned during booking.</li>
    <li>Refunds are applicable only for cancellations made in compliance with our cancellation policy.</li>
    <li>The refund amount will be credited within <strong>7-10 business days</strong> from the date of approval.</li>
    <li>Refund timelines may vary depending on your payment method and financial institution.</li>
    <li>Refunds are not applicable for no-shows or cancellations made after the allowed cancellation period.</li>
    <li>Certain promotional or discounted bookings are non-refundable. Please check your booking details.</li>
    <li>An administrative fee of <strong>10% of the booking amount</strong> or a fixed fee (whichever is higher) may apply to all cancellations.</li>
    <li>Refunds will be processed to the <strong>original payment method</strong> used during booking.</li>
    <li>In cases where the original payment method is unavailable, alternative methods may be discussed.</li>
    <li>Modifications to bookings (e.g., rescheduling) may affect your eligibility for a refund if you later cancel the modified booking.</li>
    <li>Refunds may not be processed in cases of force majeure events (natural disasters, government restrictions, etc.), unless explicitly stated.</li>
    <li>For bookings made through third-party platforms, please consult the respective platform's refund policies.</li>
    <li>Refund requests must include a valid <strong>proof of cancellation</strong> or any communication confirming the cancellation.</li>
    <li>In case of disputes, the company’s decision will be final and binding as per the terms agreed at the time of booking.</li>
    <li>The refund policy is subject to change. Please refer to the latest version available at the time of your booking.</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Team Start -->
<div class="container-xxl py-5" id="team">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title text-center text-uppercase logoname">Our Team</h6>
            <h1 class="mb-5">Explore Our <span class="text-uppercase logoname">team</span></h1>
        </div>
        <div class="row d-flex justify-content-center flex-wrap">
            <div class="col-lg-2 col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="rounded shadow overflow-hidden">
                    <div class="position-relative">
                        <img class="img-fluid" src="../Img/moumita.jpeg" alt="">
                        <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                            <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="text-center p-4 mt-3">
                        <h5 class="fw-bold mb-0">Moumita Bisui</h5>
                        <small>Front-end Developer</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="rounded shadow overflow-hidden">
                    <div class="position-relative">
                        <img class="img-fluid" src="../Img/shahadat.jpeg" alt="">
                        <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                            <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="text-center p-4 mt-3">
                        <h5 class="fw-bold mb-0">Shahadat Hussain</h5>
                        <small>UI/UX Designer</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="rounded shadow overflow-hidden">
                    <div class="position-relative">
                        <img class="img-fluid" src="../Img/dipan.jpeg" alt="">
                        <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                            <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="text-center p-4 mt-3">
                        <h5 class="fw-bold mb-0">Dipan Patra</h5>
                        <small>Front-end Developer</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="rounded shadow overflow-hidden">
                    <div class="position-relative">
                        <img class="img-fluid" src="../Img/asmaul.jpeg" alt="">
                        <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                            <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="text-center p-4 mt-3">
                        <h5 class="fw-bold mb-0">Asmaul Houque</h5>
                        <small>Front-end Developer</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.9s">
                <div class="rounded shadow overflow-hidden">
                    <div class="position-relative">
                        <img class="img-fluid" src="../Img/joy.jpg" alt="">
                        <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                            <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="text-center p-4 mt-3">
                        <h5 class="fw-bold mb-0">Joydeep Dasgupta</h5>
                        <small>Web Developer</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Team End -->

<!-- Footer -->
 <div class="custom-jumbotron">
<footer class="bg-dark text-white py-4 mt-5">
    <div class="container">
      <div class="row">
        <!-- Logo and Description -->
        <div class="col-md-4 mb-3">
          <a href="#" class="d-flex align-items-center mb-3 link-light text-decoration-none">
            <img src="..//Img/Logo.png" alt="Logo" width="100%" height="100%" class="me-2">
          </a>
          <p class="text-light">© 2024 SpaceFinder. All rights reserved.</p>
        </div>
  
        <!-- Quick Links -->
        <div class="col-md-2 mb-3 text-center">
          <h5 class="text-light">Quick Links</h5>
          <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Home</a></li>
            <li class="nav-item mb-2"><a href="#About" class="nav-link p-0 text-light">About</a></li>
            <li class="nav-item mb-2"><a href="#services" class="nav-link p-0 text-light">Services</a></li>
          </ul>
        </div>
  
        <!-- Social Media -->
        <div class="col-md-2 mb-3 text-center">
          <h5 class="text-light">Follow Us</h5>
          <div>
            <a href="https://www.facebook.com/" class="text-light me-3">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="https://www.instagram.com" class="text-light me-3">
              <i class="fab fa-instagram"></i>
            </a>
            <a href="https://www.linkedin.com" class="text-light me-3">
              <i class="fab fa-linkedin"></i>
            </a>
          </div>
        </div>
  
        <!-- Contact Information -->
        <div class="col-md-4 mb-3 text-center">
          <h5 class="text-light">Contact</h5>
          <p class="text-light"><i class="fas fa-map-marker-alt me-2"></i> Brainware University Kolkata, Barasat</p>
          <p class="text-light"><i class="fas fa-envelope me-2"></i> SpaceFinder@gmail.com</p>
          <p class="text-light"><i class="fas fa-phone me-2"></i> 91-987458523</p>
        </div>
      </div>
  
      <!-- Footer Bottom -->
      <div class="text-center mt-4">
        <p class="text-light">&copy; 2024 <a href="#" class="text-light text-decoration-none">SpaceFinder</a>. All rights reserved.</p>
      </div>
    </div>
  </footer></div>
  <!-- Footer -->
  


















<!-- Bootstrap JS (make sure this is included) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>