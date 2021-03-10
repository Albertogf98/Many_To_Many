<?php

/*
 * TODO:
 * 1. Las redirecciones comprobarlas todas y asegurarte de que están bien. [DONE]
 * 2. Verificar si es admin o user [DONE]
 *  2.1. Mostrar las vistas en función de lo que sea. [DONE]
 * 3. Mostrar todos los datos [DONE]
 *  3.1. Paginarlos[DOME]
 * 4. Crear un préstamo como admin [DONE]
 * 5. Eliminar como admin. [DONE]
 * 6. Editar como admin. [DONE]
 * 7. RequestValidations. [PREGUNTAR A EDU]
 * 8. Resgistrar un usuario. [DONE]
 * 9. Validación de campos. [DONE]
 * */

namespace App\Http\Controllers;

use App\Http\Requests\BookUserRequest;
use App\Models\Book;
use App\Models\Lending;
use App\Models\Partner;
use App\Models\User;
use Facade\FlareClient\Http\Exceptions\NotFound;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class LibraryController extends Controller {

    public function __constructor() {
        $this->middleware('auth');
    }

    public function adminHome() {
        $usersWithBooks = User::with('books')->simplePaginate(1);
        return view('admin.home', ['usersWithBooks' => $usersWithBooks]);
    }

    public function adminCreate() {
        return view('admin.create');
    }

    public function adminCreatePost(BookUserRequest $request) {
       $user = User::getUserByName($request->name);

       $book = Book::getBookByTitle($request->title);

      if (empty($book)) {
           Book::insertBook($request->title, $request->author, $request->editorial);
           $newBoow = Book::getBookByTitle($request->title);
        }

        $isBook = empty($book) ? $newBoow : $book;
        $userLendingDate = User::getDateFromBookUser($user->id, $isBook->id);

        if (!empty($userLendingDate) && $user->id = $userLendingDate['userId'] && $book->id = $userLendingDate['bookId'] && $userLendingDate['lendingDate'] = now()) {
            return  view('error.error', ['name' => $user->name, 'lendingDate' => $userLendingDate['lendingDate'], 'title' => $isBook->title]);
        } else {
            User::find($user->id)->books()->attach($isBook->id, ['lending_date' => now()]);
            return redirect('admin/home');
        }
    }

    public function adminDelete($ids) {
        $result = json_decode($ids, true);
        User::find($result['userId'])->books()->detach($result['bookId']);
        return redirect('admin/home');
    }

    public function adminEdit($ids) {
        $result = json_decode($ids, true);
        $user = User::getUserById($result['userId']);
        $book = Book::getBookById($result['bookId']);
        return view('admin/edit' , ['book' => $book, 'user' => $user]);
    }

    public function adminEditPost(Request $request) {
        $user = User::getUserByName($request->name);
        $book = Book::getBookByTitle($request->title);
        $user->books()->updateExistingPivot($book->id, ['book_id' => $book->id, 'user_id' => $user->id, 'lending_date' => $request->lendingDate ]);
        return redirect('admin/home');

    }

    public function userHome() {
      $usersWithBooks = User::find(auth()->user()->id);
      $books = $usersWithBooks->books()->simplePaginate(4);
      return view('user.home', ['usersWithBooks' => $books]);
    }
}
