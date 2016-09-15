<?php

return [

	'theme' => [

		'folder' => 'themes',
		'active' => 'default'

	],

	'templates' => [

		'home' => csi\Templates\HomeTemplate::class,
		'blog' => csi\Templates\BlogTemplate::class,
		'blog.post' => csi\Templates\BlogPostTemplate::class,

	]

];