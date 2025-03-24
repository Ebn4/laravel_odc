<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Afficher la liste des catégories.
     */
    public function index()
    {
        return response()->json(Category::all(), 200);
    }

    /**
     * Enregistrer une nouvelle catégorie.
     */
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'name' => 'required|string|max:10',
            'content' => 'required|string'
        ]);

        // Création de la catégorie
        $category = Category::create([
            'name' => $request->name,
            'content' => $request->content
        ]);

        return response()->json([
            'message' => 'Catégorie créée avec succès',
            'category' => $category
        ], 201);
    }

    /**
     * Afficher une catégorie spécifique.
     */
    public function show(Category $category)
    {
        return response()->json($category, 200);
    }

    /**
     * Mettre à jour une catégorie.
     */
    public function update(Request $request, Category $category)
    {
        // Validation des données
        $request->validate([
            'name' => 'sometimes|string|max:10',
            'content' => 'sometimes|string'
        ]);

        // Mise à jour de la catégorie
        $category->update($request->only(['name', 'content']));

        return response()->json([
            'message' => 'Catégorie mise à jour avec succès',
            'category' => $category
        ], 200);
    }

    /**
     * Supprimer une catégorie.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json([
            'message' => 'Catégorie supprimée avec succès'
        ], 200);
    }
}
