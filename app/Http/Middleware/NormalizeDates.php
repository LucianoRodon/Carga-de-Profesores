<?php
// app/Http/Middleware/NormalizeDates.php
namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;

class NormalizeDates
{
    public function handle($request, Closure $next)
    {
        // Normalizar fecha de nacimiento
        if ($request->has('fecha_nacimiento')) {
            try {
                $request->merge([
                    'fecha_nacimiento' => Carbon::parse($request->fecha_nacimiento)->format('Y-m-d')
                ]);
            } catch (\Exception $e) {
                // Manejar error de parsing
                return back()->withErrors('Formato de fecha inválido');
            }
        }

        return $next($request);
    }
}
