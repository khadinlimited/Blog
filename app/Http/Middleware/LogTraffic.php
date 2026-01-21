<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogTraffic
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Don't track if:
        // 1. Not a GET request (we only care about page views)
        // 2. Is an AJAX request
        // 3. Is an admin page
        // 4. Is an asset or file
        if ($request->isMethod('GET') && !$request->ajax() && !$request->is('admin*')) {
            
            // Try to find if this matches a post route to link post_id
            $postId = null;
            $route = $request->route();
            if ($route && $route->getName() === 'post.show') {
                // If the parameter is a slug binding, we might need to resolve it, 
                // but usually binding happens before middleware if bindings middleware runs first.
                // However, standard middleware might run before binding resolution in some setups.
                // Safest to rely on the fact that if it's the post.show route, we can get the model *if* resolved.
                // Let's keep it simple: if we can grab the model, great. If not, just log the URL.
                $post = $request->route('post'); // Assuming explicit binding or implicit binding
                if ($post instanceof \App\Models\Post) {
                    $postId = $post->id;
                }
            }

            \App\Models\Visit::create([
                'ip_address' => $request->ip(),
                'referrer' => $request->header('referer'),
                'url' => $request->fullUrl(),
                'user_id' => auth()->id(),
                'post_id' => $postId,
            ]);
        }

        return $next($request);
    }
}
