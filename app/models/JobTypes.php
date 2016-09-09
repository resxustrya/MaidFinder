<?php

/**
 * Created by PhpStorm.
 * User: Lourence
 * Date: 7/30/2016
 * Time: 4:14 PM
 */
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class JobTypes extends Eloquent
{
    use SoftDeletingTrait;
    protected $table = 'jobtype';
    protected $primaryKey = 'jobtypeid';
    protected $date = ['deleted_at'];
}