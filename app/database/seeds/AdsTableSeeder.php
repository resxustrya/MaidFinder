<?php
/**
 * Created by PhpStorm.
 * User: Lourence
 * Date: 8/14/2016
 * Time: 3:00 PM
 */
class AdsTableSeeder extends Seeder{
    public function run() {
        $ad = new Ads();
        $ad->empid = 2;
        $ad->regionid = 3;
        $ad->startdate = '2017-4-5';
        $ad->capacity = 'Full Time';
        $ad->salaryid = 3;
        $ad->pitch = 'A honest and hardworking helper that can handle any household work';
        $ad->dayof = 5;
        $ad->gender = 'Female';
        $ad->yearexp = 2;
        $ad->edlevel = 2;
        $ad->contractyears = 3;
        $ad->jobtypeid = 2;
        $ad->save();

        $duties = new Duties();
        $duties->adid = $ad->adid;
        $duties->cooking = "Cooking";
        $duties->laundry = "Laundry";
        $duties->gardening = "Gardening";
        $duties->grocery = "Grocery";
        $duties->cleaning = "Cleaning";
        $duties->tuturing = "Tutoring";
        $duties->other = "The helper must also help us taking our 3 year old child";
        $duties->save();

        //  END OF RECORD 1

        $ad = new Ads();
        $ad->empid = 3;
        $ad->regionid = 3;
        $ad->startdate = '2017-4-5';
        $ad->capacity = 'Full Time';
        $ad->salaryid = 3;
        $ad->pitch = 'A honest and hardworking helper that can handle any household work';
        $ad->dayof = 5;
        $ad->gender = 'Female';
        $ad->yearexp = 2;
        $ad->edlevel = 2;
        $ad->contractyears = 3;
        $ad->jobtypeid = 2;
        $ad->save();

        $duties = new Duties();
        $duties->adid = $ad->adid;
        $duties->cooking = "Cooking";
        $duties->laundry = "Laundry";
        $duties->gardening = "Gardening";
        $duties->grocery = "Grocery";
        $duties->cleaning = "Cleaning";
        $duties->tuturing = "Tutoring";
        $duties->other = "The helper must also help us taking our 3 year old child";
        $duties->save();

        //END OF RECORD 2

        $ad = new Ads();
        $ad->empid = 1;
        $ad->regionid = 3;
        $ad->startdate = '2017-4-5';
        $ad->capacity = 'Full Time';
        $ad->salaryid = 3;
        $ad->pitch = 'A honest and hardworking helper that can handle any household work';
        $ad->dayof = 5;
        $ad->gender = 'Female';
        $ad->yearexp = 2;
        $ad->edlevel = 2;
        $ad->contractyears = 3;
        $ad->jobtypeid = 2;
        $ad->save();

        $duties = new Duties();
        $duties->adid = $ad->adid;
        $duties->cooking = "Cooking";
        $duties->laundry = "Laundry";
        $duties->gardening = "Gardening";
        $duties->grocery = "Grocery";
        $duties->cleaning = "Cleaning";
        $duties->tuturing = "Tutoring";
        $duties->other = "The helper must also help us taking our 3 year old child";
        $duties->save();

        //END OF RECORD 3
    }
}