<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AppAuth
 *
 * @author Hp
 */
class AppAuth implements RexusAuth {
    
    public static function login($data) {
        $app = Applicants::where('email', '=', $data['email'])
                ->where('password', '=', $data['password'])
                ->first();
        if($app) {
            Session::put('applicant', true);
            Session::put('appdata',$app);
            return true;
        }
        return false;
        
    }
    public static function logout() {
        Session::flush();
        return true;
    }
    public static function check() {
        return (Session::has('applicant') and Session::has('appdata'));
    }
    public static function id() {
        return Session::get('appdata')->AppId;
    }
}
