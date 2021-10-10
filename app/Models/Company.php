<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Company extends Model
{
    use HasFactory;
    public $timestamps = true;

      protected $appends=['published'];

    protected $fillable = [
        'name',
        'email',
        'website',
        'logo_path',
        'created_at'
    ];
    public function getPublishedAttribute(){        
        
             return Carbon::createFromTimeStamp(strtotime($this->attributes['created_at']) )->format('d-m-y');
        }
}
