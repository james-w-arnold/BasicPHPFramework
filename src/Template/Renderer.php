<?php declare(strict_types = 1);

namespace MusicSite\Template;

interface Renderer 
{
	public function render($template, $data = []) : string;
}