<?php  

	// Project set up.
	
	if ($image = $project->projectThumb()->toFile()) {
		$projectThumb = $image;
	}

	$projectTitle = $project->title();
	$projectYear = $project->projectYear();
	$projectLocation = $project->projectLocation();
	$projectMaterials = $project->projectMaterials();

?>



<?php 
// If page is EXHINITIONS then do layout left to right.
if ($page->is(page('exhibitions'))): ?>
	<div class="row row-padding">
		<div class="col-sm-4 col-xs-12"> 
			<?php if ($projectThumb): ?>
				<a href="<?php echo $project->url() ?>" title="<?php echo $project->title() ?>">
				<img 
				srcset="
					<?php echo $projectThumb->resize(512)->url() ?> 1x,
					<?php echo $projectThumb->resize(1024)->url() ?> 2x" 
				alt="<?php echo $projectThumb->alt() ?> ">
				</a>
			<?php else: ?>
				This project needs a project thumbnail.
			<?php endif ?>
		</div>
		<div class="col-sm-4 col-xs-12"> <?php echo $projectTitle ?> </div>
		<div class="col-sm-4 col-xs-12"> <?php echo $projectLocation->kt() ?> </div>
	</div>

<?php 
// If page is WORK then do layout right to left.
else: ?>


	<div class="row row-padding">
		<div class="col-sm-4 col-xs-12"> <?php echo $projectTitle ?> </div>
		<div class="col-sm-4 col-xs-12"> <?php echo $projectMaterials ?> </div>
		<div class="col-sm-4 col-xs-12"> 
			<?php if ($projectThumb): ?>
			<a href="<?php echo $project->url() ?>" title="<?php echo $project->title() ?>">
			<img 
			srcset="
				<?php echo $projectThumb->resize(512)->url() ?> 1x,
				<?php echo $projectThumb->resize(1024)->url() ?> 2x" 
			alt="<?php echo $projectThumb->alt() ?> ">
			</a>
			<?php endif ?>
		</div>
	</div>

<?php endif ?>