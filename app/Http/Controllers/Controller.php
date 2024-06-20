<?php

namespace App\Http\Controllers;

use App\Traits\Response;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    use Response;
    use \App\Traits\Authorizes\AuthorizesRequests;

    /**
     * @return array
     */
    protected function resourcesAbilityMap(): array
    {
        return [];
    }
}
