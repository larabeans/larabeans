<?php

namespace App\Containers\Location\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetStateCitiesAction extends Action
{
    public function run(Request $request)
    {
        $cities = Apiato::call('Location@GetStateCitiesTask', [$request->id]);

        return $cities;
    }
}
