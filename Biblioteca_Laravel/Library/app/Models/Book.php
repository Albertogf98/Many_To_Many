<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title',
        'author',
        'editorial',
    ];

    public static function insertBook($title, $author, $editorial) {
        Book::create([
            'title' => $title,
            'author' => $author,
            'editorial' => $editorial,
            'lending_date' => now(),
        ]);
    }

    public static function getBookByTitle($title) {
        $booksData = Book::where('title', $title)->get();
        foreach ($booksData as $book) {
            return $book;
        }
    }

    public static function getUserWithBooks() {
        $usersWithBooks = User::with('books')->get();
        foreach ($usersWithBooks as $book) {
            foreach ($book->books as $item) {
                echo $item->pivot->user_id;
            }
        }
    }

    public static function getBookById($id) {
        $bookSearched = Book::where('id', $id)->get();
        foreach ($bookSearched as $book) {
            return $book;
        }
    }
    public function users()  {
        return $this->belongsToMany('\App\Models\User', 'book_user')->withPivot('user_id', 'lending_date');
    }
}
