<?php
/**
 * Created by PhpStorm.
 * User: Lourence
 * Date: 9/10/2016
 * Time: 7:09 PM
 */



class NationaliltyTableSeeder extends Seeder
{
    public function run() {
        $n = new Nationalities();
        $n->nationality = 'Filipino';
        $n->save();

        $n = new Nationalities();
        $n->nationality = 'Japanese';
        $n->save();

        $n = new Nationalities();
        $n->nationality = 'American';
        $n->save();

        $n = new Nationalities();
        $n->nationality = 'British';
        $n->save();

        $n = new Nationalities();
        $n->nationality = 'Taiwanese';
        $n->save();

        $n = new Nationalities();
        $n->nationality = 'Chinise';
        $n->save();


    }
}