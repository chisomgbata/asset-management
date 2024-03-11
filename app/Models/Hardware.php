<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hardware extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
//        $table->enum('owner', ['CCG', 'IPG'])->nullable();
//        'owner' => 'enum:CCG,IPG'
    ];
}
