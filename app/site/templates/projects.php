<?php snippet('header') ?>

<main>
  
	<?php foreach ($page->children()->sortBy('projectYear', 'desc') as $project): ?>
		<?php snippet('project-preview', array('project' => $project)) ?>
	<?php endforeach ?>

</main>
 
<?php snippet('footer') ?>
