<?php
include("db.php");
$bid = $_GET['bid'];
$data = mysqli_query($con,"SELECT * FROM `fa_listing` where bid='$bid'");
$row = $data->fetch_assoc();
function getAddress() {
    $protocol = $_SERVER['HTTPS'] == 'on' ? 'https' : 'http';
    return $protocol.'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
}
$page_link = getAddress();
$_tpl = array();
$_tpl['title'] = ''.$row['buisnessname'].','.$row['services'].' in '.$row['addline2'].', '.$row['city'].'';
$_tpl['meta_desc'] = 'Findacross,'.$row['buisnessname'].','.$row['services'].' in '.$row['addline2'].', '.$row['city'].'';
$_tpl['meta_keywords'] = ''.$row['buisnessname'].',Findacross.com, '.$row['contact'].', '.$row['email'].','.$row['services'].' in '.$row['addline2'].', '.$row['city'].'';
include("header.php");

if(isset($_POST['btnemailsubmit'])) {
	$myemail = 'contact@findacross.com';
	$name = $_POST['name']; 
	$contact = $_POST['contact']; 
	$email_address = $_POST['email']; 
	$message = $_POST['message']; 
	$to = 'vinodbeloshe12@gmail.com';  //$row['email']
	$email_subject = "Findacross.com - Contact form submission";
	$email_body = "Hello ".$row['buisnessname'].", you have received a new message. ".
		" Here are the details:\n Name: $name \n Email: $email_address \n Phone No: $contact \n Message: \n $message"; 
	$headers = "From: $myemail\n"; 
	$headers .= "Reply-To: $email_address";

	mysqli_query($con,"INSERT INTO `fa_enquiry`(`name`, `email`, `message`, `bid`, `contact`) VALUES ('$name','$email_address','$message','$bid','$contact')");
	mail($to,$email_subject,$email_body,$headers);
	}

	if(isset($_POST['btnreviewsubmit'])) {
		$name = $_POST['name'];
		$email_address = $_POST['email']; 
		$rating = $_POST['rating']; 
		$review = $_POST['review']; 
		mysqli_query($con,"INSERT INTO `fa_rating` (`bid`, `name`, `email`, `rating`, `review`) VALUES('$bid','$name','$email_address','$rating','$review')");
	}
?>


<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<main id="listar-main" class="listar-main listar-haslayout">
			<div id="listar-twocolumns" class="listar-twocolumns">
				<div class="listar-themepost listar-placespost listar-detail listar-detailvtwo">

				<?php
						$myid = $row['id'];
								$image = mysqli_query($con,"SELECT image AS 'image' FROM `fa_images` where lid=$myid order by id asc LIMIT 0,1");
								$img = $image->fetch_assoc();
								if($img["image"]){
									echo '<figure class="listar-featuredimg" style="background-image:url(http://www.findacross.com/admin/uploads/'.$img["image"].');">	<figcaption>';
									}
							

					?>
							<div class="container">
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<div class="listar-postcontent">
											<div class="listar-reviewcategory">
												<h1><?php echo $row['buisnessname']; ?><i class="icon-checkmark listar-postverified listar-themetooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Verified"></i></h1>
												<div class="listar-review">
												<h3>Contact Person: <?php echo $row['cperson']; ?></h3>
												</div>
												<?php
											
	$count = mysqli_query($con,"SELECT COUNT(id) AS 'totalCount' FROM `fa_rating` where bid='$bid'");

	$totalCount = $count->fetch_assoc();
	if($totalCount["totalCount"]){
	echo '<div class="listar-review">
		<span class="listar-stars"><span></span></span>
		<em>('.$totalCount['totalCount'].' Review)</em>
	</div>';
	}
												?>
												
											</div>
											<ul class="listar-postinfotags">
												<!-- <li><a href="javascript:void(0);"><i class="icon-heart2"></i><span>23</span></a></li> -->
												<li>
													<div class="listar-btnquickinfo">
														<a class="listar-btnshare" href="javascript:void(0);">
															<i class="icon-share3"></i>
															<span>share</span>
														</a>
														<div class="listar-btnquickinfo">
															<div class="listar-shareicons">
																<!-- <a href="javascript:void(0);"><i class="fa fa-twitter"></i></a> -->

																<a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
																
																<!-- <a href="javascript:void(0);"><i class="fa fa-facebook"></i></a> -->
																<?php echo'<div class="fb-share-button" data-href="'.$page_link.'" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwww.findacross.com%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>';?>
																<!-- <a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a> -->
															</div>
														</div>
													</div>
												</li>
												<!-- <li><span class="listar-tagviews"><i class="icon-eye2"></i><span>52</span></span></li> -->
											</ul>
											<div class="listar-themepostfoot">
												<ul>
													<li>
														<i class="icon-telephone114"></i>
														<span>+ <?php echo $row['contact']; ?></span>
													</li>
													<li>
														<a href="mailto:<?php echo $row['email']; ?>"><i class="icon-email"></i>
														<span> <?php echo $row['email']; ?></span></a>
													</li>
													<li>
														<i class="icon-icons74"></i>
														<span><?php echo $row['addline1'].', '.$row['addline2'].' '.$row['city'].'-'.$row['pin']; ?></span>
													</li>
													<!-- <li>
														<i class="icon-icons20"></i>
														<span>Today <span>Closed Now</span> 10:00 AM - 5:00 PM</span>
													</li> -->
													<li>
														<i class="icon-global"></i>
														<?php 
														if($row['website']){
															echo '<span><a target="_blank" href="'.$row['website'].'">'.$row['website'].'</a></span>';
														}else{
															echo '<span><a target="_blank" href="http://www.findacross.com/'.$row['bid'].'.">www.findacross.com/'.$row['bid'].'</a></span>';
														}
														?>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</figcaption>
					</figure>
					<div class="clearfix"></div>
					<div class="container">
						<div class="row">
							<div id="listar-detailcontent" class="listar-detailcontent">
								<div class="listar-content">
									<div class="listar-themetabs">
										<div id="listar-fixedtabnav" class="listar-fixedtabnav">
											<div class="container">
												<div class="row">
													<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
														<ul class="listar-themetabnav">
															<li><a href="#overview">Overview</a></li>
															 <li><a href="#gallery">Gallery</a></li>
															<!--<li><a href="#addressmaplocation">Location</a></li> -->
															<li><a href="#reviews">Reviews</a></li>
														</ul>
														<!-- <h3 class="footerTitle"><?php// echo $row['buisnessname'];?></h3> -->
														<ul class="listar-socialicons listar-socialiconsborder">
														<?php
														if($row['facebook']){
														echo '<li class="listar-facebook"><a target="_blank" href="'.$row['facebook'].'"><i class="fa fa-facebook"></i></a></li>';
														}
														if($row['twitter']){
															echo '<li class="listar-twitter"><a target="_blank" href="'.$row['twitter'].'"><i class="fa fa-twitter"></i></a></li>';
															}
															if($row['google']){
																echo '<li class="listar-googleplus"><a target="_blank" href="'.$row['google'].'"><i class="fa fa-google-plus"></i></a></li>';
																}
																if($row['linkedin']){
																echo '<li class="listar-linkedin"><a target="_blank" href="'.$row['linkedin'].'"><i class="fa fa-linkedin"></i></a></li>';
																}
															?>
														</ul>
													</div>
												</div>
											</div>
										</div>
										<ul id="listar-themetabnav" class="listar-themetabnav">
											<li class="listar-active"><a href="#overview">Overview</a></li>
											<li><a href="#gallery">Gallery</a></li>
											<!-- <li><a href="#addressmaplocation">Location</a></li> -->
											<li><a href="#reviews">Reviews</a></li>
										</ul>
										<div class="listar-sectionholder">
											<div id="overview" class="listar-overview">
												<p><?php echo $row['about']; ?></p>
												<!-- <div class="listar-videobox">
													<iframe src="https://player.vimeo.com/video/234265016?byline=0&amp;portrait=0"></iframe>
												</div> -->
												<div class="listar-amenitiesarea">
													<div class="listar-title">
														<h3>Services</h3>
													</div>

													<ul class="listar-amenities">
													<?php 
													$serviceArr = explode(',', $row['services']);
													foreach($serviceArr as $key => $value)
													{
													   echo '<li>'.$value.'</li>';
													}
													
													?>

													</ul>
												</div>
											</div>
											<!-- <div id="pricing" class="listar-pricing">
												<div class="listar-title">
													<h3>Pricing</h3>
												</div>
												<ul class="listar-prices">
													<li>
														<div class="listar-pricebox">
															<h3>Chicken Corn Soup</h3>
															<p>Served with Fish Crackers (Individual)</p>
															<span class="listar-price">$12</span>
														</div>
													</li>
													<li>
														<div class="listar-pricebox">
															<h3>Chicken Corn Soup</h3>
															<p>Served with Fish Crackers (Individual)</p>
															<span class="listar-price">$12</span>
														</div>
													</li>
													<li>
														<div class="listar-pricebox">
															<h3>Masala Fries</h3>
															<p>Served with Fish Crackers (Individual)</p>
															<span class="listar-price">$5</span>
														</div>
													</li>
													<li>
														<div class="listar-pricebox">
															<h3>Chicken Corn Soup</h3>
															<p>Served with Fish Crackers (Individual)</p>
															<span class="listar-price">$12</span>
														</div>
													</li>
													<li>
														<div class="listar-pricebox">
															<h3>Inside Out Sandwich - On Its Own</h3>
															<p>Served with Fish Crackers (Individual)</p>
															<span class="listar-price">$54</span>
														</div>
													</li>
												</ul>
											</div> -->
											<!-- <div id="addressmaplocation" class="listar-addressmaplocation">
												<div class="listar-title">
													<h3>Location</h3>
												</div>
												<div id="listar-locationmap" class="listar-locationmap"></div>
											</div> -->

											<div id="gallery" class="listar-addressmaplocation">
												<div class="listar-title">
													<h3>Gallery</h3>
												</div>
												
												<div class="listar-description">
												<ul class="listar-authorgallery">
												<?php
												$myid = $row['id'];
											
												$image = mysqli_query($con,"SELECT * FROM `fa_images` where lid=$myid order by id asc");
												if (mysqli_num_rows($image)>0) { 
													while($obj = $image->fetch_object()){
														echo '<li><figure><a href="http://www.findacross.com/admin/uploads/'.$obj->image.'" data-rel="prettyPhoto[userimgone]" rel="prettyPhoto[userimgone]"><img src="http://www.findacross.com/admin/uploads/'.$obj->image.'" alt="'.$row["buisnessname"].'"></a></figure></li>';
											
													}
												}
												?>

																	</ul>
											</div>
											</div>

											

											<div id="reviews" class="listar-reviews">
												<div class="listar-title">
													<h3>Reviews</h3>
												</div>
												<ul id="listar-comments" class="listar-comments">
												<?php 

$reviews = mysqli_query($con,"SELECT * FROM fa_rating where bid='$bid' and status=1 order by id desc");								
if (mysqli_num_rows($reviews)>0) { 
while($obj = $reviews->fetch_object()){
	echo '<li>
	<div class="listar-comment">
		<div class="listar-commentcontent">
			<time>
				<i class="icon-alarmclock"></i>
				<span>'.date("d M Y", strtotime($obj->date)).'</span>
			</time>
			<div class="listar-description">
				<p>'.$obj->review.'</p>
			
			</div>
			<a class="listar-helpful" href="javascript:void(0);">
				<i class="icon-thumb-up2"></i>';
				if($obj->rating==1){
				echo'<span>Poor</span>';
				}
				if($obj->rating==2){
				echo'<span>Average</span>';
				}
				if($obj->rating==3){
				echo'<span>Good</span>';
				}
				if($obj->rating==4){
				echo'<span>Excellent</span>';
				}
				echo'<span>'.$obj->rating.'</span>
			</a>
		</div>
	</div>
</li>';

}
}else{
	echo '<li>
	<div class="listar-comment">
		<div class="listar-commentcontent">
		<p> Be first one to Review Us</p>
		</div>
		</div>
		</li>';

}
													?>
													
													
												</ul>
												<!-- <nav class="listar-pagination">
													<ul>
														<li class="listar-prevpage"><a href="javascript:void(0);"><i class="fa fa-angle-left"></i></a></li>
														<li><a href="javascript:void(0);">1</a></li>
														<li><a href="javascript:void(0);">2</a></li>
														<li><a href="javascript:void(0);">3</a></li>
														<li class="listar-nextpage"><a href="javascript:void(0);"><i class="fa fa-angle-right"></i></a></li>
													</ul>
												</nav> -->
												<div class="listar-formreviewarea">
													<h3>Add Review</h3>
													<form method="post" action="" class="listar-formtheme listar-formaddreview">
														<fieldset>
															<div class="row">
																<!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
																	<div class="listar-rating">
																		<p>Your rating for this listing</p>
																		 <span class="listar-stars"></span>
																	</div>
																</div> -->
															
																<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
																	<div class="form-group">
																		<input type="text" required name="name" class="form-control" placeholder="Your Name">
																	</div>
																</div>
																<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
																	<div class="form-group">
																		<input type="text" required name="email" class="form-control" placeholder="Email Address">
																	</div>
																</div>
																<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
																	<div class="form-group">
																		<label for="">Your Review</label>
																	</div>
																</div>
																<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
																	<div class="form-group">
																		<span class="listar-select">
																			<select required name="rating">
																				<option value="1">Poor</option>
																				<option value="2">Average</option>
																				<option value="3">Good</option>
																				<option value="4">Excellent</option>
																			</select>
																		</span>
																	</div>
																</div>
																<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
																	<div class="form-group">
																		<textarea required name="review" class="form-control" placeholder="Review"></textarea>
																	</div>
																</div>
																<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
																	<button class="listar-btn listar-btngreen" type="submit" id="btnreviewsubmit" name="btnreviewsubmit">Submit Review</button>
																</div>
															</div>
														</fieldset>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
								<aside id="listar-stickysidebar" class="listar-sidebar listar-stickysidebar">
									<div class="sidebar__inner">
										<div class="listar-widget listar-widgetsocialicon">
											<div class="listar-widgetcontent">
												<ul class="listar-socialicons listar-socialiconsborder">
												<?php
														if($row['facebook']){
														echo '<li class="listar-facebook"><a target="_blank" href="'.$row['facebook'].'"><i class="fa fa-facebook"></i></a></li>';
														}
														if($row['twitter']){
															echo '<li class="listar-twitter"><a target="_blank" href="'.$row['twitter'].'"><i class="fa fa-twitter"></i></a></li>';
															}
																
															if($row['google']){
															echo '<li class="listar-googleplus"><a target="_blank" href="'.$row['google'].'"><i class="fa fa-google-plus"></i></a></li>';
															}
															if($row['linkedin']){
															echo '<li class="listar-linkedin"><a target="_blank" href="'.$row['linkedin'].'"><i class="fa fa-linkedin"></i></a></li>';
															}
															?>	
												
													
													<!-- <li class="listar-instagram"><a href="javascript:void(0);"><i class="fa fa-instagram"></i></a></li>
													<li class="listar-vimeo"><a href="javascript:void(0);"><i class="fa fa-vimeo"></i></a></li> -->
												</ul>
											</div>
										</div>
										<div class="listar-widget listar-widgetopeninghours">
											<div class="listar-widgettitle">
												<h3>
													<i class="icon-alarmclock"></i>
													<span>Opening Hours</span>
												</h3>
											</div>
											<div class="listar-widgetcontent">
												<ul class="listar-openinghours">
													<li>
														<span>Monday</span>
														<span>10:00 AM - 5:00 PM</span>
													</li>
													<li>
														<span>Tuesday</span>
														<span>10:00 AM - 5:00 PM</span>
													</li>
													<li>
														<span>Wednesday</span>
														<span>10:00 AM - 5:00 PM</span>
													</li>
													<li>
														<span>Thursday</span>
														<span>10:00 AM - 5:00 PM</span>
													</li>
													<li>
														<span>Friday</span>
														<span>10:00 AM - 5:00 PM</span>
													</li>
													<li>
														<span>Saturday</span>
														<span>10:00 AM - 3:00 PM</span>
													</li>
													<li>
														<span>Sunday</span>
														<span>Closed</span>
													</li>
												</ul>
											</div>
										</div>
										<!-- <div class="listar-widget">
											<div class="listar-widgettitle">
												<h3>
													<i class="icon-trophy"></i>
													<span>Price</span>
												</h3>
											</div>
											<div class="listar-widgetcontent">
												<div class="listar-range">
													<i class="listar-themetooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Moderate"><span class="listar-dollars"><span></span></span></i>
													<span>Price Ranger: <strong>$10 - $200</strong></span>
												</div>
												<a class="listar-btnclainnow" href="javascript:void(0);">Claim Now</a>
											</div>
										</div> -->
										<!-- <div class="listar-widget">
											<div class="listar-widgettitle">
												<h3>
													<i class="icon-hotairballoon"></i>
													<span>Additional Details</span>
												</h3>
											</div>
											<div class="listar-widgetcontent">
												<ul class="listar-additionaldetails">
													<li>
														<span>Take Out:</span>
														<span>Yes</span>
													</li>
													<li>
														<span>Delivery</span>
														<span>No</span>
													</li>
													<li>
														<span>Caters</span>
														<span>Yes</span>
													</li>
													<li>
														<span>Smoking</span>
														<span>No</span>
													</li>
													<li>
														<span>Take Out</span>
														<span>Yes</span>
													</li>
													<li>
														<span>Delivery</span>
														<span>No</span>
													</li>
													<li>
														<span>Caters</span>
														<span>Yes</span>
													</li>
													<li>
														<span>Smoking</span>
														<span>Yes</span>
													</li>
												</ul>
											</div>
										</div> -->
										<div class="listar-widget listar-widgetformauthor">
										<div class="listar-authorinfo">
												
										<div class="listar-widgettitle">
										<h3>
											<i class="icon-mail-envelope"></i>
											<span>Contact Us</span>
										</h3>
									</div>
												</div>
												<form method="post" action="" class="listar-formtheme listar-formauthor">
													<fieldset>
														<div class="form-group">
															<input type="text" required name="name" class="form-control" placeholder="Name">
														</div>
														<div class="form-group">
															<input type="text" required name="contact" class="form-control" placeholder="Contact No">
														</div>
														<div class="form-group">
															<input type="text" required name="email" class="form-control" placeholder="Email">
														</div>
														<div class="form-group">
															<textarea required name="message" class="form-control" placeholder="Message"></textarea>
														</div>
														<button type="submit" name="btnemailsubmit" id="btnemailsubmit" class="listar-btn listar-btnblue">Send</button>
													</fieldset>
												</form>
											</div>
										</div>
									</div>
								</aside>
							</div>
						</div>
					</div>
				</div>
				<!-- <section class="listar-sectionspace listar-bglight listar-listingvtwo listar-haslayout">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="listar-title">
									<h3>People also viewed</h3>
								</div>
								<div id="listar-relatedlistingslider" class="listar-relatedlistingslider listar-gridview owl-carousel">
									<div class="item">
										<div class="listar-themepost listar-placespost">
											<figure class="listar-featuredimg">
												<img src="images/post/img-13.jpg" alt="image description">
												<div class="listar-postcontent">
													<h3><a href="javascript:void(0);">Tourist Guide</a></h3>
													<div class="listar-reviewcategory">
														<div class="listar-review">
															<span class="listar-stars"><span></span></span>
															<em>(3 Review)</em>
														</div>
														<a href="javascript:void(0);" class="listar-category">
															<i class="icon-nightlife"></i>
															<span>Night Life</span>
														</a>
													</div>
													<div class="listar-themepostfoot">
														<a class="listar-location" href="javascript:void(0);">
															<i class="icon-icons74"></i>
															<em>New York</em>
														</a>
														<div class="listar-postbtns">
															<a class="listar-btnquickinfo" href="#" data-toggle="modal" data-target=".listar-placequickview"><i class="icon-expand"></i></a>
															<a class="listar-btnquickinfo" href="javascript:void(0);"><i class="icon-heart2"></i></a>
															<div class="listar-btnquickinfo">
																<div class="listar-shareicons">
																	<a href="javascript:void(0);"><i class="fa fa-twitter"></i></a>
																	<a href="javascript:void(0);"><i class="fa fa-facebook"></i></a>
																	<a href="javascript:void(0);"><i class="fa fa-pinterest-p"></i></a>
																</div>
																<a class="listar-btnshare" href="javascript:void(0);">
																	<i class="icon-share3"></i>
																</a>
															</div>
														</div>
													</div>
												</div>
											</figure>
										</div>
									</div>
									
									
									
								
									
									
									
									
								</div>
							</div>
						</div>
					</div>
				</section> -->
			</div>
		</main>


<?php
	include("footer.php");
	?>