<!doctype html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title><?= $site->title() ?></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flexboxgrid/6.3.1/flexboxgrid.min.css" type="text/css" >
  <?= css(['assets/css/style.css', '@auto']) ?>

</head>
<body class="template_<?php echo $page->template() ?>">

  <div class="page">

    <header class="header">
    	
    	<nav class="site-nav text-center">
    		<ul>

          <?php 
          function checkActive($ancestor) {
              if ($ancestor->isActive()){
                return "active";
              } 
          } ?>
          
    			<li class="<?php e(page('home')->isActive(), 'active') ?>"> <a href="<?php echo page('home')->url() ?>"><?php echo page('paths')->title() ?></a></li>
    			<li class="<?php echo checkActive(page('exhibitions')) ?>"> <a href="<?php echo page('exhibitions')->url() ?>"><?php echo page('exhibitions')->title() ?></a></li>
    			<li class="<?php echo checkActive(page('works')) ?>"> <a href="<?php echo page('works')->url() ?>"><?php echo page('works')->title() ?></a></li>
    			<li class="<?php echo checkActive(page('annotators')) ?>"> <a href="<?php echo page('annotators')->url() ?>"><?php echo page('annotators')->title() ?></a></li>
    		</ul>
    	</nav>

    </header>


