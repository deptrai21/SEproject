<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SmStaff extends Model
{
	protected $table = "sm_staffs";
	
    public function roles(){
		return $this->belongsTo('Modules\RolePermission\Entities\InfixRole', 'role_id', 'id');
	}

	public function departments(){
		return $this->belongsTo('App\SmHumanDepartment', 'department_id', 'id');
	}

	public function designations(){
		return $this->belongsTo('App\SmDesignation', 'designation_id', 'id');
	}

	public function genders(){
		return $this->belongsTo('App\SmBaseSetup', 'gender_id', 'id');
	}


	public function staff_user(){
    	return $this->belongsTo('App\User', 'user_id', 'id');
    }


}
