<?php

/**
 * Created by PhpStorm.
 * User: Lourence
 * Date: 8/21/2016
 * Time: 1:06 AM
 */
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class PetTypes extends Eloquent {
    use SoftDeletingTrait;
    protected $table = 'pet_type';
    protected $primaryKey = 'pet_type_id';
    protected $date = ['deleted_at'];
}