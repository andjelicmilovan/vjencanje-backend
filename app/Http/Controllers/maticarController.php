<?php

namespace App\Http\Controllers;

use App\Models\maticar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class maticarController extends Controller
{
    public function show()
    {
        return DB::select('SELECT * FROM vjencanje.maticars WHERE aktivan = 1');
    }
    public function  showById($id)
    {
        return maticar::find($id);
    }

    public function dodaj(Request $req)
    {
        $maticar = new maticar();
        $maticar->ime = $req->ime;
        $maticar->prezime= $req->prezime;
        $maticar->aktivan = 1;
        $maticar->save();
        return DB::select('SELECT * FROM maticars WHERE aktivan = 1');
    }

    public function deaktiviraj($id)
    {
        $maticar = maticar::find($id);
        $maticar->aktivan = 0;
        $maticar->save();
        return DB::select('SELECT * FROM maticars WHERE aktivan = 1');
    }
}
