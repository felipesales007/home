<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @return Factory|View
     */
    public function show()
    {
        $this->permissionBlock();

        return view('index');
    }
}
