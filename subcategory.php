<?php
include("db.php");
$category_name = $_GET['category'];
$_tpl = array();
$_tpl['title'] = ''.$category_name.'';
$_tpl['meta_desc'] = 'Findacross,free listing sites for
b2b, b2c a local search engine.'.$category_name.'in Mumbai, India';
$_tpl['meta_keywords'] = 'Findacross.com, '.$category_name.' in Bhandup,'.$category_name.' in Mumbai, India';
include("header.php");
$getCategoryId = mysqli_query($con,"SELECT id as 'id' FROM fa_category WHERE name='$category_name'");
$row = $getCategoryId->fetch_assoc();
$category_id = $row['id'];
$subcategories = mysqli_query($con,"SELECT * FROM fa_subcategory WHERE category=$category_id order by name");
?>
<head>
	

	
		<!--************************************
				Main Start
		*************************************-->
		<main id="listar-main" class="listar-main listar-haslayout">
			<!--************************************
					Explore The Category Start
			*************************************-->
		<section class="listar-sectionspace listar-haslayout mt60">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="listar-sectionhead">
								<div class="listar-sectiontitle">
							<?php	echo '<h1>'.$category_name.'</h1>'; ?>
								</div>
							</div>
						</div>
						<div class="listar-themeposts listar-categoryposts">
							<?php
							   if ($subcategories) { 
								//fetch results set as object and output HTML
								while($obj = $subcategories->fetch_object())
								{

							echo '<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
								<div class="listar-themepost listar-categorypost">
									<figure class="listar-featuredimg">
										
										<a href="http://www.findacross.com/'.$category_name.'/'.urlencode($obj->name).'/">';
										if($obj->image!=""){
										echo '<img src="http://www.findacross.com/admin/uploads/'.$obj->image.'" alt="'.$obj->name.'" title="'.$obj->name.'">';
										}else{
										echo '<img src="img/nocatimage.jpg" alt="'.$obj->name.'">';
										}
										echo '<div class="listar-contentbox">
												<div class="listar-postcontent">
													<span class="listar-categoryicon listar-flip">';
													if($obj->icon!=""){
														echo '<i class="'.$obj->icon.'"></i>';
														}else{
														echo '<i class="icon-heart2"></i>';
														}
												echo '</span>
													<h3>'.$obj->name.'</h3>';
													$count = mysqli_query($con,"SELECT COUNT(id) AS 'totalCount' FROM `fa_listing` where subcategory=$obj->id");
													$row = $count->fetch_assoc();
													echo '<h4>'.$row["totalCount"].' listed</h4>';
													echo '</div>
											</div>
										</a>
									</figure>
								</div>
							</div>';
								}
							}
							
							?>


						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Explore The City End
			*************************************-->

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


		
				</main>
		<!--************************************
				Main End
		*************************************-->
	<?php
	include("footer.php");
	?>