<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Parties extends Model
{
    use HasFactory;
    use SoftDeletes; 
    protected $table = 'parties';
    protected $primaryKey = 'id';
    protected $dates = ['deleted_at'];


    protected $fillable = [
        'firm_name',
        'owner_name',
        'address',
        'phone_number',
        'photo',
    ];

    




}
