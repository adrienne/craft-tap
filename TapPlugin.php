<?php

namespace Craft;

class TapPlugin extends BasePlugin
{
    /**
     * Get Plugin Name
     *
     * @return string Plugin Name
     */
    public function getName()
    {
        return 'Tap';
    }

    /**
     * Get Plugin Version
     *
     * @return string Plugin Version
     */
    public function getVersion()
    {
        return '0.0.0-alpha';
    }

    /**
     * Get Plugin Developer
     *
     * @return string Plugin Developer
     */
    public function getDeveloper()
    {
        return 'Matt Helm';
    }

    /**
     * Get Plugin Developer URL
     *
     * @return string Plugin Developer URL
     */
    public function getDeveloperUrl()
    {
        return 'https://mtthlm.com/';
    }

    /**
     * Register Site Routes
     *
     * @return array Site Routes
     */
    public function registerSiteRoutes()
    {
        $routes = array();

        $request_type = craft()->request->getRequestType();

        $prefix = trim(craft()->config->get('prefix', 'tap'), '/');

        if ($request_type == 'GET') {
            $routes[$prefix.'/(?P<element>\w+)'] = array('action' => 'tap/elementResource/index');
        }

        if ($request_type == 'POST') {
            $routes[$prefix.'/(?P<element>\w+)'] = array('action' => 'tap/elementResource/store');
        }

        if ($request_type == 'GET') {
            $routes[$prefix.'/(?P<element>\w+)/(?P<id>\d+)'] = array('action' => 'tap/elementResource/show');
        }

        if (in_array($request_type, array('PUT', 'PATCH'))) {
            $routes[$prefix.'/(?P<element>\w+)/(?P<id>\d+)'] = array('action' => 'tap/elementResource/update');
        }

        if ($request_type == 'DELETE') {
            $routes[$prefix.'/(?P<element>\w+)/(?P<id>\d+)'] = array('action' => 'tap/elementResource/destroy');
        }

        return $routes;
    }
}
