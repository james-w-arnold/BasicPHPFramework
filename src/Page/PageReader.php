<?php declare(strict_types = 1);

namespace MusicSite\Page;

interface PageReader 
{
	public function readBySlug(string $slug) : string;
}