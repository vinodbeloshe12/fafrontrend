<?php
include("db.php");
$category_name = $_GET['maincategory'];
$subcategory_name = $_GET['subcategory'];
$getCategoryId = mysqli_query($con,"SELECT id as 'id' FROM fa_subcategory WHERE name='$subcategory_name'");
$row = $getCategoryId->fetch_assoc();
$subcategory_id = $row['id'];
$listings = mysqli_query($con,"SELECT * FROM fa_listing WHERE subcategory=$subcategory_id");
$_tpl = array();
$_tpl['title'] = ''.$subcategory_name.','.$category_name.'';
$_tpl['meta_desc'] = 'Findacross,'.$subcategory_name.','.$category_name.' in Mumbai';
$_tpl['meta_keywords'] = 'Findacross,'.$subcategory_name.','.$category_name.' in Mumbai';
include("header.php");
?>

<title><?php echo ucwords($subcategory_name) ?> - Findacross</title>
  <meta name="description" content="Findacross,free listing sites for
    b2b, b2c a local search engine. <?php echo $subcategory_name ?>, <?php echo $category_name ?> in Mumbai, India " />
  <meta name="keywords" content="findacross.com,<?php echo $category_name ?>, <?php echo $subcategory_name ?> in Bhandup,<?php echo $subcategory_name ?> in Mumbai, India">


<main id="listar-main" class="listar-main listar-haslayout mt60">
			<div id="listar-content" class="listar-content">
				<div class="listar-listing listar-listingvone">

					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-left">
						<div class="row">
							<div class="listar-listingarea">
								<div class="listar-innerpagesearch">
									<div class="listar-innersearch">
										<div class="listar-searchstatus">
											<h1>
												<span>Results For</span> <?php echo $subcategory_name; ?></h1>
										</div>

									</div>
								</div>
								<div class="listar-themeposts listar-placesposts listar-gridview">
				<?php				if  (mysqli_num_rows($listings)>0) { 
						        while($obj = $listings->fetch_object()){
									
							echo '<div class="listar-themepost listar-placespost">
										<figure class="listar-featuredimg">';
										$image = mysqli_query($con,"SELECT image AS 'image' FROM `fa_images` where lid=$obj->id order by id asc LIMIT 0,1");
										$row = $image->fetch_assoc();
										if($row["image"]){
											echo '<a href="http://www.findacross.com/'.$obj->bid.'.">											
													<img class="maxHeight" src="http://www.findacross.com/admin/uploads/'.$row["image"].'" alt="image description" class="mCS_img_loaded">
												</a>';
											}else{
												echo '<a href="detailv1.html">
														<img src="img/noimage.jpg" alt="image description" class="mCS_img_loaded">
													</a>';
										}
										echo '</figure>
										<div class="listar-postcontent">
											<h3>
												<a href="http://www.findacross.com/'.$obj->bid.'.">'.$obj->buisnessname.'</a>
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
												
											// </div>
										echo '<div class="listar-themepostfoot">
												<a class="listar-location" href="javascript:void(0);">
													<i class="icon-icons74"></i>
													<em>'.$obj->city.'</em>
												</a>
												<div class="listar-postbtns">';
													// <a class="listar-btnquickinfo" href="#" data-toggle="modal" data-target=".listar-placequickview">
													// 	<i class="icon-expand"></i>
													// </a>
													// <a class="listar-btnquickinfo" href="javascript:void(0);">
													// 	<i class="icon-heart2"></i>
													// </a>
												echo '<div class="listar-btnquickinfo">
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
										</div>';
								}
							}
							else{
								echo '<h3 align="center">No listings found</h4>';
							}
									?>
									</div>
								
								
									
									
								
									<!-- <nav class="listar-pagination">
										<ul>
											<li class="listar-prevpage">
												<a href="javascript:void(0);">
													<i class="fa fa-angle-left"></i>
												</a>
											</li>
											<li class="listar-active">
												<a href="javascript:void(0);">1</a>
											</li>
											<li>
												<a href="javascript:void(0);">2</a>
											</li>
											<li>
												<a href="javascript:void(0);">3</a>
											</li>
											<li class="listar-nextpage">
												<a href="javascript:void(0);">
													<i class="fa fa-angle-right"></i>
												</a>
											</li>
										</ul>
									</nav> -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
        </main>
        

        <?php
	include("footer.php");
	?>