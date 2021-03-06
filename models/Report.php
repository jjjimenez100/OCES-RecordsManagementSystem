<?php
use Illuminate\Database\Eloquent\Model as EloquentModel;

class Report extends EloquentModel{
    protected $table = 'tblreports';
    protected $primaryKey = 'Activity_Code';
    public $timestamps = false;

    public function user(){
        return $this->hasOne('User', 'UserID', 'UserID');
    }
}