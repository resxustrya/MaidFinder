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
class EmpAuth implements RexusAuth {
    
    public static function login($data) {
        $emp = Employers::where('email', '=', $data['email'])
                ->where('password', '=', $data['password'])
                ->first();
        if($emp) {
            Session::put('employer', true);
            Session::put('empdata',$emp);
            return true;
        }
        return false;
    }
    public static function logout() {
        Session::flush();
        return true;
    }
    public static function check() {
        return (Session::has('employer') and Session::has('empdata'));
    }
    public static function id() {
        return Session::get('empdata')->EmpId;
    }
}
