<?php
$_tpl = array();
$_tpl['title'] = '404 Page Not Found';
include("header.php");
?>
<main id="listar-main" class="listar-main listar-haslayout">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div id="listar-content" class="listar-content">
							<div class="listar-404error">
								<h2>404<span>Page not Found</span></h2>
								<h3>Sorry but the page that you are looking for does not exist</h3>
								<a class="listar-btn listar-btngreen" href="javascript:void(0);">Go Back to Home</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>

        <?php
        include("footer.php");
        ?>