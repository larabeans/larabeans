<?php

/**
 * @apiGroup           Location
 * @apiName            getAllCountries
 *
 * @api                {GET} /v1/countries Endpoint title here..
 * @apiDescription     Endpoint description here..
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiParam           {String}  parameters here..
 *
 * @apiUse             GeneralSuccessMultipleResponse
 */

/** @var Route $router */
$router->get('countries', [
    'as' => 'api_location_get_all_countries',
    'uses'  => 'Controller@getAllCountries',
    'middleware' => [
      'auth:api',
    ],
]);
