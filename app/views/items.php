<?php $pageTitle="Items" ?>
<?php require_once '../partials/template.php'; ?>

<?php function get_page_content () { 
	if (isset($_SESSION['user']) && $_SESSION['user']['roles_id'] == 1) {
	global $conn;
	?>


	<div class="container">
		<div class="row">
			<a href="./new_item.php" class="btn btn-primary"> Add New Item </a>	
		</div> <!-- end row -->

		<?php 

			$sql = "SELECT * FROM items";
			$items = mysqli_query($conn, $sql); ?>

		<div class="row">
			
		<?php foreach($items as $item) { ?>

			<div class="col-md-3 py-2">
				<div class="card h-100">
					<img src="<?php echo $item['image_path'] ?>" class="card-img-top">
					<div class="card-body">
						<h4 class="card-title"> <?php echo $item['name'] ?> </h4>
						<p class="card-text"><?php echo $item['description'] ?></p>
						<p class="card-text">Price: <?php echo $item['price'] ?></p>

						<input type="hidden" value="<?php echo $item['id'] ?>">
					</div> <!-- end card body -->

					<div class="card-footer">
						<a href="./edit_item.php?id=<?php echo $item['id'] ?>" class="btn btn-primary"> Edit Item </a>
						<a href="../controllers/delete_item.php?id=<?php echo $item['id'] ?>" class="btn btn-danger"> Delete Item </a>
					</div>

				</div> <!-- end card -->
			</div> <!-- end of cols -->

		<?php } ?>

		</div> <!-- end row -->

	</div> <!-- end container -->

<?php } else { 
	header ("location: ./error.php");

} ?>

















<?php } ?> <!-- end of get page content -->