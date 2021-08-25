<?php

namespace App\Http\Controllers;

use App\Models\dokumenta;
use Illuminate\Http\Request;

class dokumentaController extends Controller
{
    public function show()
    {
        return dokumenta::all();
    }
    public function  showById($id)
    {
        return dokumenta::find($id);
    }
}
