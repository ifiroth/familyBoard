<?php

namespace App\Service;

class LinkManager
{
    static public function getLinks(string $action = null) : array
    {
        return [
            'activity' =>
                [ 'links', 'form', 'list' ],
            'home',
            'hello',
        ];
    }
}
