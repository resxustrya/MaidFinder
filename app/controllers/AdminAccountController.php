<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdminController
 *
 * @author Hp
 */
class AdminAccountController  extends BaseController {


    public function admin_login() {
        return View::make('admin.admin-login');

    }
    public function handle_admin_login() {
        $username = Input::get('username');
        $password = Input::get('password');

        $admin = Admins::where('username', '=', $username)
                        ->where('password', '=', $password)
                        ->first();
        if($admin and ($admin->username = $username and $admin->password == $password)) {
            Session::put('admin', $admin);
            return Redirect::to('/admin/home');
        }
        return Redirect::to('/admin/account/login')->with('admin-err', 'Login Failed');
    }
    public function logout() {
        Session::forget('admin');
        Session::forget('admin_staff');
        Session::flush();
        return Redirect::to('/admin/account/login');
    }

}
