<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use Illuminate\Http\Request;

class PetsController extends Controller
{
    public function index(){
        $pets = Pet::all('id','name');

        return view('pets.index', [
            'pets' => $pets,
        ]);
    }

    public function create(){
        return view('pets.adicionar');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'specie' => 'required',
            'color' => 'required',
            'size' => 'required|max:2',
        ]);

        $pet = Pet::create([
            'name' => $request['name'],
            'specie' => $request['specie'],
            'color' => $request['color'],
            'size' => $request['size'],
        ]);

        return view('pets.show', [
            'pet' => $pet
        ]);
    }

    public function show(Pet $pet ){
        return view('pets.show', [
            'pet' => $pet
        ]);
    }

    /**
     * Atualiza os valores antigos de espécies  
     * 
     * @return void
     */
    public static function updateOldSpecieValues()
    {
        $pets = Pet::all();
        
        foreach ($pets as $pet) {
            switch ($pet->specie) {
                case 'bulbasauro':
                case 'charmander':
                case 'pikachu':
                case 'squirtle':
                    $pet->specie = 'pokémon';
                    break;
                case 'bunny':
                    $pet->specie = 'coelho';
                    break;
                case 'dog':
                    $pet->specie = 'cachorro';
                    break;
                case 'mamba':
                case 'mamba-negra':
                    $pet->specie = 'cobra';
                    break;
                case 'dragao de komodo':
                    $pet->specie = 'dragão de komodo';
                    break;    
                case 'papagaio':
                case 'periquito':
                    $pet->specie = 'ave';
                    break;    
                default:
                    break;
            }

            $pet->save();
        }
    }
    
    /**
     * Atualiza os valores antigos de tamanhos  
     * 
     * @return void
     */
    public static function updateOldSizeValues()
    {
        $pets = Pet::whereIn('size', ['large', 'm', 'medium', 'small', 'xl', 'xs'])->get();

        foreach ($pets as $pet) {
            switch ($pet->size) {
                case 'large':
                    $pet->size = 'L';
                    break;
                case 'm':
                case 'medium':
                    $pet->size = 'M';
                    break;
                case 'small':
                    $pet->size = 'S';
                    break;
                case 'xl':
                    $pet->size = 'XL';
                    break;
                case 'xs':
                    $pet->size = 'XS';
                    break;    
                default:
                    break;
            }

            $pet->save();
        }
    }
}
