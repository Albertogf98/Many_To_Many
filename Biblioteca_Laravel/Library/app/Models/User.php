<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Array_;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'second_name',
        'email',
        'password',
        'user_type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getUserByName($name) {
        $userSearched = User::where('name', $name)->get();
        foreach ($userSearched as $user) {
            return $user;
        }
    }

    public static function getUserById($id) {
        $userSearched = User::where('id', $id)->get();
        foreach ($userSearched as $user) {
            return $user;
        }
    }

    public static function getUsersWithBooksLendingDate($userName, $lending_date, $bookId) {
        $bookUser = DB::select("SELECT * FROM book_user LEFT JOIN users ON book_user.user_id = users.id
         LEFT JOIN books ON book_user.book_id = books.id WHERE users.name = '$userName'");

        foreach ($bookUser as $item) {
             return  $item->lending_date === $lending_date && $item->book_id === $bookId ? true : false;
        }
    }

    public static function getDateFromBookUser($userId, $bookId) {
        $bookUser = DB::select("SELECT * FROM book_user LEFT JOIN users ON book_user.user_id = users.id
         LEFT JOIN books ON book_user.book_id = books.id WHERE users.id = '$userId' && books.id = '$bookId'");

        foreach ($bookUser as $data) {
            return ['bookId' => $data->book_id, 'userId' => $data->user_id, 'lendingDate' => $data->lending_date];
        }
    }

    public function books()  {
        return $this->belongsToMany('\App\Models\Book', 'book_user')->withPivot('book_id', 'lending_date');
    }
}
