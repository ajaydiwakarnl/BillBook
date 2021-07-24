<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Account extends Model
{
    use HasFactory;
    use SoftDeletes; 
    protected $table = 'account';
    protected $primaryKey = 'id';
    protected $dates = ['deleted_at'];


    protected $fillable = [
        'parties_id',
        'status',
    ];


    public function parties()
	{
	    return $this->belongsTo(Parties::class, 'parties_id');
	}

}
