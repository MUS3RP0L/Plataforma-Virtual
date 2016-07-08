<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;
use Muserpol\Helper\Util;

class Document extends Model
{
    protected $table = 'documents';

    protected $fillable = [

    	'requirement_id',
    	'retirement_fund_id',
    	'reception_date',
    	'status',
    	'comment'
    ];

    protected $guarded = ['id'];

    public function retirement_funds(){

        return $this->belongsTo('Muserpol\Retirement_fund');
    }

    public function requirement(){

        return $this->belongsTo('Muserpol\Requirement');
    }

    public function scopeFonTraIs($query, $id)
    {
        return $query->where('fondo_tramite_id', $id);
    }

    public function getData_fech_requi()
    {   
        return Util::getdateabre($this->fech_pres);
    }
    public function getDataEdit()
    {   
        return Util::getdateforEdit($this->fech_pres);
    }
}

Document::created(function($document)
{
    Activity::createdDocument($document);
    
});

Document::updating(function($document)
{
    Activity::updateDocument($document);
    
});
