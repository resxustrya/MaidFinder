<?php

/**
 * Created by PhpStorm.
 * User: Lourence
 * Date: 9/1/2016
 * Time: 3:21 PM
 */
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class ApplicantMessages extends Eloquent
{
    use SoftDeletingTrait;
    protected $table = 'applicant_msg';
    protected $primaryKey = 'id';
    protected $date = ['deleted_at'];
}