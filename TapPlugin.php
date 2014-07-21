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
}
