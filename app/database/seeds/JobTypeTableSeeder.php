<?php
/**
 * Created by PhpStorm.
 * User: Lourence
 * Date: 8/14/2016
 * Time: 3:05 PM
 */

class JobTypeTableSeeder extends Seeder {
    public function run() {
        $type = new JobTypes();
        $type->description = 'Nanny';
        $type->save();

        $type = new JobTypes();
        $type->description = 'Baby Sitter';
        $type->save();

        $type = new JobTypes();
        $type->description = 'Adsult Sitter';
        $type->save();

        $type = new JobTypes();
        $type->description = 'Nanny';
        $type->save();

        $type = new JobTypes();
        $type->description = 'Pet Sitter';
        $type->save();

        $type = new JobTypes();
        $type->description = 'AU Pair';
        $type->save();

        $type = new JobTypes();
        $type->description = 'Tutor';
        $type->save();

        $type = new JobTypes();
        $type->description = 'All Around';
        $type->save();
    }
}