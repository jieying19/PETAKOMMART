<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class salesreports extends Model
{
    use HasFactory;
    protected $table = "salesreports";
    protected $fillable = ['week', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday'];
}
