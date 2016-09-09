<?php

/**
 * Created by PhpStorm.
 * User: Lourence
 * Date: 8/30/2016
 * Time: 1:54 PM
 */
class ApplyAdTableSeeder extends Seeder
{
    public function run() {
        $apply_ad = new ApplyAds();
        $apply_ad->adid = 4;
        $apply_ad->appid = 1;
        $apply_ad->isSeen = false;
        $apply_ad->message = "You must hire me because I can almost do all about your job ad";
        $apply_ad->save();
    }
}