<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdminAuth
 *
 * @author Hp
 */
class AdminAuth  implements RexusAuth {
    
    public function login($data) {
        $admin = Admin::where('email', '=', $data['email'])
                ->where('password', '=', $data['password'])
                ->first();
        
        if($admin) {
            Session::put('admin', true);
            Session::put('admindata',$admin);
            return true;
        }
        return false;
    }
    public function logout() {
        Session::flush();
    }
    public function id() {
        return Session::get('admindata')->AdminId;
    }
}
