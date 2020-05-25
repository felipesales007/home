<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\About\Information\Description;
use App\Models\About\Information\Social;
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

        $offer        = $request['type_offer'];
        $type_house   = $request['type_house'];
        $city         = $request['select_city'];
        $neighborhood = $request['select_neighborhood'];
        $order        = $request['order'];
        $orderBy      = explode('-', $order);

        $site    = Description::getDescription();
        $socials = Social::getSocial();
        $slides  = SlideOne::getSlidesOne();
        $recents = News::getNews()->limit(3)->get();
        $houses  = House::getHousesType($type_house, $city, $neighborhood, $order, $orderBy, $offer);

        return view('index', compact('site', 'socials', 'slides', 'recents', 'houses', 'offer', 'type_house', 'city', 'neighborhood', 'order'));
    }
}
