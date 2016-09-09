<?php

/**
 * Created by PhpStorm.
 * User: Lourence
 * Date: 8/20/2016
 * Time: 8:18 PM
 */
class PlanTableSeeder extends Seeder {
    public function run()
    {
        $plan = new Plans();
        $plan->plan_type = "Gold";
        $plan->month_expyr = 5;
        $plan->description = "Create unlimited ads with no expiry. One time payments no upgrades";
        $plan->price = 500.00;
        $plan->save();

        $plan = new Plans();
        $plan->plan_type = "Silver";
        $plan->month_expyr = 2;
        $plan->description = "Can create only one job ad at a time and expires in two months.";
        $plan->price = 300.00;
        $plan->save();
    }
}