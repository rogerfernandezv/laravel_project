<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Realestate extends Model
{
	protected $fillable = [
		'realestate_business_id',
        'realestate_type_id',
        'title',
        'cod_realestate',
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
    public function business(){
    	return $this->hasOne('App\RealestateBusiness');
    }

    public function type(){
    	return $this->hasOne('App\RealestateType');
    }
}
