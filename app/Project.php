<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model {

    protected $fillable = ['title','body','icon','url'];

}
