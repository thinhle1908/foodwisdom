<x-layout>
	@section('scripts')
	  <!-- Favicon -->
	  <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />
	  <!--Muti Categories -->
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	  <!-- Fonts -->
	  <link rel="preconnect" href="https://fonts.googleapis.com" />
	  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	  <link
		href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
		rel="stylesheet"
	  />
  
	  <!-- Icons. Uncomment required icon fonts -->
	  <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />
  
	  <!-- Core CSS -->
	  <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
	  <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
	  <link rel="stylesheet" href="../assets/css/demo.css" />
  
	  <!-- Vendors CSS -->
	  <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
  
	  <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />
  
	  <!-- Page CSS -->
  
	  <!-- Helpers -->
	  <script src="../assets/vendor/js/helpers.js"></script>
  
	  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
	  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
	  <script src="../assets/js/config.js"></script>
	  <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="{{ asset('../assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('../assets/js/dashboards-analytics.js') }}"></script>
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
    <!-- Categories Script -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
	@endsection
    @section('content')
        <!-- Start All Pages -->
        <div class="all-page-title page-breadcrumb">
            <div class="container text-center">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Profile</h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- End All Pages -->

        <!-- Start Reservation -->
        <div class="reservation-box">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="heading-title text-center">
                            <h2>Profile</h2>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <div class="contact-block">
                            <form id="formAccountSettings" method="POST" action="profile/update-profile"
                                enctype="multipart/form-data">
                                <div class="col-md-12">
									<div class="col-md-12 d-flex align-items-start align-items-sm-center gap-4">
                                        <img src={{asset('assets/img/avatars/1.png')}} class="d-block rounded"
                                            height="100" width="100" id="uploadedAvatar" />
                                        <div class="button-wrapper">
                                            <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                                <span class="d-none d-sm-block">Upload new photo</span>
                                                <i class="bx bx-upload d-block d-sm-none"></i>
                                                <input type="file" id="upload" class="account-file-input" hidden
                                                    accept="image/png, image/jpeg" name="image" />
                                            </label>
                                            <button type="button"
                                                class="btn btn-outline-secondary account-image-reset mb-4">
                                                <i class="bx bx-reset d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Reset</span>
                                            </button>

                                            <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800KB</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <h3>Name:</h3>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Your Name" required data-error="Please enter your name">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <h3>Email</h3>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" placeholder="Your Email" id="email"
                                                class="form-control" name="email" required
                                                data-error="Please enter your email">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <h3>Phone:</h3>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" placeholder="Your Numbar" id="phone"
                                                class="form-control" name="phone" required
                                                data-error="Please enter your Numbar">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
									<h3>Line1:</h3>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" placeholder="Your Numbar" id="phone"
                                                class="form-control" name="phone" required
                                                data-error="Please enter your Numbar">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
									<h3>Line2:</h3>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" placeholder="Your Numbar" id="phone"
                                                class="form-control" name="phone" required
                                                data-error="Please enter your Numbar">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
									<h3>City:</h3>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" placeholder="Your Numbar" id="phone"
                                                class="form-control" name="phone" required
                                                data-error="Please enter your Numbar">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
									<h3>Province:</h3>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" placeholder="Your Numbar" id="phone"
                                                class="form-control" name="phone" required
                                                data-error="Please enter your Numbar">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
									<h3>Country:</h3>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" placeholder="Your Numbar" id="phone"
                                                class="form-control" name="phone" required
                                                data-error="Please enter your Numbar">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
									<h3>Zip Code:</h3>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" placeholder="Your Numbar" id="phone"
                                                class="form-control" name="phone" required
                                                data-error="Please enter your Numbar">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="submit-button text-center">
                                        <button class="btn btn-common" id="submit" type="submit">Save</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- End Reservation -->

        <!-- Start Customer Reviews -->
        <div class="customer-reviews-box">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="heading-title text-center">
                            <h2>Customer Reviews</h2>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 mr-auto ml-auto text-center">
                        <div id="reviews" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner mt-4">
                                <div class="carousel-item text-center active">
                                    <div class="img-box p-1 border rounded-circle m-auto">
                                        <img class="d-block w-100 rounded-circle" src="{{ asset('images/profile-1.jpg') }}"
                                            alt="">
                                    </div>
                                    <h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Paul Mitchel</strong>
                                    </h5>
                                    <h6 class="text-dark m-0">Web Developer</h6>
                                    <p class="m-0 pt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem
                                        tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel,
                                        semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse varius
                                        nibh non aliquet.</p>
                                </div>
                                <div class="carousel-item text-center">
                                    <div class="img-box p-1 border rounded-circle m-auto">
                                        <img class="d-block w-100 rounded-circle" src="{{ asset('images/profile-3.jpg') }}"
                                            alt="">
                                    </div>
                                    <h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Steve Fonsi</strong>
                                    </h5>
                                    <h6 class="text-dark m-0">Web Designer</h6>
                                    <p class="m-0 pt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem
                                        tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel,
                                        semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse varius
                                        nibh non aliquet.</p>
                                </div>
                                <div class="carousel-item text-center">
                                    <div class="img-box p-1 border rounded-circle m-auto">
                                        <img class="d-block w-100 rounded-circle" src="{{ asset('images/profile-7.jpg') }}"
                                            alt="">
                                    </div>
                                    <h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Daniel vebar</strong>
                                    </h5>
                                    <h6 class="text-dark m-0">Seo Analyst</h6>
                                    <p class="m-0 pt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem
                                        tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel,
                                        semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse varius
                                        nibh non aliquet.</p>
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#reviews" role="button" data-slide="prev">
                                <i class="fa fa-angle-left" aria-hidden="true"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#reviews" role="button" data-slide="next">
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Customer Reviews -->

        <!-- Start Contact info -->
        <div class="contact-imfo-box">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <i class="fa fa-volume-control-phone"></i>
                        <div class="overflow-hidden">
                            <h4>Phone</h4>
                            <p class="lead">
                                +01 123-456-4590
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <i class="fa fa-envelope"></i>
                        <div class="overflow-hidden">
                            <h4>Email</h4>
                            <p class="lead">
                                yourmail@gmail.com
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <i class="fa fa-map-marker"></i>
                        <div class="overflow-hidden">
                            <h4>Location</h4>
                            <p class="lead">
                                800, Lorem Street, US
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Contact info -->
    @endsection
</x-layout>
