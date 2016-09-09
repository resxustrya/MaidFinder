<?php

/**
 * Created by PhpStorm.
 * User: Lourence
 * Date: 8/21/2016
 * Time: 1:07 AM
 */
class PetTypeTableSeeder extends Seeder {
    public function run() {
        $pet = new PetTypes();
        $pet->pet_type = "Dog";
        $pet->save();

        $pet = new PetTypes();
        $pet->pet_type = "Cat";
        $pet->save();

    }
}