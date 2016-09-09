<?php

/**
 * Created by PhpStorm.
 * User: Lourence
 * Date: 8/13/2016
 * Time: 1:19 AM
 */
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class EmpShortList extends Eloquent
{
    use SoftDeletingTrait;
    protected $table = 'emp_shortlist';
    protected $primaryKey = 'listid';
    protected $date = ['deleted_at'];
}