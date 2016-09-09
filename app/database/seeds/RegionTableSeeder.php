<?php
/**
 * Created by PhpStorm.
 * User: Lourence
 * Date: 8/14/2016
 * Time: 3:04 PM
 */

class RegionTableSeeder extends Seeder {
    public function run() {
        $regions = new Regions();
        $regions->location = 'Cebu City';
        $regions->save();

        $regions = new Regions();
        $regions->location = 'Davao city';
        $regions->save();

        $regions = new Regions();
        $regions->location = 'Zaboanga Del Sur';
        $regions->save();

        $regions = new Regions();
        $regions->location = 'Zamboanga Del Norte';
        $regions->save();


        $regions = new Regions();
        $regions->location = 'Mandaue City';
        $regions->save();

        $regions = new Regions();
        $regions->location = 'Danao City';
        $regions->save();

        $regions = new Regions();
        $regions->location = 'Consocalcion City';
        $regions->save();

        $regions = new Regions();
        $regions->location = 'Lilion City';
        $regions->save();

        $regions = new Regions();
        $regions->location = 'Talisay City';
        $regions->save();

        $regions = new Regions();
        $regions->location = 'Lapu-Lapu City';
        $regions->save();
    }
}
