<?php
if(isset($_POST['btnloginsubmit'])) {
	$user = mysqli_query($con,"SELECT * FROM `login` where username='$username' and password='$password'");
	$userdata = $user->fetch_assoc();
	if($userdata){
		echo '<script>alert("Login Successful")</script>';
		
	}else{
		echo '<script>alert("Invalid Login")</script>';
	}
}
?>
	<!--************************************
				Footer Start
		*************************************-->
		<footer id="listar-footer" class="listar-footer listar-haslayout">

			<div class="listar-footerbar">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<span class="listar-copyright">Copyright &copy; 2015-2018 findacross. All rights reserved.</span>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!--************************************
				Footer End
		*************************************-->
	</div>
	<!--************************************
			Wrapper End
	*************************************-->
	<!--************************************
			Theme Modal Box Start
	*************************************-->
	<!-- <div class="modal fade listar-placequickview" tabindex="-1" role="dialog">
		<div class="modal-dialog listar-modaldialog" role="document">
			<div class="modal-content listar-modalcontent">
				<div class="listar-themepost listar-placespost">
					<span class="listar-btnclosequickview" data-toggle="modal" data-target=".listar-placequickview">X</span>
					<figure class="listar-featuredimg" data-vide-bg="poster: images/post/img-16.jpg" data-vide-options="position: 50% 50%">
						<span class="listar-contactnumber">
							<i class="icon-">
								<img src="images/icons/icon-03.png" alt="image description">
							</i>
							<em> + 7890 456 133</em>
						</span>
					</figure>
					<div class="listar-postcontent">
						<h3>
							<a href="javascript:void(0);">Serena Hotel</a>
							<i class="icon-checkmark listar-postverified listar-themetooltip" data-toggle="tooltip" data-placement="top" title="Verified"></i>
						</h3>
						<div class="listar-description">
							<p>Ut euismod ultricies sollicitudin. Curabitur sed dapibus nulla. Nulla eget iaculis lectus. Mauris ac maximus neque.
								Nam in mauris quis libero sodales eleifend. Morbi varius, nulla sit Nam in mauris quis libero sodales eleifend amet
								rutrum elementum, est elit finibus tellus, ut tristique elit risus at metus</p>
						</div>
						<ul class="listar-listfeatures">
							<li>Pets allowed</li>
							<li>Kitchen</li>
							<li>Internet</li>
							<li>Suitable for events</li>
							<li>Gym</li>
							<li>Dryer</li>
							<li>Hot tub</li>
							<li>Family/kid friendly</li>
							<li>Wireless Internet</li>
						</ul>
						<div class="listar-reviewcategory">
							<div class="listar-review">
								<span class="listar-stars">
									<span></span>
								</span>
								<em>(3 Review)</em>
							</div>
							<a href="javascript:void(0);" class="listar-category">
								<i class="icon-tourism"></i>
								<span>Hotel</span>
							</a>
						</div>
						<div class="listar-themepostfoot">
							<span class="listar-openinghours">
								<i class="icon-alarmclock2"></i>
								<em>Today
									<span class="listar-greenthemecolor">Open Now</span> 10:00 AM - 5:00 PM</em>
							</span>
							<div class="listar-postbtns">
								<a class="listar-btnquickinfo listar-liked" href="javascript:void(0);">
									<i class="icon-heart2"></i>
								</a>
								<div class="listar-btnquickinfo">
									<div class="listar-shareicons">
										<a href="javascript:void(0);">
											<i class="fa fa-twitter"></i>
										</a>
										<a href="javascript:void(0);">
											<i class="fa fa-facebook"></i>
										</a>
										<a href="javascript:void(0);">
											<i class="fa fa-pinterest-p"></i>
										</a>
									</div>
									<a class="listar-btnshare" href="javascript:void(0);">
										<i class="icon-share3"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> -->
	<!--************************************
			Theme Modal Box End
	*************************************-->
	<!--************************************
			Login Singup Start
	*************************************-->
	<div id="listar-loginsingup" class="listar-loginsingup">
		<button type="button" class="listar-btnclose">x</button>
		<figure class="listar-loginsingupimg" data-vide-bg="poster: img/slider/login.jpg" data-vide-options="position: 50% 50%"></figure>
		<div class="listar-contentarea">
			<div class="listar-themescrollbar">
				<div class="listar-logincontent">
					<div class="listar-themetabs">
						<ul class="listar-tabnavloginregistered" role="tablist">
							<li role="presentation" class="active">
								<a href="#listar-loging" data-toggle="tab">Log in</a>
							</li>
							<!-- <li role="presentation">
								<a href="#listar-register" data-toggle="tab">Register</a>
							</li> -->
						</ul>
						<div class="tab-content listar-tabcontentloginregistered">
							<div role="tabpanel" class="tab-pane active fade in" id="listar-loging">
								<form method="post" action="" class="listar-formtheme listar-formlogin">
									<fieldset>
										<div style="width: 100% !important;" class="form-group listar-inputwithicon">
											<i class="icon-profile-male"></i>
											<input required type="text" name="username" class="form-control" placeholder="Username Or Email">
										</div>
										<div class="form-group listar-inputwithicon">
											<i class="icon-lock6"></i>
											<input required type="password" name="password" class="form-control" placeholder="Password">
										</div>
										<div class="form-group">
											<!-- <div class="listar-checkbox">
												<input type="checkbox" name="remember" id="rememberpass2">
												<label for="rememberpass2">Remember me</label>
											</div> -->
											<span>
												<a href="#">Lost your Password?</a>
											</span>
										</div>
										<button type="submit" name="btnloginsubmit" class="listar-btn listar-btngreen">Login</button>
									</fieldset>
								</form>
							</div>
							<!-- <div role="tabpanel" class="tab-pane fade" id="listar-register">
								<form class="listar-formtheme listar-formlogin">
									<fieldset>
										<div class="form-group listar-inputwithicon">
											<i class="icon-profile-male"></i>
											<input type="text" name="username" class="form-control" placeholder="Username">
										</div>
										<div class="form-group listar-inputwithicon">
											<i class="icon-icons208"></i>
											<input type="email" name="emailaddress" class="form-control" placeholder="Email Address">
										</div>
										<div class="form-group listar-inputwithicon">
											<i class="icon-lock-stripes"></i>
											<input type="password" name="password" class="form-control" placeholder="Password">
										</div>
										<div class="form-group listar-inputwithicon">
											<i class="icon-lock-stripes"></i>
											<input type="password" name="confirmpassword" class="form-control" placeholder="Password">
										</div>
										<button class="listar-btn listar-btngreen">login</button>
									</fieldset>
								</form>
							</div> -->
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	<!--************************************
			Login Singup End
	*************************************-->
	<script src="http://www.findacross.com/js/vendor/jquery-library.js"></script>
	<script src="http://www.findacross.com/js/vendor/bootstrap.min.js"></script>
		<!-- <script src="http://www.findacross.com/js/ResizeSensor.js.js"></script> -->
	<!-- <script src="http://www.findacross.com/js/jquery.sticky-sidebar.js"></script> -->
	<!-- <script src="http://www.findacross.com/js/jquery.navhideshow.js"></script> -->
	<!-- <script src="http://www.findacross.com/js/backgroundstretch.js"></script> !!!! -->
	<!-- <script src="http://www.findacross.com/js/jquery.sticky-kit.js"></script>
	<script src="http://www.findacross.com/js/bootstrap-slider.js"></script> -->
	<!-- <script src="http://www.findacross.com/js/owl.carousel.min.js"></script> -->
	<!-- <script src="http://www.findacross.com/js/jquery.vide.min.js"></script> !!!!-->
	<!-- <script src="http://www.findacross.com/js/chosen.jquery.js"></script> -->
	<!-- <script src="http://www.findacross.com/js/scrollbar.min.js"></script> -->
	<!-- <script src="http://www.findacross.com/js/isotope.pkgd.js"></script> !!!!-->
	<!-- <script src="http://www.findacross.com/js/jquery.steps.js"></script> !!!!-->
	<!-- <script src="http://www.findacross.com/js/prettyPhoto.js"></script> -->

<script src="http://www.findacross.com/js/fa.js"></script>
	<!-- <script src="http://www.findacross.com/js/raphael-min.js"></script>
	<script src="http://www.findacross.com/js/parallax.js"></script>
	<script src="http://www.findacross.com/js/sortable.js"></script>
	<script src="http://www.findacross.com/js/countTo.js"></script>
	<script src="http://www.findacross.com/js/appear.js"></script> -->
		<script src="http://www.findacross.com/js/dev_themefunction.js"></script>
		<?php
include("analyticstracking.php");
?>
</body>

</html>