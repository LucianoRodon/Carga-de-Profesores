<?php
namespace App\Http\Controllers;

use App\Models\Profesor;
use App\Models\Localidad;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ProfesorController extends Controller
{
    public function index(Request $request)
    {
        $query = Profesor::query();

        // Filtros de búsqueda
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('dni', 'like', "%{$search}%")
                    ->orWhere('nombre', 'like', "%{$search}%")
                    ->orWhere('apellido', 'like', "%{$search}%");
            });
        }

        // Filtro de estado
        if ($request->filled('estado')) {
            $query->where('estado', $request->input('estado'));
        }

        $profesores = $query->paginate(10);
        return view('profesores.index', compact('profesores'));
    }



    public function show(Profesor $profesor)
    {
        return view('profesores.show', compact('profesor'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'dni' => [
                'required',
                'unique:profesores',
                'numeric',
                'digits_between:7,10'
            ],
            'nombre' => 'required|string|max:50',
            'apellido' => 'required|string|max:50',
            'email' => 'required|email|unique:profesores',
            'telefono' => [
                'required',
                'unique:profesores',
                'numeric',
                'digits_between:8,15'
            ],
            'genero' => 'required|in:masculino,femenino',
            'fecha_nacimiento' => [
                'required',
                'date',
                function ($attribute, $value, $fail) {
                    $edad = Carbon::parse($value)->age;
                    if ($edad < 18) {
                        $fail('El profesor debe ser mayor de 18 años.');
                    }
                }
            ],
            'direccion' => 'required|string|max:255',
            'id_localidad' => 'required|nullable|exists:localidades,id_localidad',
            'estudios' => 'required|nullable|string|max:500',
            'experiencia' => 'required|nullable|string|max:500',
            'profesion' => 'required|string|max:100',
            'disponibilidad_horaria' => 'required|nullable|integer|min:1|max:60',
            'estado' => 'required|in:Activo,Inactivo'
        ], [
            'required' => 'Este campo es obligatorio.',
            'string' => 'Debe ser un texto.',
            'max' => 'Debe tener máximo :max caracteres.',
            'numeric' => 'Debe ser un número.',
            'email' => 'Debe ser un email válido.',
            'digits_between' => 'Debe tener entre :min y :max dígitos.',
            'unique' => 'Este valor ya está registrado.',
            'date' => 'Debe ser una fecha válida.',
            'before' => 'Debe ser una fecha anterior a hoy.',
            'exists' => 'El valor seleccionado no es válido.',
            'in' => 'Opción no válida.',
            'integer' => 'Debe ser un número entero.',
            'min' => 'Debe ser al menos :min.',
        ]);

        $profesor = Profesor::create($validated);

        return redirect()->route('profesores.index')
            ->with('success', "Profesor {$profesor->nombre} {$profesor->apellido} creado exitosamente.");
    }

    public function edit(Profesor $profesor)
    {
        $generos = [
            'masculino' => 'Masculino',
            'femenino' => 'Femenino'
        ];

        $estados = [
            'Activo' => 'Activo',
            'Inactivo' => 'Inactivo'
        ];

        $localidades = Localidad::orderBy('localidad')->get();

        return view('profesores.edit', compact('profesor', 'generos', 'estados', 'localidades'));
    }

    public function update(Request $request, Profesor $profesor)
    {
        $validated = $request->validate([
            'dni' => 'required|unique:profesores,dni,' . $profesor->id,
            'nombre' => 'required|string|max:50',
            'apellido' => 'required|string|max:50',
            'email' => 'required|email|unique:profesores,email,' . $profesor->id,
            'telefono' => 'required|numeric|digits_between:8,15',
            'genero' => 'required',
            'fecha_nacimiento' => [
                'required',
                'date',
                function ($attribute, $value, $fail) {
                    $edad = Carbon::parse($value)->age;
                    if ($edad < 18) {
                        $fail('El profesor debe ser mayor de 18 años.');
                    }
                }
            ],
            'direccion' => 'required|string|max:255',
            'estudios' => 'required|nullable|string|max:500',
            'id_localidad' => 'required|nullable|exists:localidades,id_localidad',
            'experiencia' => 'required|nullable|string|max:500',
            'profesion' => 'required|string|max:100',
            'disponibilidad_horaria' => 'required|nullable|integer|min:1|max:60',
            'estado' => 'required|in:Activo,Inactivo'
        ]);

        $profesor->update($validated);

        return redirect()->route('profesores.index')
            ->with('success', "Profesor {$profesor->nombre} {$profesor->apellido} actualizado exitosamente.");
    }

    public function destroy(Profesor $profesor)
    {
        $profesor->delete();

        return redirect()->route('profesores.index')
            ->with('success', "Profesor {$profesor->nombre} {$profesor->apellido} a sido eliminado exitosamente.");
    }

    public function create()
    {
        // Preparar cualquier dato adicional si es necesario
        $generos = [
            'masculino' => 'Masculino',
            'femenino' => 'Femenino'
        ];

        $estados = [
            'Activo' => 'Activo',
            'Inactivo' => 'Inactivo'
        ];

        $localidades = Localidad::orderBy('localidad')->get();

        return view('profesores.create', compact('generos', 'estados', 'localidades'));

    }
}
