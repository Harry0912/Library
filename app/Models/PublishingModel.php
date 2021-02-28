<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublishingModel extends Model
{
    use HasFactory;

    protected $table = 'publishing';
    protected $primaryKey = 'Id';

    public function books()
    {
        return $this->hasMany([
            'App\Models\BooksModel',
            'Publishing',
            'Id'
        ]);
    }
}
