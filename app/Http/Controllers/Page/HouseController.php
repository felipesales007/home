<?php

namespace App\Http\Controllers\Page;

use App\Helpers\NotifyHelpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\About\Information\Description;
use App\Models\Publication\House\House;
use App\Models\Publication\House\Item;
use App\Notifications\Contact;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\View\View;

class HouseController extends Controller
{
    use Notifiable;

    /**
     * E-mail para notificar.
     *
     * @var string
     */
    private $email;

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @return Factory|RedirectResponse|View
     */
    public function release(Request $request)
    {
        $this->permissionBlock();

        $background   = House::getRandomImage(2);
        $type_house   = $request['type_house'];
        $city         = $request['select_city'];
        $neighborhood = $request['select_neighborhood'];
        $order        = $request['order'];
        $orderBy      = explode('-', $order);

        $houses = House::getHouseType($type_house, $city, $neighborhood, $order, $orderBy, 2);

        return view('pages.house.page', compact('background', 'houses', 'type_house', 'city', 'neighborhood', 'order'));
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

        $background   = House::getRandomImage(3);
        $type_house   = $request['type_house'];
        $city         = $request['select_city'];
        $neighborhood = $request['select_neighborhood'];
        $order        = $request['order'];
        $orderBy      = explode('-', $order);

        $houses = House::getHouseType($type_house, $city, $neighborhood, $order, $orderBy, 3);

        return view('pages.house.page', compact('background', 'houses', 'type_house', 'city', 'neighborhood', 'order'));
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

        $background   = House::getRandomImage(1);
        $type_house   = $request['type_house'];
        $city         = $request['select_city'];
        $neighborhood = $request['select_neighborhood'];
        $order        = $request['order'];
        $orderBy      = explode('-', $order);

        $houses = House::getHouseType($type_house, $city, $neighborhood, $order, $orderBy, 1);

        return view('pages.house.page', compact('background', 'houses', 'type_house', 'city', 'neighborhood', 'order'));
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

        $items = Item::getItems($house->id ?? null);

        $this->permissionHasPage($house);

        return view('pages.house.detail', compact('house', 'items'));
    }

    /**
     * Enviar e-mail para o recurso especificado.
     *
     * @param ContactRequest $request
     * @return JsonResponse
     */
    public function email(ContactRequest $request)
    {
        try {
            // enviar notificação por e-mail
            $this->email = Description::getDescription()['email'];
            $this->notify(new Contact($request));

            $data = NotifyHelpers::success_top_center('fas fa-envelope', 'Mensagem enviado com sucesso.');
        } catch (Exception $e) {
            $data = NotifyHelpers::warning_top_center('fas fa-exclamation-triangle', 'O envio da mensagem falhou.<br><br><small><b>erro: </b>' . $e->getMessage() . '</small>');
        }

        return response()->json($data);
    }
}
