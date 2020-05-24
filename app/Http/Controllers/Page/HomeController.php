<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Presentation\SlideOne;
use App\Models\Publication\House\House;
use App\Models\Publication\News\News;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @return Factory|View
     */
    public function show(Request $request)
    {
        $this->permissionBlock();

        $order = $request->order;
        $orderBy = explode('-', $order);

        $slides  = SlideOne::getSlidesOne();
        $recents = News::getNews()->limit(3)->get();
        $houses  = House::select('publication_houses.*', 'publication_houses_offers.name as offer', 'uf')
            ->join('publication_houses_offers', 'publication_houses_offers.id', '=', 'publication_houses.offer_id')
            ->join('states', 'states.id', '=', 'publication_houses.state_id')
            ->where('publication_houses.entity_id', config('app.id'))
            ->where('status', 1)
            ->when($order, function ($query) use ($orderBy) {
                $query->orderBy($orderBy[0], $orderBy[1]);
            })
            ->when(!$order, function ($query) {
                $query->orderBy('created_at', 'desc');
            })
            ->paginate(9);

        return view('index', compact('slides', 'houses', 'recents', 'order'));
    }
}
