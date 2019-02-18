<?php snippet('header') ?>

<main>

	<div class="project-information text-center">
		<h1 class="project-title"><?php echo $page->title() ?></h1>
		<?php echo $page->introText()->kt() ?>
	</div>

	<?php foreach ($page->galleryitems()->toFiles() as $item): ?>

		<?php if ($image = $item): ?>
			<figure>
				<img 
				src="<?php echo $image->url() ?>"
				alt="<?php echo $image->alt() ?>">
			</figure>
		<?php endif ?>

	<?php endforeach ?>

	<div class="project-text">
		<?php echo $page->text()->kt() ?>
	</div>

	<div class="project-pagination">
		<div class="row">
			
			<div class="col-sm-4 col-xs-12">
			<?php if($prev = $page->prevListed('projectYear', 'desc')): ?>
					<a href="<?= $prev->url() ?>"> < </a>
			<?php endif ?>
			</div>

			<div class="col-sm-4 col-xs-12 text-center"> 
				<a href="<?php echo $page->parent()->url() ?>" title="<?php echo $page->parent()->title() ?>">X</a>
			</div>

			<div class="col-sm-4 col-xs-12 text-right">
			<?php if($next = $page->nextListed('projectYear', 'desc')): ?>
					<a href="<?= $next->url() ?>"> > </a>
			<?php endif ?>
			</div>

		</div>
	</div>
  
</main>

<?php snippet('footer') ?>
