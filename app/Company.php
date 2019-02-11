<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    protected $hidden = [];

    protected $dates = [];

    protected $table = 'companies';
    protected $guarded = ['id'];
    protected $appends = [];
    public static $uploads_path='storage/app/public/companies/';
    public static $thumbnails_uploads_path='storage/app/public/companies/thumbnails/';


    public function getLogoAttribute($logo)
    {
        if($logo)
        {
            return Asset(self::$uploads_path.$logo);
        }
        else
            return $logo;
    }

    public function employees(){
        return $this->hasMany(Employ::class, 'company_id');
    }
}
