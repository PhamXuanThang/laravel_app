<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Authorize
{
    public static string $delimiter = '+';

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @param string $ability
     * @param mixed ...$models
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $ability, ...$models): mixed
    {
        $user = $request->user();
        $abilities = self::extractAbilities($ability);
        $role = $user->roles->pluck('level');
        $numOfGranted = 0;
        foreach ($role as $value) {
            if (in_array($value, $abilities)) {
                $numOfGranted++;
            }
        }
        if (empty($numOfGranted)) {
            return response()->json([
                'status' => false,
                'code' => 'HTTP_FORBIDDEN',
                'message' => 'Access Denied',
            ], 403);
        }

        return $next($request);
    }

    /**
     * Build abilities
     *
     * @param mixed $abilities
     * @return string
     */
    public static function buildAbilities(mixed $abilities): string
    {
        if (empty($abilities)) {
            return '';
        }
        if (!is_array($abilities)) {
            $abilities = [$abilities];
        }

        return implode(self::$delimiter, $abilities);
    }

    /**
     * @param string $abilities
     * @return array
     */
    public static function extractAbilities(string $abilities): array
    {
        return array_map('intval', array_filter(explode(self::$delimiter, $abilities)));
    }
}