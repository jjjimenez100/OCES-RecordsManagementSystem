<?php
use Illuminate\Database\Eloquent\Model as EloquentModel;

class Volunteer extends EloquentModel{
    protected $table = 'tblvolunteers';
    protected $primaryKey = 'Activity_Code';
    public $incrementing = false;
    public $timestamps = false;
}