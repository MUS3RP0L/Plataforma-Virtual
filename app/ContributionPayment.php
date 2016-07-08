<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Carbon\Carbon;

class ContributionPayment extends Model
{
    protected $table = 'contribution_payments';

    protected $dates = ['deleted_at'];

	protected $fillable = [
	
        'user_id',
        'affiliate_id',
        'type',
        'payment_date',        
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

    public function getNumberTram()
    {
        if ($this->codigo) {
            return $this->codigo . "/" . Carbon::parse($this->created_at)->year;
        }
    }
}
