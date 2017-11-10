<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Realestate extends Model
{
	protected $fillable = [
		'realestate_business_id',
        'realestate_type_id',
        'title',
        //'cod_realestate',
        'address',
        'cep',
        'city',
        'state',
        'district',
        'number',
        'complement',
        'price',
        'surface',
        'bedroom',
        'suite',
        'bathroom',
        'livingroom',
        'garage',
        'description',
	];

    public function setSurfaceAttribute($value){
        $this->attributes['surface'] = doubleval($value);
    }

    public function setBedroomAttribute($value){
        $this->attributes['bedroom'] = intval($value);
    }

    public function setSuiteAttribute($value){
        $this->attributes['suite'] = intval($value);
    }

    public function setBathroomAttribute($value){
        $this->attributes['bathroom'] = intval($value);
    }

    public function setLivingroomAttribute($value){
        $this->attributes['livingroom'] = intval($value);
    }

    public function setGarageAttribute($value){
        $this->attributes['garage'] = intval($value);
    }

    public function business(){
    	return $this->hasOne('App\RealestateBusiness');
    }

    public function type(){
    	return $this->hasOne('App\RealestateType');
    }

    public function files(){
    	return $this->belongsToMany('App\File');
    }
}
