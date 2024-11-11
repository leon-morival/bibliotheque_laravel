<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'author', 'year','cover_image', 'available'];
// app/Models/Book.php

public function borrows()
{
    return $this->hasMany(Borrow::class, 'book_id');
}
public function markAsAvailable()
{
    $this->available = true;
    $this->save();
}
}
