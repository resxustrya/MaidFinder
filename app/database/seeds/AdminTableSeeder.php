<?php
/**
 * Created by PhpStorm.
 * User: Lourence
 * Date: 9/7/2016
 * Time: 6:26 PM
 */



class AdminTableSeeder extends Seeder
{
    public function run() {
        $admin = new \Admins();
        $admin->username = 'rexus';
        $admin->password = 'hahahehe';
        $admin->fname = 'Lourence Rex';
        $admin->lname = 'Traya';
        $admin->usertype = 'admin';
        $admin->save();

        $admin = new \Admins();
        $admin->username = 'rexus';
        $admin->password = 'hahahehe';
        $admin->fname = 'Lourence Rex';
        $admin->lname = 'Traya';
        $admin->usertype = 'adminstaff';
        $admin->save();
    }
}