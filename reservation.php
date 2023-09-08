<?php
include('db.php')
?>
<?php
if (isset($_GET['room_id'])){
    $get_room_id = $_GET['room_id'];
    $get_room_sql = "SELECT * FROM room NATURAL JOIN room_type WHERE room_id = '$get_room_id'";
    $get_room_result = mysqli_query($connection,$get_room_sql);
    $get_room = mysqli_fetch_assoc($get_room_result);

    $get_room_type_id = $get_room['room_type_id'];
    $get_room_type = $get_room['room_type'];
    $get_room_no = $get_room['room_no'];
    $get_room_price = $get_room['price'];
}
?>
<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>Vanni Inni - Hotel & Restaurant</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">    
	<!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">    
	<!-- Pickadate CSS -->
    <link rel="stylesheet" href="css/classic.css">    
	<link rel="stylesheet" href="css/classic.date.css">    
	<link rel="stylesheet" href="css/classic.time.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">


</head>

<body>
	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="index.html">
					<img src="images/logo.png" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
						<li class="nav-item"><a class="nav-link" href="menu.html">Menu</a></li>
						<li class="nav-item"><a class="nav-link" href="room.html">Rooms</a></li>
						<li class="nav-item active"><a class="nav-link" href="reservation.html">Reservation</a></li>
						<li class="nav-item"><a class="nav-link" href="gallery.html">Gallery</a></li>
						<li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
						<li class="nav-item"><a class="nav-link" href="admin/index.php">Admin Login</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->
	
	<!-- Start All Pages -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Reservation</h1>
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
						<h2>Reservation</h2>
						<p>Book Your Reservation Now</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-sm-12 col-xs-12">
					<div class="contact-block">
						<form id="contactForm">
							<div class="row">
								<div class="col-md-6">
									<h3>PERSONAL INFORMATION</h3>

									<div class="col-md-12">
										<div class="form-group" method="post">
											<label>First Name</label>
                                <input class="form-control" placeholder="First Name" id="first_name" data-error="Enter First Name" required>
                                <div class="help-block with-errors"></div>
                                            
                               </div>
                               <div class="form-group">
                                            <label>Last Name</label>
                                <input class="form-control" placeholder="Last Name" id="last_name">
										</div>                                 
									</div>

									<div class="col-md-12">
										<div class="form-group">
											<label>Contact Number</label>
                                <input type="tel" class="form-control" data-error="Enter Min 10 Digit" data-minlength="10" placeholder="Contact No" id="contact_no" required>
                                <div class="help-block with-errors"></div>
										</div>                                 
									</div>

									<div class="col-md-12">
										<div class="form-group">
											<label>Email Address</label>
                                <input type="email" class="form-control" placeholder="Email Address" id="email" data-error="Enter Valid Email Address" required>
                                <div class="help-block with-errors"></div>
										</div>                                 
									</div>

									<div class="col-md-12">
										<div class="form-group">
											<label>ID Card Type</label>
                                <select class="form-control" id="id_card_id" data-error="Select ID Card Type" required onchange="validId(this.value);">
                                    <option selected disabled>Select ID Card Type</option>
                                    <?php
                                    $query  = "SELECT * FROM id_card_type";
                                    $result = mysqli_query($connection,$query);
                                    if (mysqli_num_rows($result) > 0){
                                        while ($id_card_type = mysqli_fetch_assoc($result)){
                                            echo '<option value="'.$id_card_type['id_card_type_id'].'">'.$id_card_type['id_card_type'].'</option>';
                                        }}
                                    ?>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
										</div>                                 
									</div>


									<div class="col-md-12">
										<div class="form-group">
											 <label>Selected ID Number</label>
                                <input class="form-control" placeholder="ID Card Number" id="id_card_no" data-error="Enter Valid ID Card No" required>
                                <div class="help-block with-errors"></div>
										</div> 
									</div>


								
								<div class="col-md-12">
										<div class="form-group">
											 <label>Residential Address</label>
                                <input type="text" class="form-control" placeholder="Full Address" id="address" required>
                                <div class="help-block with-errors"></div>
										</div> 
								</div>
							</div>
								
<?php
                    if (isset($_GET['room_id'])){?>

								<div class="col-md-6">
									<h3>ROOM INFORMATION:</h3>

									<div class="col-md-12">
										<div class="form-group">
											<label>Room Type</label>
                                    <select class="form-control" id="room_type" data-error="Select Room Type" required>
                                        <option selected disabled>Select Room Type</option>
                                        <option selected value="<?php echo $get_room_type_id; ?>"><?php echo $get_room_type; ?></option>
                                    </select>
											<div class="help-block with-errors" </div>
									  </div> 
									</div>

									<div class="col-md-12">
										<div class="form-group">
											<label>Room No</label>
                                    <select class="form-control" id="room_no" onchange="fetch_price(this.value)" required data-error="Select Room No">
                                        <option selected disabled>Select Room No</option>
                                        <option selected value="<?php echo $get_room_id; ?>"><?php echo $get_room_no; ?></option>
                                    </select>
                                    <div class="help-block with-errors"></div>
										</div> 
									</div>
								
								<div class="col-md-12">
										<div class="form-group">
											 <label>Check In Date</label>
                                    <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="check_in_date" data-error="Select Check In Date" required>
                                    <div class="help-block with-errors"></div>
                    </div>
								</div> 
								

								<div class="col-md-12">
										<div class="form-group">
											 <label>Check Out Date</label>
                                    <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="check_out_date" data-error="Select Check Out Date" required>
                                    <div class="help-block with-errors"></div>
                   </div>
								</div>

								<div class="col-md-6">
                                    <h4 style="font-weight: bold">Total Days : <span id="staying_day">0</span> Days</h4>
                                    <h4 style="font-weight: bold">Price: <span id="price"><?php echo $get_room_price; ?></span> /-</h4>
                                    <h4 style="font-weight: bold">Total Amount : <span id="total_price">0</span> /-</h4>
                </div>
                <?php } else{?>

                	<div class="col-md-6">
									<h3>ROOM INFORMATION:</h3>

									<div class="col-md-12">
										<div class="form-group">
											<label>Room Type</label>
                                    <select class="form-control" id="room_type" onchange="fetch_room(this.value);" required data-error="Select Room Type">
                                        <option selected disabled>Select Room Type</option>
                                        <?php
                                        $query  = "SELECT * FROM room_type";
                                        $result = mysqli_query($connection,$query);
                                        if (mysqli_num_rows($result) > 0){
                                            while ($room_type = mysqli_fetch_assoc($result)){
                                                echo '<option value="'.$room_type['room_type_id'].'">'.$room_type['room_type'].'</option>';
                                            }}
                                        ?>
                                    </select>
											<div class="help-block with-errors" </div>
									  </div> 
									</div>

									<div class="col-md-12">
										<div class="form-group">
											<label>Room No</label>
                                    <select class="form-control" id="room_no" onchange="fetch_price(this.value)" required data-error="Select Room No">

                                    </select>
                                    <div class="help-block with-errors"></div>
										</div> 
									</div>
								
								<div class="col-md-12">
										<div class="form-group">
											 <label>Check In Date</label>
                                    <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="check_in_date" data-error="Select Check In Date" required>
                                    <div class="help-block with-errors"></div>
                    </div>
								</div> 
								

								<div class="col-md-12">
										<div class="form-group">
											 <label>Check Out Date</label>
                                    <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="check_out_date" data-error="Select Check Out Date" required>
                                    <div class="help-block with-errors"></div>
                   </div>
								</div>

								<div class="col-md-6">
                                    <h4 style="font-weight: bold">Total Days : <span id="staying_day">0</span> Days</h4>
                                    <h4 style="font-weight: bold">Price: <span id="price">0</span> /-</h4>
                                    <h4 style="font-weight: bold">Total Amount : <span id="total_price">0</span> /-</h4>
                </div>
<?php }
                    ?>
								<div class="col-md-12">
									<div class="submit-button text-center">
										<button type="submit" value="Submit" class="btn btn-common" style="border-radius:10%">Submit</button>
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
	<!-- Start Contact info -->
	<div class="contact-imfo-box">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<i class="fa fa-volume-control-phone"></i>
					<div class="overflow-hidden">
						<h4>Phone</h4>
						<p class="lead">
							+94 372 256 984
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<i class="fa fa-envelope"></i>
					<div class="overflow-hidden">
						<h4>Email</h4>
						<p class="lead">
							admin@vanniinn.lk
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<i class="fa fa-map-marker"></i>
					<div class="overflow-hidden">
						<h4>Location</h4>
						<p class="lead">
							Vanni Inni Hotel & Restaurant, Vavuniya
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Contact info -->
	<!-- Start Footer -->
	<footer class="footer-area bg-f">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<h3>About Us</h3>
					<p>The Vanni Inni Hotel & Restaurant is a modern, perfect for a romantic, charming vacation, in the enchanting setting of Vavuniya district.</p>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Opening hours</h3>
					<p><span class="text-color">Monday : </span>9:Am - 10PM</p>
					<p><span class="text-color">Tuesday :</span> 9:Am - 10PM</p>
					<p><span class="text-color">Wednesday :</span> 9:Am - 10PM</p>
					<p><span class="text-color">Thusday :</span> 9:Am - 10PM</p>
					<p><span class="text-color">Friday :</span> 9:Am - 10PM</p>
					<p><span class="text-color">Sat-Sun :</span> 5:PM - 10PM</p>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Contact information</h3>
					<p class="lead">Vanni Inni Hotel & Restaurant, Vavuniya</p>
					<p class="lead"><a href="#">+94 372 256 984</a></p>
					<p><a href="#">admin@vanniinn.lk</a></p>
				</div>
			</div>
		</div>
		
		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<p class="company-name">All Rights Reserved. &copy; 2023 <a href="#">Vanni Inni Hotel & Restaurant</a>
					</p>
					</div>
				</div>
			</div>
		</div>
		
	</footer>
	<!-- End Footer -->
	
	<a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

	<!-- ALL JS FILES -->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
	<script src="js/jquery.superslides.min.js"></script>
	<script src="js/images-loded.min.js"></script>
	<script src="js/isotope.min.js"></script>
	<script src="js/baguetteBox.min.js"></script>
	<script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
</body>
</html>