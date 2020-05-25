<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
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

        $background   = House::getRandomImage($offer);
        $type_house   = $request['type_house'];
        $city         = $request['select_city'];
        $neighborhood = $request['select_neighborhood'];
        $order        = $request['order'];
        $orderBy      = explode('-', $order);

        $houses  = House::getHouseType($type_house, $city, $neighborhood, $order, $orderBy, $offer);
        $recents = House::getHouseRecents($offer);

        return view('pages.house.page', compact('background', 'houses', 'type_house', 'city', 'neighborhood', 'order', 'recents'));
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

        $background   = House::getRandomImage($offer);
        $type_house   = $request['type_house'];
        $city         = $request['select_city'];
        $neighborhood = $request['select_neighborhood'];
        $order        = $request['order'];
        $orderBy      = explode('-', $order);

        $houses  = House::getHouseType($type_house, $city, $neighborhood, $order, $orderBy, $offer);
        $recents = House::getHouseRecents($offer);

        return view('pages.house.page', compact('background', 'houses', 'type_house', 'city', 'neighborhood', 'order', 'recents'));
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

        $background   = House::getRandomImage($offer);
        $type_house   = $request['type_house'];
        $city         = $request['select_city'];
        $neighborhood = $request['select_neighborhood'];
        $order        = $request['order'];
        $orderBy      = explode('-', $order);

        $houses  = House::getHouseType($type_house, $city, $neighborhood, $order, $orderBy, $offer);
        $recents = House::getHouseRecents($offer);

        return view('pages.house.page', compact('background', 'houses', 'type_house', 'city', 'neighborhood', 'order', 'recents'));
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

        $house = House::select('publication_houses.*', 'uf', 'publication_houses_types_houses.name as type',
            'publication_houses_realtors.contact', 'publication_houses_realtors.whatsapp')
            ->join('publication_houses_offers', 'publication_houses_offers.id', '=', 'publication_houses.offer_id')
            ->join('publication_houses_types_houses', 'publication_houses_types_houses.id', '=', 'publication_houses.type_house_id')
            ->join('publication_houses_realtors', 'publication_houses_realtors.id', '=', 'publication_houses.realtor_id')
            ->join('states', 'states.id', '=', 'publication_houses.state_id')
            ->where('publication_houses.entity_id', config('app.id'))
            ->find($request['id']);

        $items   = Item::getItems($house->id ?? null);
        $recents = House::getHouseRecents($house['offer_id']);

        $this->permissionHasPage($house);

        return view('pages.house.detail', compact('house', 'items', 'recents'));
    }
}
