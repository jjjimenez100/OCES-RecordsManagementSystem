<?php
use Illuminate\Database\Eloquent\Model as EloquentModel;

class Department extends EloquentModel{
    protected $table = 'tbldepartment';
    protected $primaryKey = 'Activity_Code';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
}