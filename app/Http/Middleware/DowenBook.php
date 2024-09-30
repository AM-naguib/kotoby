<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Book;
use App\Models\DowenBook as ModelsDowenBook; // تأكد من وجود هذا الموديل
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DowenBook
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
                ModelsDowenBook::firstOrCreate([
                    "user_id" => auth()->id(),
                    "book_id" => $book->id,
                ]);
            } else {
                ModelsDowenBook::create([
                    "book_id" => $book->id,
                ]);
            }
        }

        return $next($request);
    }
}
