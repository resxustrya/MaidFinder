<?php
/**
 * Created by PhpStorm.
 * User: Lourence
 * Date: 8/14/2016
 * Time: 3:04 PM
 */

class EmployerTableSeeder extends Seeder {
    public function run() {
        $emp = new Employers();
        $emp->email = 'rex@outlook.com';
        $emp->password = 'hahahehe';
        $emp->fname = 'Rexus';
        $emp->lname = 'Muana';
        $emp->gender = 'Male';
        $emp->save();

        $emp = new Employers();
        $emp->email = 'ruseltayong@gmail.com';
        $emp->password = 'hahahehe';
        $emp->fname = 'Rusel';
        $emp->lname = 'Tayong';
        $emp->gender = 'Male';
        $emp->save();

        $emp = new Employers();
        $emp->email = 'mark.com';
        $emp->password = 'hahahehe';
        $emp->fname = 'Mark';
        $emp->lname = 'Mamogay';
        $emp->gender = 'Male';
        $emp->save();

        $emp = new Employers();
        $emp->email = 'myfirstemail@gmail.com';
        $emp->password = 'hahahehe';
        $emp->fname = 'First';
        $emp->lname = 'Account';
        $emp->gender = 'Female';
        $emp->save();

        $emp = new Employers();
        $emp->email = 'mysecondemail@gmail.com';
        $emp->password = 'hahahehe';
        $emp->fname = 'Second';
        $emp->lname = 'Account';
        $emp->gender = 'Female';
        $emp->save();

        $emp = new Employers();
        $emp->email = 'myfifthemail@gmail.com';
        $emp->password = 'hahahehe';
        $emp->fname = 'Fith';
        $emp->lname = 'Account';
        $emp->gender = 'Female';
        $emp->save();
        $emp = new Employers();
        $emp->email = 'mythirdemail@gmail.com';
        $emp->password = 'hahahehe';
        $emp->fname = 'Third';
        $emp->lname = 'Account';
        $emp->gender = 'Female';
        $emp->save();

        $emp = new Employers();
        $emp->email = 'mythirdemail@gmail.com';
        $emp->password = 'hahahehe';
        $emp->fname = 'Third';
        $emp->lname = 'Account';
        $emp->gender = 'Female';
        $emp->save();

        $emp = new Employers();
        $emp->email = 'myfourthemail@gmail.com';
        $emp->password = 'hahahehe';
        $emp->fname = 'Fourth';
        $emp->lname = 'Account';
        $emp->gender = 'Female';
        $emp->save();

    }
}
