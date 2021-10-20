<?php

namespace App\Http\Controllers;

use App\Models\annonce;
use App\Models\categorie;
use App\Models\sub_category;
use App\Models\sub_category_list;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class APIController extends Controller
{
    public function getSubCategory($subcategory){
        $categories = categorie::findOrfail($subcategory);

        $data = [];
        foreach($categories->sub_category as $sub_category){

            $list = [];
            foreach($sub_category->sub_category_list as $list_value){
                array_push($list,array("id"=> $list_value->id,"value"=>$list_value->value));
            }
            //dd($list);
            $data[]=[
                'id'=> $sub_category->id,
                'name'=>$sub_category->name,
                'is_obligatoir'=>$sub_category->is_obligatoir,
                'libelle'=>$sub_category->libelle,
                'placeholder'=>$sub_category->placeholder,
                'list'=>$list
            ];
        }


        return new JsonResponse($data,Response::HTTP_OK);
    }
    public function getSubcategoryValue(Request $request){
        $sub_category_list = sub_category_list::where("value","like","%".$request->get("query")."%")->get();

        $data = [];
        foreach($sub_category_list as $list){
            $data[]=[
                'id'=> $list->id,
                'name'=>$list->value,
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
