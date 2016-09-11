<?php
/**
 * Created by PhpStorm.
 * User: Lourence
 * Date: 9/10/2016
 * Time: 7:04 PM
 */



use Illuminate\Database\Eloquent\SoftDeletingTrait;
class Nationalities extends Eloquent
{
    use SoftDeletingTrait;
    protected $table = 'nationality';
    protected $primaryKey = 'id';
    protected $date = ['deleted_at'];
}