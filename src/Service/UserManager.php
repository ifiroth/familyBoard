<?php

namespace App\Service;

class UserManager
{
    public function getSlug(array $user): string {
        return ($user[0] .'-'. $user[1]);
    }
}
