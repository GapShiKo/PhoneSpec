<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneSpec extends Model
{
    use HasFactory;

    protected $fillable = [
      "name",
      "date",
      "memory",
      "SoC",
      "cameras",
      "thumbnail"
    ];

}
