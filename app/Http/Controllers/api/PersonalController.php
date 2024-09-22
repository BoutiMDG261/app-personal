<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePersonalRequest;
use App\services\PersonalService;
use Exception;
use Illuminate\Support\Facades\Hash;

class PersonalController extends Controller
{
    protected PersonalService $personalService;

    public function __construct(PersonalService $personalService)
    {
        $this->personalService = $personalService;
    }

    //add personal
    public function store(StorePersonalRequest $request)
    {
        try {
            $validatedPersonal = $request->validated();
            foreach ($validatedPersonal as &$personal) {
                $personal['code_acces'] = Hash::make($personal['code_acces']);
            }
            $personal = $this->personalService->store($validatedPersonal);

            return response()->json(["message" => "Personnel ajouté avec succès", "data" => $personal], 201);
        } catch (Exception $e) {

            return response()->json([
                'message' => 'Erreur lors de l\'ajout du personnel',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
