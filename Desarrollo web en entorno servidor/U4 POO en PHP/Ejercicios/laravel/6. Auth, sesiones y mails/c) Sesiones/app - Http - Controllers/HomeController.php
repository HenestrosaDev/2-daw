<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        //$request->session()->put([Auth::user()->name => Auth::user()->role->name]); is the same as:
        session([Auth::user()->name => Auth::user()->role->nombre]);

        return $request->session()->all();
    }

    public function delete(Request $request, $id)
    {
        $request->session()->forget($id);
        return $request->session()->all();
    }

    public function deleteAll(Request $request)
    {
        // flush() elimina todos los datos de la sesión.
        $request->session()->flush();
        return $request->session()->all();
    }

    public function flash(Request $request)
    {
        /*
         * flash() es útil para almacenar información de estado en la
         * sesión, cuya información es necesaria de forma temporal.
         * Por ejemplo, se puede usar para informar de que una acción 
         * se completó exitosamente.
         * 
         * Su periodo de vida es de dos peticiones:
         *  1. Tras ejecutar la petición HTTP en la que se obtiene.
         *  2. La petición HTTP subsecuente.
         */

        // $request->session()->flash('status3', 'Éxito3');
        // $request->session()->flash('status4', 'Éxito4');
        // $request->session()->flash('status5', 'Éxito5');
        
        /*
         * reflash() mantiene la información de la sesión almacenada
         * con flash(). Para probarlo, tendríamos que descomentar las 
         * líneas de arriba, refrescar la página, comentarlas de nuevo
         * y refrescar varias veces. Podremos comprobar que gracias a
         * reflash(), la información de la sesión almacenada con flash() 
         * persiste.
         */

        //$request->session()->reflash();

        /*
         * reflash() guarda toda la información almacenada con flash(), 
         * pero si queremos guardar solo alguna, tendremos que utilizar
         * keep().
         */

        //$request->session()->flash('status5', 'Éxito5');
        //$request->session()->flash('status6', 'Éxito6');
        $request->session()->keep(['status6']);
        
        return $request->session()->all();
    }

    public function regenSessionId(Request $request)
    {
        $request->session()->regenerate();
        return $request->session()->all();
    }
}
