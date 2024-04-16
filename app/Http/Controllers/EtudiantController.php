<?php

namespace App\Http\Controllers;

use App\Models\Etudiants;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listEtudiants()
    {
        //
    }

    //fonction pour créer un etudiant
    public function create(Request $request)
    {
        //return requete
        //validation
        $request->validate([
            "nom" => "required",
            "email" => "require|email|unique:etudiants",
            "password" => "required"
        ]);

        //créer un étudiant
        $etudiant = new Etudiants();
        $etudiant->nom = $request->nom;
        $etudiant->email = $request->email;
        $etudiant->password = $request->password;
        $etudiant->save();
        
        //renvoi de réponse personnalisé
        return response()->json([
            "status" => 1,
            "message" => "etudiant créer avec success"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getEtudiant($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
