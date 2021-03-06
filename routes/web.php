<?php

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index', ["players" => Usuario::all()->sortBy("tempo")->take(15)]);
});
Route::post('/', function (Request $request) {
    DB::beginTransaction();
    $create = Usuario::create(['nome' => $request->nome, 'tempo' => $request->tempo]);
    DB::commit();

    $count = 1;
    foreach (Usuario::all()->sortBy("tempo") as $teste){
        if($teste->id == $create->id){
            $colocacao = $count;
        }
        $count++;
    }

    return view('index', ["players" => Usuario::all()->sortBy("tempo")->take(15),
                            "colocacao" => $colocacao]);
});
