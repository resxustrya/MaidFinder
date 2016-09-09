<?php

/**
 * Created by PhpStorm.
 * User: Lourence
 * Date: 8/21/2016
 * Time: 1:02 AM
 */
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class SeniorSets extends Eloquent {
    use SoftDeletingTrait;
    protected $table = 'senior_set';
    protected $primaryKey = 'senior_set_id';
    protected $date = ['deleted_at'];
}