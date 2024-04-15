<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the dashboard view.
     *
     * @return View
     */
    public function index(): View
    {
        return view('dashboard.index');
    }

    /**
     *   Handle the request to generate a multiplication table and redirect to the appropriate route.
     *
     * @param  Request  $request
     *   The request.
     *
     * @return RedirectResponse
     */
    public function generateTable(Request $request): RedirectResponse
    {
        $size = $request->input('size', 10);
        return redirect()->route('multiplication.table', ['size' => $size]);
    }
}
