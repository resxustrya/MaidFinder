<?php

/**
 * Created by PhpStorm.
 * User: Lourence
 * Date: 7/25/2016
 * Time: 3:15 PM
 */
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class ApplicantSkills extends Eloquent
{
    use SoftDeletingTrait;
    protected $table = 'applicant_skill';
    protected $primaryKey = 'skillid';
    protected $dates = ['deleted_at'];
}