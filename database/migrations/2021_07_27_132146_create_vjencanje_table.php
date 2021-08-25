<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVjencanjeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vjencanjes', function (Blueprint $table) {
            $table->id();
            $table->string('maticni_registar_vjencanih')->nullable();
            $table->string('maticno_podrucje')->nullable();
            $table->string('tekuci_broj')->nullable();
            $table->string('redni_broj_strane')->nullable();
            $table->bigInteger('user')->unsigned()->nullable();
            $table->foreign('user')->references('id')->on('users');
            $table->date('datum_vjencanja')->nullable();
            $table->string('mjesto_vjencanja')->nullable();
            $table->string('interni_broj')->nullable();
            $table->string('ime_mladozenje');
            $table->string('prezime_mladozenje');
            $table->string('novo_prezime_mladozenje')->nullable();
            $table->string('jmbg_mladozenje')->nullable();
            $table->string('pol_mladozenje')->nullable();
            $table->date('datum_rodjenja_mladozenje')->nullable();
            $table->string('nepotpuni_datum_rodjenja_mladozenje_dan')->nullable();
            $table->string('nepotpuni_datum_rodjenja_mladozenje_mjesec')->nullable();
            $table->string('nepotpuni_datum_rodjenja_mladozenje_godina')->nullable();
            $table->string('mjesto_rodjenja_mladozenje')->nullable();
            $table->string('opstina_rodjenja_mladozenje')->nullable();
            $table->string('drzava_rodjenja_mladozenje')->nullable();
            $table->string('drzavljanstvo_mladozenje')->nullable();
            $table->string('mjesto_prebivalista_mladozenje')->nullable();
            $table->string('ulica_prebivalista_mladozenje')->nullable();
            $table->string('broj_ulice_prebivalista_mladozenje')->nullable();
            $table->string('ime_oca_mladozenje')->nullable();
            $table->string('ime_majke_mladozenje')->nullable();
            $table->string('prezime_rodjeno_majke_mladozenje')->nullable();
            $table->string('ime_nevjeste');
            $table->string('prezime_nevjeste');
            $table->string('novo_prezime_nevjeste')->nullable();
            $table->string('jmbg_nevjeste')->nullable();
            $table->string('pol_nevjeste')->nullable();
            $table->date('datum_rodjenja_nevjeste')->nullable();
            $table->string('nepotpuni_datum_rodjenja_nevjeste_dan')->nullable();
            $table->string('nepotpuni_datum_rodjenja_nevjeste_mjesec')->nullable();
            $table->string('nepotpuni_datum_rodjenja_nevjeste_godina')->nullable();
            $table->string('mjesto_rodjenja_nevjeste')->nullable();
            $table->string('opstina_rodjenja_nevjeste')->nullable();
            $table->string('drzava_rodjenja_nevjeste')->nullable();
            $table->string('drzavljanstvo_nevjeste')->nullable();
            $table->string('mjesto_prebivalista_nevjeste')->nullable();
            $table->string('ulica_prebivalista_nevjeste')->nullable();
            $table->string('broj_ulice_prebivalista_nevjeste')->nullable();
            $table->string('ime_oca_nevjeste')->nullable();
            $table->string('ime_majke_nevjeste')->nullable();
            $table->string('prezime_rodjeno_majke_nevjeste')->nullable();
            $table->string('ime_prvog_svjedoka')->nullable();
            $table->string('prezime_prvog_svjedoka')->nullable();
            $table->string('mjesto_prebivalista_prvog_svjedoka')->nullable();
            $table->string('ulica_prebivalista_prvog_svjedoka')->nullable();
            $table->string('broj_ulice_prvog_svjedoka')->nullable();
            $table->string('ime_drugog_svjedoka')->nullable();
            $table->string('prezime_drugog_svjedoka')->nullable();
            $table->string('mjesto_prebivalista_drugog_svjedoka')->nullable();
            $table->string('ulica_prebivalista_drugog_svjedoka')->nullable();
            $table->string('broj_ulice_drugog_svjedoka')->nullable();
            $table->bigInteger('odbornik')->unsigned();
            $table->foreign('odbornik')->references('id')->on('odborniks');
            $table->bigInteger('maticar')->unsigned();
            $table->foreign('maticar')->references('id')->on('maticars');
            $table->string('izjava_prezimena')->nullable();
            $table->string('naknadni_upisi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vjencanjes', function (Blueprint $table) {
            $table->dropForeign('vjencanjes_user_foreign');
            $table->dropForeign('vjencanjes_odbornik_foreign');
            $table->dropForeign('vjencanjes_maticar_foreign');
        });

        Schema::dropIfExists('vjencanjes');
    }
}
