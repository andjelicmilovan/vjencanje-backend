<?php

namespace App\Http\Controllers;

use App\Models\odbornik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class odbornikController extends Controller
{
    public  function show()
    {
        return DB::select('SELECT * FROM odborniks WHERE aktivan =1');
    }
    public  function  showById($id)
    {
        return odbornik::find($id);
    }
    public function dodaj(Request $req)
    {
        $odbornik = new odbornik();
        $odbornik->ime = $req->ime;
        $odbornik->prezime = $req->prezime;
        $odbornik->aktivan = 1;
        $odbornik->save();
        return DB::select('SELECT * FROM odborniks WHERE aktivan =1');
    }

    public function deaktiviraj($id)
    {
        $odbornik = odbornik::find($id);
        $odbornik->aktivan = 0;
        $odbornik->save();
        return DB::select('SELECT * FROM odborniks WHERE aktivan =1');
    }
}
