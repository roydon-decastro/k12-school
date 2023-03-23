<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UpdateGradesController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, $id): Response
    {
        // dd($id);
        // $view = view('filament.pages.update-grades', ['id' => $id]);
        //
        // return new Response($view->render());
    }
}
