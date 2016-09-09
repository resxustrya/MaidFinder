<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Hp
 */
interface RexusAuth {
   public static function login($data);
   public static function logout();
   public static function id();
  // public static function userinfo($str);
}
