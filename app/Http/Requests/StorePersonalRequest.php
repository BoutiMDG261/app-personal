<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePersonalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Autorise la requête, change ceci à false si tu veux restreindre l'accès
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            '*.matricule' => 'required|integer|unique:personals,matricule',
            '*.nom' => 'required|string|max:255',
            '*.prenom' => 'required|string|max:255',
            '*.date_embauche' => 'required|date',
            '*.poste' => 'required|string|max:255',
            '*.email' => 'required|email|unique:personals,email|max:255',
            '*.code_acces' => 'required|string|min:6',
            '*.actif' => 'required|in:oui,non',
            '*.role' => 'required|in:admin,simple',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'matricule.required' => 'Le matricule est obligatoire.',
            'matricule.unique' => 'Ce matricule est déjà utilisé.',
            'nom.required' => 'Le nom est obligatoire.',
            'prenom.required' => 'Le prénom est obligatoire.',
            'email.required' => 'L\'email est obligatoire.',
            'email.email' => 'L\'email doit être valide.',
            'email.unique' => 'Cet email est déjà utilisé.',
            'code_acces.required' => 'Le code d\'accès est obligatoire.',
            'code_acces.min' => 'Le code d\'accès doit comporter au moins 6 caractères.',
            'actif.required' => 'Le statut actif est obligatoire.',
            'actif.in' => 'Le statut actif doit être "oui" ou "non".',
            'role.required' => 'Le rôle est obligatoire.',
            'role.in' => 'Le rôle doit être "admin" ou "simple".',
        ];
    }
}
