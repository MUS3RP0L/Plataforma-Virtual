<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Carbon\Carbon;

class DirectContribution extends Model
{
    protected $table = 'direct_contributions';

    protected $dates = ['deleted_at'];

	protected $fillable = [

        'user_id',
        'affiliate_id',
        'type',
        'code',
        'quotable',
        'retirement_fund',
        'mortuary_quota',
        'mortuary_aid',
        'subtotal',
        'ipc',
        'total'

	];

	protected $guarded = ['id'];

    public function affiliate(){

        return $this->belongsTo('Muserpol\Affiliate');
    }

    public function scopeIdIs($query, $id)
    {
        return $query->where('id', $id);
    }

    public function getCode()
    {
        if ($this->code) {
            return $this->code . "/" . Carbon::parse($this->created_at)->year;
        }
    }
}
