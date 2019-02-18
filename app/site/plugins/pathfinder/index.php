<?php 

	Kirby::plugin('joseph-pleass/pathfinder', [
	    'fields' => [
	        'pathfinder' => [
	           'props' => [
	                'comment' => function ($comment) {
	                    return $comment;
	                }
	            ]
	        ]
	    ]
	]);