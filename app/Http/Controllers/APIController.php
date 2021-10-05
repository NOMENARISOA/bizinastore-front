<?php

namespace App\Http\Controllers;

use App\Models\annonce;
use App\Models\categorie;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class APIController extends Controller
{
    public function getSubCategory($subcategory){
        $categories = categorie::findOrfail($subcategory);

        $data = [];
        foreach($categories->sub_category as $sub_category){
            $data[]=[
                'id'=> $sub_category->id,
                'name'=>$sub_category->name,
                'is_obligatoir'=>$sub_category->is_obligatoir,
                'libelle'=>$sub_category->libelle,
                'placeholder'=>$sub_category->placeholder,
            ];
        }

        return new JsonResponse($data,Response::HTTP_OK);
    }

    public function autocompleteSearch(Request $request)
    {
          $query = $request->get('term');
          $filterResult = annonce::where('titre', 'LIKE', '%'. $query. '%')->get();
          $filterResult = annonce::select('titre')->where('titre', 'LIKE', '%'. $query. '%')->pluck('titre');;
          return response()->json($filterResult);
    }
}
