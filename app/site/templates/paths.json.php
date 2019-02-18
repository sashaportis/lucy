<?php

foreach($page->children() as $path) {

	foreach ($path->paths()->toStructure() as $pathItem) {
		if ($pathItem->image()->toFile()) {
 			$pathImage = $pathItem->image()->toFile()->url();
 			$pathImageSlug = $pathItem->image()->toFile()->parent()->slug();
 			$pathImageSlugURL = $pathItem->image()->toFile()->parent()->url();
 			$pathImageText = $pathItem->commentImage()->kt();

 			
		} else {
			$pathImage = null;
			$pathImageSlug = null;
			$pathImageSlugURL = null;
			$pathImageText = null;
		}

		if ($pageText = $pathItem->pageText()->toPage()) {
			$pathPageSlug = $pageText->slug();
 			$pathPageSlugURL = $pageText->url();
 			$pathPageSlugText = $pathItem->commentText()->kt();
		} else {
			$pathPageSlug = null;
 			$pathPageSlugURL = null;
 			$pathPageSlugText = null;
		}

	  $json[] = [
	    'user'   => (string)$path->title(),
	    'imageURL'   => (string)$pathImage,
	    'slug'   => (string)$pathImageSlug,
	    'slugURL'   => (string)$pathImageSlugURL,
	    'imageText'   => (string)$pathImageText,
	    'pathPageSlug'   => (string)$pathPageSlug,
	    'pathPageSlugURL'   => (string)$pathPageSlugURL,
	    'pathPageSlugText'   => (string)$pathPageSlugText
	  ];

	}


}


$data = [
  'title' => $page->title()->value(),
  'text'  => $page->text()->kirbytext()->value()
];

echo json_encode($json);