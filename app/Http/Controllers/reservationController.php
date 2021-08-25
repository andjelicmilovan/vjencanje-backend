<?php

namespace App\Http\Controllers;

use App\Models\reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Webmozart\Assert\Assert;

class reservationController extends Controller
{
    public function show()
    {
        return reservation::all();
    }
    public function addReservation(Request $request)
    {


//        foreach ($sveRezervacije as $sveRezervacije)
//        {
//            if($sveRezervacije->termin == $request->termin)
//            {
//                return 1;
//
//            }else
//            {
//                return 2;
//            }
//        }


        $reservation = new reservation();
        $reservation->termin = $request->termin;
        $reservation->mladozenja = $request->mladozenja;
        $reservation->jmbg_mladozenje = $request->jmbg_mladozenje;
        $reservation->nevjesta = $request->nevjesta;
        $reservation->jmbg_nevjeste = $request->jmbg_nevjeste;
        $reservation->save();
        $sveRezervacije = reservation::all();
        $brojRezervacija = sizeof($sveRezervacije);
        $i = 0;
        while($i<($brojRezervacija-1))
        {
            if($sveRezervacije[$i]->termin == $sveRezervacije[$brojRezervacija-1]->termin) {
                DB::select('DELETE FROM reservations WHERE id='.$sveRezervacije[$brojRezervacija-1]->id);
                return 1;
            }
            $i++;

        }
        return reservation::all();



    }

    public function delete($id)
    {
        DB::select('DELETE FROM reservations WHERE id='.$id);
        return reservation::all();
    }
}
