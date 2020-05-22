<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Presentation\SlideOne;
use App\Models\Publication\News\News;
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

        $recents = News::getNews()->limit(3)->get();
        $slides  = SlideOne::getSlidesOne();

        return view('index', compact('slides', 'recents'));
    }
}
