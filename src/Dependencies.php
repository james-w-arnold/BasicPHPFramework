<?php declare(strict_types = 1);

$injector = new \Auryn\Injector;

$injector->alias('Http\Request', 'Http\HttpRequest');
$injector->share('Http\HttpRequest');
$injector->define('Http\HttpRequest', [
	':get' => $_GET,
	':post' => $_POST,
	':cookies' => $_COOKIE,
	':files' => $_FILES,
	':server' => $_SERVER,
]);

$injector->alias('Http\Response', 'Http\HttpResponse');
$injector->share('Http\HttpResponse');

// define template engine
$injector->define('Mustache_Engine', [
	':options' => [
		'loader' => new Mustache_Loader_FilesystemLoader(dirname(__DIR__) . '/templates', [
			'extension' => '.html',
		])
	]
]);

$injector->delegate('\Twig\Environment', function() use ($injector) {
	$loader = new \Twig\Loader\FilesystemLoader(dirname(__DIR__) . '/templates' );
	$twig = new \Twig\Environment($loader);
	return $twig;
});

$injector->alias('MusicSite\Template\Renderer', 'MusicSite\Template\TwigRenderer');
$injector->alias('MusicSite\Template\FrontendRenderer', 'MusicSite\Template\FrontendTwigRenderer');


// Implement page reader
$injector->define('MusicSite\Page\FilePageReader', [
	':pageFolder' => __DIR__ . '/../pages',
]);

$injector->alias('MusicSite\Page\PageReader', 'MusicSite\Page\FilePageReader');
$injector->share('MusicSite\Page\FilePageReader');

$injector->alias('MusicSite\Menu\MenuReader', 'MusicSite\Menu\ArrayMenuReader');
$injector->share('MusicSite\Menu\ArrayMenuReader');

return $injector;