<?php
include("db.php");
$categories = mysqli_query($con,"SELECT * FROM fa_category order by name");
$_tpl = array();
$_tpl['title'] = 'Findacross.com - Free advertising site, b2b, b2c, local search engine';
$_tpl['meta_desc'] = 'Findacross,free listing sites for
b2b, b2c a local search engine. provides Best Deals, Hotels, Movies, Buses and Cabs in Bhandup Mumbai India';
$_tpl['meta_keywords'] = 'findacross.com, findacross, find across,Hotels, Movies,b2b, b2c a local search engine, Buses and Cabs in Bhandup Mumbai India';
include("header.php");
?>
		<div class="listar-homebannerslider">
			<div id="listar-homeslider" class="listar-homeslider owl-carousel">
				<div class="item">
					<figure>
						<img src="http://www.findacross.com/img/slider/slider1.jpg" alt="findacross.com">
					</figure>
				</div>
				<div class="item">
					<figure>
						<img src="http://www.findacross.com/img/slider/slider2.jpg" alt="findacross.com">
					</figure>
				</div>
				<div class="item">
					<figure>
					<img src="http://www.findacross.com/img/slider/slider3.jpg" alt="findacross.com">
					</figure>
				</div>
				<div class="item">
					<figure>
					<img src="http://www.findacross.com/img/slider/slider4.jpg" alt="findacross.com">
					</figure>
				</div>
				
			</div>
			<div class="listar-homebanner">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="listar-bannercontent">
								<h1>Findacross</h1>
								<!-- <h4>Find Local Services</h4> -->
								<div class="listar-description">
									<p>Find the best places in the city for food, activities and relaxation</p>
								</div>
								<form class="listar-formtheme listar-formsearchlisting">
									<fieldset>
									
											<?php

											
										echo '<div class="form-group listar-inputwithicon">
										<i class="icon-document-search"></i>
										<div class="listar-select">
												<select id="listar-categorieschosen1" class="listar-categorieschosen listar-chosendropdown">
													<option>Ex: Sparks design solutions</option>
														
												</select>
											</div>
										</div>';



echo '<div class="form-group listar-inputwithicon">
<i class="icon-layers"></i>
<div class="listar-select">
		<select id="listar-categorieschosen" class="listar-categorieschosen listar-chosendropdown">
			<option>All Categories</option>';

			if ($categories) { 
				while($obj = $categories->fetch_object())
				{
			echo '<option class="'.$obj->icon.'">'.$obj->name.'</option>';
				}
			}
			
	
	echo'</select>
	</div>
</div>';


										?>
										<!-- <div class="form-group listar-inputwithicon">
											<i class="icon-global"></i>
											<div class="listar-select listar-selectlocation">
												<select id="listar-locationchosen" class="listar-locationchosen listar-chosendropdown">
													<option>Choose a Location</option>
													<option>Lahore</option>
													<option>Bayonne</option>
													<option>Greenville</option>
													<option>Manhattan</option>
													<option>Queens</option>
													<option>The Heights</option>
												</select>
											</div>
										</div> -->
										
										<button type="button" class="listar-btn listar-btngreen">Search Places</button>
									</fieldset>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<main id="listar-main" class="listar-main listar-haslayout">


		
		<section class="listar-sectionspace listar-overlapcontent listar-bglight listar-haslayout">
				<div class="container">
					<div class="row">
						<div class="listar-features">
							<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
								<div class="listar-feature">
									<span class="listar-featureicon">
										<i class="icon-layers"></i>
									</span>
									<h2>
										<span class="listar-bluethemecolor">01</span> Choose a Category</h2>
									<div class="listar-description">
										<!-- <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh tempor cum soluta nobis consectetuer
											nihil imperdiet doming...</p> -->
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
								<div class="listar-feature">
									<span class="listar-featureicon">
										<i class="icon-map3"></i>
									</span>
									<h2>
										<span class="listar-bluethemecolor">02</span> Find Location</h2>
									<div class="listar-description">
										<!-- <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh tempor cum soluta nobis consectetuer
											nihil imperdiet doming...</p> -->
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
								<div class="listar-feature">
									<span class="listar-featureicon">
										<i class="icon-hotairballoon"></i>
									</span>
									<h2>
										<span class="listar-bluethemecolor">03</span> Go have Fun</h2>
									<div class="listar-description">
										<!-- <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh tempor cum soluta nobis consectetuer
											nihil imperdiet doming...</p> -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>



			<section class="listar-sectionspace listar-haslayout">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="listar-sectionhead">
								<div class="listar-sectiontitle">
									<h2>Latest Categories</h2>
								</div>
								<div class="listar-description">
									<p>Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra doloremque laudantium
										<a class="listar-bluethemecolor" href="javascript:void(0);">See All Categories</a>
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="container-fluid">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div id="listar-categoriespostslider" class="listar-themeposts listar-categoryposts listar-gridslider owl-carousel">
							<?php
$results = mysqli_query($con,"SELECT * FROM fa_category order by name");
    if ($results) { 
	
	   $i=0;
		//fetch results set as object and output HTML
        while($obj = $results->fetch_object())
        {
			if($i==0){
				echo '<div class="item">';
			}
			$i++;

			// if($i % 3 ==0){
			// 	echo '<div class="item">';
			// }
		echo'<div class="listar-themepost listar-categorypost">
					<figure class="listar-featuredimg">
						<a title="'.$obj->name.'" href="http://www.findacross.com/'.strtolower(urlencode($obj->name)).'.html">
								<img src="http://www.findacross.com/admin/uploads/'.$obj->image.'" alt="'.$obj->name.'">
							<div class="listar-contentbox">
								<div class="listar-postcontent">
									<span class="listar-categoryicon listar-flip">';
									if($obj->icon!=""){
									echo '<i class="'.$obj->icon.'"></i>';
									}else{
									echo '<i class="icon-heart2"></i>';
									}
									echo'</span>
									<h3>'.$obj->name.'</h3>';
									$count = mysqli_query($con,"SELECT COUNT(id) AS 'totalCount' FROM `fa_subcategory` where category=$obj->id");
									$row = $count->fetch_assoc();
									echo '<h4>'.$row["totalCount"].' available</h4>';
								echo'</div>
							</div>
						</a>
					</figure>
				</div>';

				if($i==2){
					echo '</div>';
					$i=0; //comment if i%3 
				}

				// if($i % 3 ==0){
				// 	echo '</div>';
				// 	$i=0;
				// }

		
		}
	}
?>	
										
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>


			
				<!--************************************
					Add Listing Start
			*************************************-->
			<section class="listar-themeparallax" data-appear-top-offset="600" data-parallax="scroll" data-image-src="https://ideasphere.com/wp-content/uploads/2016/08/Savin-NY-Website-Background-Web-1-1024x576.jpg">
				<div class="listar-parallaxcolor listar-parallaxaddlisting">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-push-2 col-md-8 col-lg-push-2 col-lg-8">
								<div class="listar-addlisting">
									<h2>Run and Grow Your Business With Finacross from Anywhere</h2>
									<a class="listar-btn listar-btngreen" href="javascript:void(0);">
										<i class="icon-plus"></i>
										<span>Add Listing</span>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Add Listing End
			*************************************-->


			
			<!--************************************
					Discover New Places Start
			*************************************-->
			<section class="listar-sectionspace listar-bglight listar-haslayout">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="listar-sectionhead">
								<div class="listar-sectiontitle">
									<h2>Recently Listed</h2>
								</div>
								<div class="listar-description">
									<p>Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra doloremque laudantium, totam
										rem aperiam</p>
								</div>
							</div>
							<div class="listar-horizontalthemescrollbar">
								<div class="listar-themeposts listar-placesposts">
									

<?php
								$results = mysqli_query($con,"SELECT * FROM fa_listing order by id desc LIMIT 0,10");								
								if ($results) { 
						        while($obj = $results->fetch_object()){
echo '<div class="listar-themepost listar-placespost">
		<figure class="listar-featuredimg">';
		
		
		$image = mysqli_query($con,"SELECT image AS 'image' FROM `fa_images` where lid=$obj->id order by id asc LIMIT 0,1");
		$row = $image->fetch_assoc();
		if($row["image"]){
			echo '<a title="'.$obj->buisnessname.'" href="http://www.findacross.com/'.$obj->bid.'.">
					<img class="maxHeight" src="http://www.findacross.com/admin/uploads/'.$row["image"].'" alt="'.$obj->buisnessname.'" title="'.$obj->buisnessname.'" class="mCS_img_loaded">
				</a>';
			}else{
				echo '<a title="'.$obj->buisnessname.'" href="http://www.findacross.com/'.$obj->bid.'.">
						<img src="img/noimage.jpg" alt="findacross.com" class="mCS_img_loaded">
					</a>';
		}
			echo'</figure>
		<div class="listar-postcontent">
			<h3>
				<a title="'.$obj->buisnessname.'" href="http://www.findacross.com/'.$obj->bid.'.">'.$obj->buisnessname.'</a>
			</h3>
			<div class="listar-description">
				<p>'.$obj->addline2.'</p>
			</div>';
			// <div class="listar-reviewcategory">
			// 	<div class="listar-review">
			// 		<span class="listar-stars">
			// 			<span></span>
			// 		</span>
			// 		<em>(3 Review)</em>
			// 	</div>
			// 	<a href="listingv1.html" class="listar-category">
			// 		<i class="icon-nightlife"></i>
			// 		<span>Night Life</span>
			// 	</a>
			// </div>
			echo'<div class="listar-themepostfoot">
				<a class="listar-location" href="javascript:void(0);">
					<i class="icon-icons74"></i>
					<em>'.$obj->city.'</em>
				</a>
				<div class="listar-postbtns">
				
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
	</div>';
								}
							}
								


							
?>

								</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Discover New Places End
			*************************************-->
		
				</main>
		<!--************************************
				Main End
		*************************************-->
	<?php
	include("footer.php");
	?>