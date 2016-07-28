<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $table = 'vouchers';

    protected $dates = ['deleted_at'];

	protected $fillable = [

        'user_id',
        'affiliate_id',
        'contribution_type_id',
        'type',
        'code',
        'concept',
        'total'

	];

	protected $guarded = ['id'];

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