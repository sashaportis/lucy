<?php snippet('header') ?>

<main>

<div class="paths-wrapper">
	
	<div class="path text-center">	

		<?php foreach (page('paths')->children() as $path): ?>
		<a href="<?php echo $path->paths()->toStructure()->first()->image()->toFile()->parent()->url() ?>#PATH_01" title="">
			<ul>
				<?php $pathCount = $path->paths()->toStructure()->count()-1 ?>
				<?php foreach ($path->paths()->toStructure() as $pathItem): ?>

					<?php if ($image = $pathItem->image()->toFile()): ?>
						<li>
							<?php echo $image->parent()->title() ?>
							<?php if ($pathCount): ?>
								<span class="path-arrow"> > </span> 
							<?php endif ?>
						</li>
					<?php endif ?>

					<?php if($pageText = $pathItem->pageText()->toPage()): ?>
						<li>
					  		<?= $pageText->title() ?>
							<?php if ($pathCount): ?>
					  			<span class="path-arrow"> > </span> 
					  		<?php endif ?>
						</li>
					<?php endif ?>
				
				
					<?php $pathCount-- ?>
				<?php endforeach ?>
			</ul>
			<h5>Path By <?php echo $path->title() ?></h5>
			</a>
		<?php endforeach ?>
	</div>

</div>

</main>

<?php snippet('footer') ?>
