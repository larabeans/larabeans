<?php

namespace App\Containers\Location\UI\API\Transformers;

use App\Containers\Location\Models\Location;
use App\Containers\Location\Models\State;
use App\Ship\Parents\Transformers\Transformer;

class StateTransformer extends Transformer
{
    /**
     * @var  array
     */
    protected $defaultIncludes = [

    ];

    /**
     * @var  array
     */
    protected $availableIncludes = [
      'cities'
    ];

    /**
     * @param State $entity
     *
     * @return array
     */
    public function transform(State $entity)
    {
        $response = [
            'object' => 'State',
            'id' => $entity->getHashedKey(),
            'country_id' => $entity->country_id,
            'name' => $entity->name,
            'code' => $entity->code,
            'created_at' => $entity->created_at,
            'updated_at' => $entity->updated_at,

        ];

        $response = $this->ifAdmin([
            'real_id'    => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);

        return $response;
    }

    public function includeCities(Location $location)
    {
      return $this->collection($location->cities, new CityTransformer());
    }
}
