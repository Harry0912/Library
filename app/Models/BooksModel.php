<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BooksModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'books';
    protected $primaryKey = 'Id';

    public $timestamps = false;

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
