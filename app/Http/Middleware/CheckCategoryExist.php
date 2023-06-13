<?php

namespace App\Http\Middleware;

use App\Models\Category;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckCategoryExist
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $categories = Category::all();
        if($categories->count()>0)
            {
                return $next($request);    
            }
        else
            {
                session()->flash("error","Create at least one category.");
                return redirect(route('category.create'));
            }    
    }
}
