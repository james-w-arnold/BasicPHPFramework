<?php declare(strict_types = 1);

namespace MusicSite\Page;

use Exception;

class InvalidPageException extends Exception
{
	public function __construct( $slug, $code = 0, Exception $previous = null )
	{
		$message = "No page with slug `$slug` was found";
		parent::__construct( $message, $code, $previous );
	}
}