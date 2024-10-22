<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EntrepriseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Crée une entreprise avec un utilisateur associé.
     */
    public function createEntrepriseWithUser(Request $request)
    {
        try {
            // Valider les données de la requête
            $validatedData = $request->validate([
                'entreprise_nom' => 'required|string|max:255',
                'entreprise_pays' => 'required|string|max:255',
                'entreprise_ville' => 'required|string|max:255',
                'entreprise_devise' => 'required|string|max:255',
                'entreprise_abreviation_devise' => 'required|string',
                'utilisateur_nom' => 'required|string|max:255',
                'utilisateur_prenom' => 'nullable|string|max:255',
                'utilisateur_email' => 'required|string|email|max:255|unique:utilisateurs,email',
                'utilisateur_telephone' => 'required|string',
                'utilisateur_mot_de_passe' => 'required|string',
                'utilisateur_post' => 'required|string|max:255',
            ]);

            // Créer l'entreprise
            $entreprise = Entreprise::create([
                'nom' => $validatedData['entreprise_nom'],
                'pays' => $validatedData['entreprise_pays'],
                'ville' => $validatedData['entreprise_ville'],
                'devise' => $validatedData['entreprise_devise'],
                'abreviation_devise' => $validatedData['entreprise_abreviation_devise'],
            ]);

            // Créer l'utilisateur associé à l'entreprise
            $utilisateur = Utilisateur::create([
                'entreprise_id' => $entreprise->id,
                'nom' => $validatedData['utilisateur_nom'],
                'prenom' => $validatedData['utilisateur_prenom'],
                'email' => $validatedData['utilisateur_email'],
                'telephone' => $validatedData['utilisateur_telephone'],
                'mot_de_passe' => $validatedData['utilisateur_mot_de_passe'],
                'post' => $validatedData['utilisateur_post'],
            ]);

            return response()->json([
                'message' => 'Entreprise et admin créés avec succès',
                'entreprise' => $entreprise,
                'utilisateur' => $utilisateur,
            ], 201);
        } catch (\Exception $e) {
            // Gérer les erreurs
            Log::error(
                'Une erreur est survenue lors de la création de projets.',
                ['error' => $e->getMessage()]
            );
            
            return response()->json([
                'message' => 'Une erreur est survenue lors de la crée une entreprise avec un admin associé',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Entreprise $entreprise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Entreprise $entreprise)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Entreprise $entreprise)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Entreprise $entreprise)
    {
        //
    }
}
