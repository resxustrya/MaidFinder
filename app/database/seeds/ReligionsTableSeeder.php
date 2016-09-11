<?php
/**
 * Created by PhpStorm.
 * User: Lourence
 * Date: 9/10/2016
 * Time: 7:15 PM
 */


class ReligionsTableSeeder extends Seeder
{
    public function run() {

        $r = new Religions();
        $r->religion = 'Roman Catholic';
        $r->save();

        $r = new Religions();
        $r->religion = 'Muslim';
        $r->save();

        $r = new Religions();
        $r->religion = 'Christian';
        $r->save();

        $r = new Religions();
        $r->religion = 'Buddhist';
        $r->save();

        $r = new Religions();
        $r->religion = 'Hindu';
        $r->save();
    }
}