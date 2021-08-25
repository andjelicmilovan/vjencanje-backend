<?php

namespace App\Http\Controllers;

use App\Models\pivot;
use App\Models\vjencanje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class vjencanjeController extends Controller
{
    public function show()
    {
        return vjencanje::all();
    }

    public function novi(Request $req)
    {
        $vjencanje = new  vjencanje;
        $vjencanje->maticni_registar_vjencanih= $req->maticni_registar_vjencanih;
        $vjencanje->tekuci_broj = $req->tekuci_broj;
        $vjencanje->redni_broj_strane= $req->redni_broj_strane;
        $vjencanje->user= $req->user;
        $vjencanje->datum_vjencanja = $req->datum_vjencanja;
        $vjencanje->mjesto_vjencanja = $req->mjesto_vjencanja;
        $vjencanje->interni_broj= $req->interni_broj;
        $vjencanje->ime_mladozenje = $req->ime_mladozenje;
        $vjencanje->prezime_mladozenje = $req->prezime_mladozenje;
        $vjencanje->novo_prezime_mladozenje = $req->novo_prezime_mladozenje;
        $vjencanje->jmbg_mladozenje = $req->jmbg_mladozenje;
        $vjencanje->pol_mladozenje = $req->pol_mladozenje;
        $vjencanje->datum_rodjenja_mladozenje= $req->datum_rodjenja_mladozenje;
        $vjencanje->nepotpuni_datum_rodjenja_mladozenje_dan= $req->nepotpuni_datum_rodjenja_mladozenje_dan;
        $vjencanje->nepotpuni_datum_rodjenja_mladozenje_mjesec= $req->nepotpuni_datum_rodjenja_mladozenje_mjesec;
        $vjencanje->nepotpuni_datum_rodjenja_mladozenje_godina= $req->nepotpuni_datum_rodjenja_mladozenje_godina;
        $vjencanje->mjesto_rodjenja_mladozenje = $req->mjesto_rodjenja_mladozenje;
        $vjencanje->opstina_rodjenja_mladozenje = $req->opstina_rodjenja_mladozenje;
        $vjencanje->drzava_rodjenja_mladozenje = $req->drzava_rodjenja_mladozenje;
        $vjencanje->drzavljanstvo_mladozenje = $req->drzavljanstvo_mladozenje;
        $vjencanje->mjesto_prebivalista_mladozenje = $req->mjesto_prebivalista_mladozenje;
        $vjencanje->ulica_prebivalista_mladozenje = $req->ulica_prebivalista_mladozenje;
        $vjencanje->broj_ulice_prebivalista_mladozenje = $req->broj_ulice_prebivalista_mladozenje;
        $vjencanje->ime_oca_mladozenje = $req->ime_oca_mladozenje;
//        $vjencanje->prezime_oca_mladozenje = $req->prezime_oca_mladozenje;
        $vjencanje->ime_majke_mladozenje = $req->ime_majke_mladozenje;
//        $vjencanje->prezime_majke_mladozenje = $req->prezime_majke_mladozenje;
        $vjencanje->prezime_rodjeno_majke_mladozenje = $req->prezime_rodjeno_majke_mladozenje;
        $vjencanje->ime_nevjeste = $req->ime_nevjeste;
        $vjencanje->prezime_nevjeste = $req->prezime_nevjeste;
        $vjencanje->novo_prezime_nevjeste = $req->novo_prezime_nevjeste;
        $vjencanje->jmbg_nevjeste = $req->jmbg_nevjeste;
        $vjencanje->pol_nevjeste = $req->pol_nevjeste;
        $vjencanje->datum_rodjenja_nevjeste= $req->datum_rodjenja_nevjeste;
        $vjencanje->nepotpuni_datum_rodjenja_nevjeste_dan= $req->nepotpuni_datum_rodjenja_nevjeste_dan;
        $vjencanje->nepotpuni_datum_rodjenja_nevjeste_mjesec= $req->nepotpuni_datum_rodjenja_nevjeste_mjesec;
        $vjencanje->nepotpuni_datum_rodjenja_nevjeste_godina= $req->nepotpuni_datum_rodjenja_nevjeste_godina;
        $vjencanje->mjesto_rodjenja_nevjeste = $req->mjesto_rodjenja_nevjeste;
        $vjencanje->opstina_rodjenja_nevjeste = $req->opstina_rodjenja_nevjeste;
        $vjencanje->drzava_rodjenja_nevjeste = $req->drzava_rodjenja_nevjeste;
        $vjencanje->drzavljanstvo_nevjeste = $req->drzavljanstvo_nevjeste;
        $vjencanje->mjesto_prebivalista_nevjeste = $req->mjesto_prebivalista_nevjeste;
        $vjencanje->ulica_prebivalista_nevjeste = $req->ulica_prebivalista_nevjeste;
        $vjencanje->broj_ulice_prebivalista_nevjeste = $req->broj_ulice_prebivalista_nevjeste;
        $vjencanje->ime_oca_nevjeste = $req->ime_oca_nevjeste;
//        $vjencanje->prezime_oca_nevjeste = $req->prezime_oca_nevjeste;
        $vjencanje->ime_majke_nevjeste = $req->ime_majke_nevjeste;
//        $vjencanje->prezime_majke_nevjeste = $req->prezime_majke_nevjeste;
        $vjencanje->prezime_rodjeno_majke_nevjeste = $req->prezime_rodjeno_majke_nevjeste;
        $vjencanje->ime_prvog_svjedoka= $req->ime_prvog_svjedoka;
        $vjencanje->prezime_prvog_svjedoka = $req->prezime_prvog_svjedoka;
        $vjencanje->mjesto_prebivalista_prvog_svjedoka = $req->mjesto_prebivalista_prvog_svjedoka;
        $vjencanje->ulica_prebivalista_prvog_svjedoka = $req->ulica_prebivalista_prvog_svjedoka;
        $vjencanje->broj_ulice_prvog_svjedoka = $req->broj_ulice_prvog_svjedoka;
        $vjencanje->ime_drugog_svjedoka= $req->ime_drugog_svjedoka;
        $vjencanje->prezime_drugog_svjedoka = $req->prezime_drugog_svjedoka;
        $vjencanje->mjesto_prebivalista_drugog_svjedoka = $req->mjesto_prebivalista_drugog_svjedoka;
        $vjencanje->ulica_prebivalista_drugog_svjedoka = $req->ulica_prebivalista_drugog_svjedoka;
        $vjencanje->broj_ulice_drugog_svjedoka = $req->broj_ulice_drugog_svjedoka;
        $vjencanje->odbornik = $req->odbornik;
        $vjencanje->maticar= $req->maticar;
        // $vjencanje->dokumenta = $req->dokumenta;
        $vjencanje->izjava_prezimena = $req->izjava_prezimena;
        $vjencanje->naknadni_upisi = $req->naknadni_upisi;
        $vjencanje->save();

        foreach ($req->dokumenta as $doc) {
            $vjencanje_doc = new pivot();

            $vjencanje_doc->vjencanje = $vjencanje->id;
            $vjencanje_doc->dokument = $doc;

            $vjencanje_doc->save();
        }

        return $vjencanje;

    }

    public function pretraziPoSuprugu(Request $request)
    {
//        return DB::select('SELECT * FROM VJENCANJES WHERE ime_mladozenje ="'.$req->ime_mladozenje .'" AND prezime_mladozenje="'.$req->prezime_mladozenje  .'" AND jmbg_mladozenje="'.$req->jmbg_mladozenje.'"');
        $ime_mladozenje= $request->ime_mladozenje;
        $prezime_mladozenje= $request->prezime_mladozenje;
        $jmbg_mladozenje= $request->jmgb_mladozenje;



//        $sve= tehnikapolja::select('tehnikapolja.*');
        $sve= vjencanje::select('vjencanjes.*');


        if ($ime_mladozenje)
            $sve = $sve->where('ime_mladozenje',$ime_mladozenje);

        if ($prezime_mladozenje)
            $sve = $sve->where('prezime_mladozenje',$prezime_mladozenje);

        if ($jmbg_mladozenje)

            $sve= $sve->where('jmbg_mladozenje',$jmbg_mladozenje);



        $sve = $sve->get();
//        for($i=0; $i<sizeof($sve);$i++){
//
//            $sve[$i]->slika = slika::where('slika_tehnika', $sve[$i]->id)->first();
//
//        }

        return  $sve;

    }

    public function  pretraziPoSupruzi(Request $req)
    {
       // return DB::select('SELECT * FROM VJENCANJES WHERE ime_nevjeste ="'.$req->ime_nevjeste .'" AND prezime_nevjeste="'.$req->prezime_nevjeste .'" AND jmbg_nevjeste="'.$req->jmbg_nevjeste.'"'  );
        $ime_nevjeste = $req->ime_nevjeste;
        $prezime_nevjeste= $req->prezime_nevjeste;
        $jmbg_nevjeste = $req->jmbg_nevjeste;

        $sve= vjencanje::select('vjencanjes.*');

        if($ime_nevjeste)
            $sve = $sve->where('ime_nevjeste', $ime_nevjeste);

        if($prezime_nevjeste)
            $sve = $sve->where('prezime_nevjeste', $prezime_nevjeste);

        if($jmbg_nevjeste)
            $sve = $sve->where('jmbg_nevjeste', $jmbg_nevjeste);

        $sve = $sve->get();

        return $sve;


    }
    public function edit($id, Request $req)
    {
        $vjencanje = DB::select('SELECT FROM vjencanjes WHERE id='.$id);
        $vjencanje->maticni_registar_vjencanih= $req->maticni_registar_vjencanih;
        $vjencanje->mtekuci_broj = $req->tekuci_broj;
        $vjencanje->redni_broj_strane= $req->redni_broj_strane;
        $vjencanje->user= $req->user;
        $vjencanje->datum_vjencanja = $req->datum_vjencanja;
        $vjencanje->mjesto_vjencanja = $req->mjesto_vjencanja;
        $vjencanje->interni_broj= $req->mjesto_vjencanja;
        $vjencanje->ime_mladozenje = $req->ime_mladozenje;
        $vjencanje->prezime_mladozenje = $req->prezime_mladozenje;
        $vjencanje->novo_prezime_mladozenje = $req->novo_prezime_mladozenje;
        $vjencanje->jmbg_mladozenje = $req->jmbg_mladozenje;
        $vjencanje->pol_mladozenje = $req->pol_mladozenje;
        $vjencanje->datum_rodjenja_mladozenje= $req->datum_rodjenja_mladozenje;
        $vjencanje->nepotpuni_datum_rodjenja_mladozenje_dan= $req->nepotpuni_datum_rodjenja_mladozenje_dan;
        $vjencanje->nepotpuni_datum_rodjenja_mladozenje_mjesec= $req->nepotpuni_datum_rodjenja_mladozenje_mjesec;
        $vjencanje->nepotpuni_datum_rodjenja_mladozenje_godina= $req->nepotpuni_datum_rodjenja_mladozenje_godina;
        $vjencanje->mjesto_rodjenja_mladozenje = $req->mjesto_rodjenja_mladozenje;
        $vjencanje->opstina_rodjenja_mladozenje = $req->opstina_rodjenja_mladozenje;
        $vjencanje->drzava_rodjenja_mladozenje = $req->drzava_rodjenja_mladozenje;
        $vjencanje->drzavljanstvo_mladozenje = $req->drzavljanstvo_mladozenje;
        $vjencanje->mjesto_prebivalista_mladozenje = $req->mjesto_prebivalista_mladozenja;
        $vjencanje->ulica_prebivalista_mladozenje = $req->ulica_prebivalista_mladozenje;
        $vjencanje->broj_ulice_prebivalista_mladozenja = $req->broj_ulice_prebivalista_mladozenja;
        $vjencanje->ime_oca_mladozenje = $req->ime_oca_mladozenje;
//        $vjencanje->prezime_oca_mladozenje = $req->prezime_oca_mladozenje;
        $vjencanje->ime_majke_mladozenje = $req->ime_majke_mladozenje;
//        $vjencanje->prezime_majke_mladozenje = $req->prezime_majke_mladozenje;
        $vjencanje->prezime_rodjeno_majke_mladozenje = $req->prezime_rodjeno_majke_mladozenje;
        $vjencanje->ime_nevjeste = $req->ime_nevjeste;
        $vjencanje->prezime_nevjeste = $req->prezime_nevjeste;
        $vjencanje->novo_prezime_nevjeste = $req->novo_prezime_nevjeste;
        $vjencanje->jmbg_nevjeste = $req->jmbg_nevjeste;
        $vjencanje->pol_nevjeste = $req->pol_nevjeste;
        $vjencanje->datum_rodjenja_nevjeste= $req->datum_rodjenja_nevjeste;
        $vjencanje->nepotpuni_datum_rodjenja_nevjeste_dan= $req->nepotpuni_datum_rodjenja_nevjeste_dan;
        $vjencanje->nepotpuni_datum_rodjenja_nevjeste_mjesec= $req->nepotpuni_datum_rodjenja_nevjeste_mjesec;
        $vjencanje->nepotpuni_datum_rodjenja_nevjeste_godina= $req->nepotpuni_datum_rodjenja_nevjeste_godina;
        $vjencanje->mjesto_rodjenja_nevjeste = $req->mjesto_rodjenja_nevjeste;
        $vjencanje->opstina_rodjenja_nevjeste = $req->opstina_rodjenja_nevjeste;
        $vjencanje->drzava_rodjenja_nevjeste = $req->drzava_rodjenja_nevjeste;
        $vjencanje->drzavljanstvo_nevjeste = $req->drzavljanstvo_nevjeste;
        $vjencanje->mjesto_prebivalista_nevjeste = $req->mjesto_prebivalista_nevjeste;
        $vjencanje->ulica_prebivalista_nevjeste = $req->ulica_prebivalista_nevjeste;
        $vjencanje->broj_ulice_prebivalista_nevjeste = $req->broj_ulice_prebivalista_nevjeste;
        $vjencanje->ime_oca_nevjeste = $req->ime_oca_nevjeste;
//        $vjencanje->prezime_oca_nevjeste = $req->prezime_oca_nevjeste;
        $vjencanje->ime_majke_nevjeste = $req->ime_majke_nevjeste;
//        $vjencanje->prezime_majke_nevjeste = $req->prezime_majke_nevjeste;
        $vjencanje->prezime_rodjeno_majke_nevjeste = $req->prezime_rodjeno_majke_nevjeste;
        $vjencanje->ime_prvog_svjedoka= $req->ime_prvog_svjedoka;
        $vjencanje->prezime_prvog_svjedoka = $req->prezime_prvog_svjedoka;
        $vjencanje->mjesto_prebivalista_prvog_svjedoka = $req->mjesto_prebivalista_prvog_svjedoka;
        $vjencanje->ulica_prebivalista_prvog_svjedoka = $req->ulica_prebivalista_prvog_svjedoka;
        $vjencanje->broj_ulice_prvog_svjedoka = $req->broj_ulice_prvog_svjedoka;
        $vjencanje->ime_drugog_svjedoka= $req->ime_drugog_svjedoka;
        $vjencanje->prezime_drugog_svjedoka = $req->prezime_drugog_svjedoka;
        $vjencanje->mjesto_prebivalista_drugog_svjedoka = $req->mjesto_prebivalista_drugog_svjedoka;
        $vjencanje->ulica_prebivalista_drugog_svjedoka = $req->ulica_prebivalista_drugog_svjedoka;
        $vjencanje->broj_ulice_drugog_svjedoka = $req->broj_ulice_drugog_svjedoka;
        $vjencanje->odbornik = $req->odbornik;
        $vjencanje->maticar= $req->maticar;
        $vjencanje->dokumenta = $req->dokumenta;
        $vjencanje->izjava_prezimena = $req->izjava_prezimena;
        $vjencanje->naknadni_upisi = $req->naknadni_upisi;
        $vjencanje->save();





        return $vjencanje;

    }
    public function findById($id)
    {
        return DB::select('SELECT * FROM vjencanjes WHERE id='.$id);
    }
}
