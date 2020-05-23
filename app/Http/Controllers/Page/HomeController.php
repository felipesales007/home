<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Presentation\SlideOne;
use App\Models\Publication\House\House;
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

        $slides  = SlideOne::getSlidesOne();
        $recents = News::getNews()->limit(3)->get();
        $houses  = House::select('publication_houses.*', 'publication_houses_offers.name as offer', 'uf')
            ->join('publication_houses_offers', 'publication_houses_offers.id', '=', 'publication_houses.offer_id')
            ->join('states', 'states.id', '=', 'publication_houses.state_id')
            ->where('publication_houses.entity_id', config('app.id'))
            ->where('status', 1)
            ->paginate(9);

        return view('index', compact('slides', 'houses', 'recents'));
    }
}
