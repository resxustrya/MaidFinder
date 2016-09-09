<?php

/**
 * Created by PhpStorm.
 * User: Lourence
 * Date: 8/21/2016
 * Time: 1:04 AM
 */
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class PetSets extends Eloquent {
    use SoftDeletingTrait;
    protected $table = 'pet_set';
    protected $primaryKey = 'pet_set_id';
    protected $date = ['deleted_at'];
}