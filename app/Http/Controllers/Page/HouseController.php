<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\About\Information\Description;
use App\Models\About\Information\Social;
use App\Models\Publication\House\House;
use App\Models\Publication\House\Item;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HouseController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @return Factory|RedirectResponse|View
     */
    public function release(Request $request)
    {
        $this->permissionBlock();

        $offer = 2;

        $site         = Description::getDescription();
        $socials      = Social::getSocial();
        $background   = House::getRandomImage($offer);
        $type_house   = $request['type_house'];
        $city         = $request['select_city'];
        $neighborhood = $request['select_neighborhood'];
        $order        = $request['order'];
        $orderBy      = explode('-', $order);

        $houses  = House::getHousesType($type_house, $city, $neighborhood, $order, $orderBy, $offer);
        $recents = House::getHousesRecents($offer);

        return view('pages.house.page', compact('site','socials', 'background', 'houses', 'type_house', 'city', 'neighborhood', 'order', 'recents'));
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @return Factory|RedirectResponse|View
     */
    public function used(Request $request)
    {
        $this->permissionBlock();

        $offer = 3;

        $site         = Description::getDescription();
        $socials      = Social::getSocial();
        $background   = House::getRandomImage($offer);
        $type_house   = $request['type_house'];
        $city         = $request['select_city'];
        $neighborhood = $request['select_neighborhood'];
        $order        = $request['order'];
        $orderBy      = explode('-', $order);

        $houses  = House::getHousesType($type_house, $city, $neighborhood, $order, $orderBy, $offer);
        $recents = House::getHousesRecents($offer);

        return view('pages.house.page', compact('site','socials', 'background', 'houses', 'type_house', 'city', 'neighborhood', 'order', 'recents'));
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @return Factory|RedirectResponse|View
     */
    public function rental(Request $request)
    {
        $this->permissionBlock();

        $offer = 1;

        $site         = Description::getDescription();
        $socials      = Social::getSocial();
        $background   = House::getRandomImage($offer);
        $type_house   = $request['type_house'];
        $city         = $request['select_city'];
        $neighborhood = $request['select_neighborhood'];
        $order        = $request['order'];
        $orderBy      = explode('-', $order);

        $houses  = House::getHousesType($type_house, $city, $neighborhood, $order, $orderBy, $offer);
        $recents = House::getHousesRecents($offer);

        return view('pages.house.page', compact('site','socials', 'background', 'houses', 'type_house', 'city', 'neighborhood', 'order', 'recents'));
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @return Factory|View
     */
    public function detail(Request $request)
    {
        $this->permissionBlock();

        $site    = Description::getDescription();
        $socials = Social::getSocial();
        $house   = House::getHouse($request['id']);
        $items   = Item::getItems($house['id'] ?? null);
        $recents = House::getHousesRecents($house['offer_id']);

        $this->permissionHasPage($house);

        return view('pages.house.detail', compact('site','socials','house', 'items', 'recents'));
    }
}
