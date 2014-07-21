<?php

namespace Craft;

class Tap_BaseController extends BaseController
{
    /**
     * Initialize
     *
     * @return void
     */
    public function init()
    {
        craft()->log->removeRoute('WebLogRoute');
        craft()->log->removeRoute('ProfileLogRoute');

        parent::init();
    }
}
