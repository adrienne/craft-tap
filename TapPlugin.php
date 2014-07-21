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
        return '1.0';
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

        if ($request_type == 'GET') {
            $routes['tap/(?P<element>\w+)'] = array('action' => 'tap/element/index');
        }

        if ($request_type == 'POST') {
            $routes['tap/(?P<element>\w+)'] = array('action' => 'tap/element/store');
        }

        if ($request_type == 'GET') {
            $routes['tap/(?P<element>\w+)/(?P<id>\d+)'] = array('action' => 'tap/element/show');
        }

        if (in_array($request_type, array('PUT', 'PATCH'))) {
            $routes['tap/(?P<element>\w+)/(?P<id>\d+)'] = array('action' => 'tap/element/update');
        }

        if ($request_type == 'DELETE') {
            $routes['tap/(?P<element>\w+)/(?P<id>\d+)'] = array('action' => 'tap/element/destroy');
        }

        return $routes;
    }
}
