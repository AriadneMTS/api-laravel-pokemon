<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BattleController extends Controller
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
     * Display the specified resource.
     */
    public function show(string $pokemon1, string $pokemon2)
    {
        //pegar os dados da api e salvar na variável $pokeData
        
        $pokeData1 =  Http::withOptions(['verify'=>false])->get("https://pokeapi.co/api/v2/pokemon/$pokemon1");

        $pokeData2 =  Http::withOptions(['verify'=>false])->get("https://pokeapi.co/api/v2/pokemon/$pokemon2");

        //verificação para ver se o pokemom escolhido existe
        if ($pokeData1 == "Not Found") {
            return "Esse pokemon não existe!";
        }

        if ($pokeData2 == "Not Found") {
            return "Esse pokemon não existe!";
        }

        if($pokeData1['forms'][0]['name'] == $pokeData2['forms'][0]['name']) {
            return "Empate";
        }

        $poke1Atack = $pokeData1['stats'][1]['base_stat'];

        $poke2Atack = $pokeData2['stats'][1]['base_stat'];

        if($poke1Atack > $poke2Atack){
            return[
                "Vencedor" => $pokeData1['forms'][0]['name']
            ];
        }


        if($poke1Atack < $poke2Atack){
            return[
                "Vencedor" => $pokeData2['forms'][0]['name']
            ];
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
