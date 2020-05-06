<?php

namespace App\Traits;

use App\Helpers\NotifyHelpers;
use App\Models\Management\Entity;
use Illuminate\Http\Exceptions\HttpResponseException;

trait PermissionTrait
{
    public function permissionBlock()
    {
        if (!Entity::getEntity()) {
            return abort(423);
        }

        return null;
    }

    /**
     * @param $page
     */
    public function permissionHasPage($page)
    {
        if (!$page) {
            throw new HttpResponseException(back()->with('notify', json_encode(NotifyHelpers::warning_top_center('fas fa-ban', 'Você não tem permissão para acessar a página solicitada.'))));
        }
    }
}
