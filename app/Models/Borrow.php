<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Borrow extends Model
{
    use HasFactory;

    protected $table = 'borrows';
    protected $primaryKey = 'borrow_id';
    public $incrementing = true; 
    protected $keyType = 'int'; 
    protected $fillable = [
        'user_id',
        'book_id',
        'borrow_date',
        'return_date',
    ];
    protected $dates = ['borrow_date', 'return_date'];  

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
    
}
