<?php declare(strict_types = 1);

namespace MusicSite\Template;

interface Renderer 
{
	public function render($render, $data = []) : string;
}