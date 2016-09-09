<?php

/**
 * Created by PhpStorm.
 * User: Lourence
 * Date: 8/20/2016
 * Time: 8:25 PM
 */
class SubscriptionTableSeeder extends Seeder {
    public function run() {
        $subscription = new Subscriptions();
        $subscription->planid = 1;
        $subscription->empid = 1;
        $subscription->save();

        $subscription = new Subscriptions();
        $subscription->planid = 2;
        $subscription->empid = 3;
        $subscription->save();
    }
}