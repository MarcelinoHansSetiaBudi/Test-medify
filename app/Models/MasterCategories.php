<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterCategories extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'master_categories';

    protected $guarded = [];

    protected $hidden =[
      'created_at',
      'updated_at'  
    ];
}
