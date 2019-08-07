<?php declare(strict_types=1);

namespace MusicSite\Menu;

interface MenuReader
{
    public function readMenu() : array;
}
