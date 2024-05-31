<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateUserForEditAndDelete
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    // if(is_object($post))
    {   if(is_numeric($request->post)) {
            $post = Post::onlyTrashed()->find($request->post);
        }else {
            $post = $request->post;
        }

        if(! auth()->user()->isAdmin() &&  $post->user_id !== auth()->id()) {
            return abort(401);
        }
        return $next($request);
    }
}
