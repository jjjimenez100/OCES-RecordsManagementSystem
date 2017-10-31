<?php
use Illuminate\Database\Eloquent\Model as EloquentModel;

class Volunteer extends EloquentModel{
    protected $table = 'tblvolunteers';
    protected $primaryKey = 'Activity_Code';
    public $incrementing = false;
    public $timestamps = false;

    public function report(){
        return $this->hasOne('Report', 'Activity_Code', 'Activity_Code');
    }
}