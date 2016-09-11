<?php
/**
 * Created by PhpStorm.
 * User: Lourence
 * Date: 9/10/2016
 * Time: 7:05 PM
 */



use Illuminate\Database\Eloquent\SoftDeletingTrait;
class Religions extends Eloquent
{
    use SoftDeletingTrait;
    protected $table = 'religion';
    protected $primaryKey = 'id';
    protected $date = ['deleted_at'];
}