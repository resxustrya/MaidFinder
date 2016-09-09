<?php

/**
 * Created by PhpStorm.
 * User: Lourence
 * Date: 9/2/2016
 * Time: 10:53 PM
 */
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class AdminStaffs extends Eloquent
{
    use SoftDeletingTrait;
    protected $table = 'admin_staff';
    protected $primaryKey = 'admin_staff_id';
    protected $date = ['deleted_at'];
}