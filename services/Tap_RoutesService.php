<?php

namespace Craft;

class Tap_RoutesService extends BaseApplicationComponent
{
    /**
     * Action Configs
     *
     * @var array
     */
    protected $actionConfigs = array(
        'index'   => array('GET', '/'),
        'store'   => array('POST', '/'),
        'show'    => array('GET', '/(?P<id>\d+)'),
        'update'  => array('PUT,PATCH', '/(?P<id>\d+)'),
        'destroy' => array('DELETE', '/(?P<id>\d+)'),
    );

    /**
     * Generate Elements Actions Routes
     *
     * @param array  $elements Elements
     * @param string $prefix   Prefix
     *
     * @return array Routes
     */
    public function generateElementsActionsRoutes(array $elements, $prefix = NULL)
    {
        $routes = array();

        $request_type = craft()->request->getRequestType();

        if (! is_null($prefix)) {
            $prefix = trim($prefix, '/');
        }

        foreach ($elements as $element => $actions) {
            foreach ($actions as $action) {
                if (array_key_exists($action, $this->actionConfigs) && in_array($request_type, explode(',', $this->actionConfigs[$action][0]))) {
                    $routes[trim($prefix.'/(?P<element>'.$element.')/'.trim($this->actionConfigs[$action][1], '/'), '/')] = array('action' => 'tap/elementResource/'.$action);
                }
            }
        }

        return $routes;
    }
}
