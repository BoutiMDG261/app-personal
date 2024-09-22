<?php

namespace App\managers;

use App\Models\Personal;

class PersonalManager
{
    public function store(array $data)
    {
        return Personal::create($data);
    }
}
