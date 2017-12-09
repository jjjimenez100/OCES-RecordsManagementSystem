<?php
use Illuminate\Database\Eloquent\Model as EloquentModel;

class Volunteer extends EloquentModel{
    protected $table = 'tblvolunteers';
    protected $primaryKey = 'Volun_ID';
    public $incrementing = false;
    public $timestamps = false;

    public function report(){
        return $this->hasOne('Report', 'Activity_Code', 'Activity_Code');
    }

    public function creator(){
        return $this->hasOne('User', 'UserID', 'UserID');
    }
}