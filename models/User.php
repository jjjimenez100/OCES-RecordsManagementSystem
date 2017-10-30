<?php
use Illuminate\Database\Eloquent\Model as EloquentModel;

class User extends EloquentModel{
    protected $table = 'tbluser';
    protected $primaryKey = 'UserID';
    public $incrementing = false;
    public $timestamps = false;
}
