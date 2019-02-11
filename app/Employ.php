<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employ extends Model
{
    protected $hidden = [];

    protected $dates = [];

    protected $table = 'employees';
    protected $guarded = ['id'];
    protected $appends = [];
    public static $uploads_path='storage/app/public/employees/';
    public static $thumbnails_uploads_path='storage/app/public/employees/thumbnails/';


    public function companies(){
        return $this->belongsTo(Company::class, 'company_id');
    }
}
