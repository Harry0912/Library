<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BooksModel extends Model
{
    use HasFactory;

    protected $table = 'books';
    protected $primaryKey = 'Id';

    public function users()
    {
        return $this->hasOne(
            'App\Models\UserModel',
            'id',
            'UserId'
        );
    }

    public function publishing()
    {
        return $this->hasOne(
            'App\Models\PublishingModel',
            'Id',
            'Publishing'
        );
    }
}
