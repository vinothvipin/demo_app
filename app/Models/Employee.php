<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\Company;

class Employee extends Model
{
    use HasFactory;
    public $timestamps = true;

      protected $appends=['published'];

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'company_id',        
        'created_at'
    ];
    public function getPublishedAttribute(){        
        
             return Carbon::createFromTimeStamp(strtotime($this->attributes['created_at']) )->format('d-m-y');
        }
         public function getFullNameAttribute(){        
        
             return $this->attributes['first_name'].' '.$this->attributes['last_name'];
        }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }    
}
