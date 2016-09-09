<?php
/**
 * Created by PhpStorm.
 * User: Lourence
 * Date: 8/14/2016
 * Time: 2:57 PM
 */

class SalaryTableSeeder extends Seeder {
    public function run() {
        $salary = new Salaries();
        $salary->amount_range = "1000";
        $salary->save();

        $salary = new Salaries();
        $salary->amount_range = "1500 - 2000";
        $salary->save();

        $salary = new Salaries();
        $salary->amount_range = "2000";
        $salary->save();

        $salary = new Salaries();
        $salary->amount_range = "2500 - 3000";
        $salary->save();

        $salary = new Salaries();
        $salary->amount_range = "3000";
        $salary->save();

        $salary = new Salaries();
        $salary->amount_range = "3500 - 4000";
        $salary->save();

        $salary = new Salaries();
        $salary->amount_range = "4000";
        $salary->save();

        $salary = new Salaries();
        $salary->amount_range = "4500 - 5000";
        $salary->save();

        $salary = new Salaries();
        $salary->amount_range = "5500 - 6000";
        $salary->save();

        $salary = new Salaries();
        $salary->amount_range = "6000";
        $salary->save();

        $salary = new Salaries();
        $salary->amount_range = "6500 - 7000";
        $salary->save();

        $salary = new Salaries();
        $salary->amount_range = "8000";
        $salary->save();

        $salary = new Salaries();
        $salary->amount_range = "8500 - 9000";
        $salary->save();

        $salary = new Salaries();
        $salary->amount_range = "9500 - 10,000";
        $salary->save();

        $salary = new Salaries();
        $salary->amount_range = "10,000 +";
        $salary->save();
    }
}