<?php

/**
 * Created by PhpStorm.
 * User: Lourence
 * Date: 7/28/2016
 * Time: 3:35 PM
 */
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class Jobs extends Eloquent
{
    use SoftDeletingTrait;
    protected $table = 'job';
    protected $primaryKey = 'jobid';
    protected $date = ['deleted_at'];
}