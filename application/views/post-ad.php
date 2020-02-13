<?php
// echo '<pre>'; print_r($categories);die;
require('header.php');

?>

<div class="post-ad post-block">
	<div class="container">
		<div class="row">
			<div class="col-lg-5 offset-lg-1 p-0">
				<div class="border pt-3">
					<h4 class="text-center font-weight-bold">CHOOSE A CATEGORY</h4>
					<ul class="nav nav-pills flex-column list-unstyled category-tabs" role="tablist">
						 
					    <?php foreach ($categories as $category) { ?>
					    <li class="nav-item border-bottom">
					      <a class="nav-link" data-toggle="pill" href="#menu<?php echo $category['ID']; ?>"><?php echo $category['name'] ?></a>
					    </li>
						<?php } ?>
					</ul>
				</div>
			</div>

			<div class="col-lg-5 border border-left-0 p-0">
				<div class="tab-content sub-cate">
				<?php foreach ($categories  as $category) { ?>
				    <div id="menu<?php echo $category['ID']; ?>" class="container tab-pane p-0 w-100">
				    	<?php foreach ($sub_categories as $sub_category) {
				    		if ( $sub_category['cat_id'] == $category['ID']) {?>
						    	<a class="text-decoration-none" href="<?php echo base_url('post-an-ad/'.$sub_category['slug']) ?>"><li class="nav-item border-bottom sublist-design list-unstyled pt-4 pb-4 pl-2 text-secondary"><?php echo $sub_category['name'] ?></li></a>
				    		<?php } } ?>
				    </div>
				<?php } ?>

			  	</div>
			</div>
		</div>
	</div>
</div>




<?php require('footer.php'); ?>



<style>

.category-tabs .nav>li>a:focus, .nav>li>a:hover{
	background: rgb(84, 109, 126) !important;
	color: #fff;

}
.category-tabs a.nav-link {
    color: #353535;
    font-size: 16px;
		font-weight: 500;
}
.category-tabs .nav-link.active {
    background:rgb(58, 58, 58) !important;
}

.sublist-design{
	padding: 20px 10px !important;
	font-size: 18px;
}
.sublist-design:hover{
	color: #002f34 !important;
}


</style>
