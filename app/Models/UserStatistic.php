<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserStatistic extends Model
{
    use HasFactory;

    protected $table = 'user_statistics';

    // Поля, доступные для массового заполнения
    protected $fillable = ['ip', 'location', 'platform'];

    // Поля, которые не должны быть присвоены пустыми
    protected $guarded = ['id'];

    // Laravel по умолчанию предполагает, что в вашей таблице есть столбцы 'created_at' и 'updated_at'
    // Если это не так, вы можете отключить их автоматическое обновление следующим образом:
    public $timestamps = false;
}
