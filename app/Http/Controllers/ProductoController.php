<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Mostrar listado de productos
     */
    public function index()
    {
         $productos = Producto::paginate(5); // 10 productos por página
            return view('productos.index', compact('productos'));

    }

    /**
     * Mostrar formulario de creación
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Guardar nuevo producto
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'         => 'required|string|max:255', // Validar como string con longitud máxima
            'cantidad'       => 'required|integer|min:0', // Validar como entero no negativo
            'unidad_medida' => 'required|string|in:kg,lt,pz,quintal,arroba', // Validar como string con valores específicos
            'precio'         => 'required|numeric|min:0', // Validar como numérico no negativo
            'precio_unitario'=> 'nullable|numeric|min:0',// Validar como numérico no negativo
            'precio_mayoreo' => 'nullable|numeric|min:0',// Validar como numérico no negativo
            'imagen'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $producto = new Producto();
        $producto->nombre          = $request->nombre;
        $producto->cantidad        = $request->cantidad;
        $producto->unidad_medida   = $request->unidad_medida;
        $producto->precio          = $request->precio;
        $producto->precio_unitario = $request->precio_unitario;
        $producto->precio_mayoreo  = $request->precio_mayoreo;

        if ($request->hasFile('imagen')) {
            $nombreImagen = time() . '.' . $request->imagen->extension();
            $request->imagen->move(public_path('images'), $nombreImagen);
            $producto->imagen = $nombreImagen;
        }

        $producto->save();

        return redirect()->route('productos.index')
            ->with('success', 'Producto creado correctamente.');
    }

    /**
     * Mostrar un producto específico
     */
    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.show', compact('producto'));
    }

    /**
     * Mostrar formulario de edición
     */
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.edit', compact('producto'));
    }

    /**
     * Actualizar un producto específico
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre'         => 'required|string|max:255',
            'cantidad'       => 'required|integer|min:0',
            'unidad_medida'  => 'required|string|in:unidad,kg,litro,metro',
            'precio'         => 'required|numeric|min:0',
            'precio_unitario'=> 'nullable|numeric|min:0',
            'precio_mayoreo' => 'nullable|numeric|min:0',
            'imagen'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $producto = Producto::findOrFail($id);
        $producto->nombre          = $request->nombre;
        $producto->cantidad        = $request->cantidad;
        $producto->unidad_medida   = $request->unidad_medida;
        $producto->precio          = $request->precio;
        $producto->precio_unitario = $request->precio_unitario;
        $producto->precio_mayoreo  = $request->precio_mayoreo;

        if ($request->hasFile('imagen')) {
            // Eliminar imagen vieja si existe
            if ($producto->imagen && file_exists(public_path('images/' . $producto->imagen))) {
                unlink(public_path('images/' . $producto->imagen));
            }
            $nombreImagen = time() . '.' . $request->imagen->extension();
            $request->imagen->move(public_path('images'), $nombreImagen);
            $producto->imagen = $nombreImagen;
        }

        $producto->save();

        return redirect()->route('productos.index')
            ->with('success', 'Producto actualizado correctamente.');
    }

    /**
     * Eliminar un producto específico
     */
    public function destroy($id)
{
    $producto = Producto::findOrFail($id);

    // Eliminar imagen si existe
    if ($producto->imagen && file_exists(public_path('images/' . $producto->imagen))) {
        unlink(public_path('images/' . $producto->imagen));
    }

    $producto->delete();

    // Verificar si la tabla está vacía
    if (Producto::count() == 0) {
        // Reiniciar el auto-incremento a 1
        \DB::statement('ALTER TABLE productos AUTO_INCREMENT = 1');
    }

    return redirect()->route('productos.index')
        ->with('success', 'Producto eliminado correctamente.');
}

}

