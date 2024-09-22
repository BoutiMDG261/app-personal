<?php

namespace App\services;

use App\managers\PersonalManager;

class PersonalService
{
    protected PersonalManager $personalManager;

    public function __construct(PersonalManager $personalManager)
    {
        $this->personalManager = $personalManager;
    }

    public function store(array $data)
    {
        $personals = [];

        foreach ($data as $pers) {
            $personals[] = $this->personalManager->store($pers);
        }

        // $personals = $this->personalManager->store($data);

        return $personals;
    }
}
