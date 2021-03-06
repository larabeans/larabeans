<?php

/**
 * @apiGroup           Tenant
 * @apiName            createTenant
 *
 * @api                {POST} /v1/tenants Create New Tenant
 * @apiDescription     Tenant is business Identity, api allows registration of tenant (i.e. business) identities.
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiParam           {String}  name
 *
 * @apiUse             TenantSuccessSingleResponse
 */

/** @var Route $router */
$router->post('tenants', [
    'as' => 'api_tenant_create_tenant',
    'uses'  => 'Controller@createTenant',
    'middleware' => [
      'auth:api',
    ],
]);
