<?php declare(strict_types = 1);

return [
	['GET', '/', ['MusicSite\Controllers\Homepage', 'show']],
	['GET', '/{slug}', ['MusicSite\Controllers\Page', 'show']],
];