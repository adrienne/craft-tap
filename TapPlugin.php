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

        $elements = craft()->config->get('elements', 'tap');
        $prefix = craft()->config->get('prefix', 'tap');

        $routes = array_replace($routes, craft()->tap_routes->generateElementsActionsRoutes($elements, $prefix));

        return $routes;
    }
}
