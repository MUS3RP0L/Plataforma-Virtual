<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

	protected $fillable = [
	
		'name'
	];

	protected $guarded = ['id'];

	public function users()
    {
        return $this->hasMany(User::class);
    }
}
