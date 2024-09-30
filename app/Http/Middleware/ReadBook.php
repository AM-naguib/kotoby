<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Book;
use App\Models\ReadBook as ModelsReadBook; // تأكد من وجود هذا الموديل
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReadBook
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $book = Book::where("slug", $request->slug)->first();

        if ($book) {
            if (auth()->check()) {
                ModelsReadBook::firstOrCreate([
                    "user_id" => auth()->id(),
                    "book_id" => $book->id,
                ]);
            } else {
                ModelsReadBook::create([
                    "book_id" => $book->id,
                ]);
            }
        }

        return $next($request);
    }
}
