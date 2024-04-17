<?php

namespace App\Http\Controllers;

use App\Models\Etudiants;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    //tous etudiants
    //url : http://127.0.0.1:8000/api/etudiant
    public function listEtudiants()
    {
        $etudiants = Etudiants::get();
        return response()->json([
            "status" => 1,
            "message" => "liste des étudiants récuperés",
            "data" => $etudiants
        ], 200);
    }

    //fonction pour créer un etudiant
    //url: http://127.0.0.1:8000/api/creer-etudiant
    public function create(Request $request)
    {
        //return requete
        //validation
        $request->validate([
            "nom" => "required",
            "email" => "required|email|unique:etudiants",
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

    //Single detail api -get
    //url: http://127.0.0.1:8000/api/etudiant/{id}
    public function getEtudiant($id)
    {
        //verifie si l'etudiant existe
        $etudiant = Etudiants::where('id', $id)->exists();
        if($etudiant)
        {
            $etudiantrecupere = Etudiants::find($id);
            return response()->json([
                "status" => 1,
                "message" => "etudiant recuperé",
                "data" => $etudiantrecupere
            ], 200);
        }else{
            return response()->json([
                "status" => 0,
                "message" => "Aucune données trouvé",
            ], 404);
        }
    }

    //Update api - put
    //URL : http://127.0.0.1:8000/api/update/{id}
    public function update(Request $request, $id)
    {
        //verifie si l'etudiant existe
        $etudiant = Etudiants::where('id', $id)->exists();
        if($etudiant){
            $etudiantModifie = Etudiants::find($id);
            $etudiantModifie->nom = $request->nom;
            $etudiantModifie->email = $request->email;
            $etudiantModifie->password = $request->password;
            $etudiantModifie->save();
            return response()->json([
                "status" => 1,
                "message" => "mise à jour effectué",
            ]);
        }else{
            return response()->json([
                "status" => 0,
                "message" => "étudiants introuvable" 
            ]);
        }
    }

    //Delete api - delete
    //url: http://127.0.0.1:8000/api/delete/{id}
    public function delete($id)
    {
        //verifie si l'étudiant existe
        $etudiant = Etudiants::where('id', $id)->exists();
        if($etudiant){
            $etudiantSupprime = Etudiants::find($id);
            $etudiantSupprime->delete();
            return response()->json([
                "status" => 1,
                "message" => "etudiant supprimé avec success",
            ], 200);
        }else{
            return response()->json([
                "status" => 0,
                "message" => "etudiant introuvable",
            ], 404);
        }
    }
}
