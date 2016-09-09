<?php

/**
 * Created by PhpStorm.
 * User: Lourence
 * Date: 8/21/2016
 * Time: 12:58 AM
 */
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class OldSets extends Eloquent {
    use SoftDeletingTrait;
    protected $table = 'senior_set';
    protected $primaryKey = 'senior_set_id';
    protected $date = ['deleted_at'];
}