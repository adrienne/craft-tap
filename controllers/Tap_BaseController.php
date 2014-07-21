<?php

namespace Craft;

class Tap_BaseController extends BaseController
{
    /**
     * Status Code
     *
     * @var integer
     */
    protected $statusCode = 200;

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

    /**
     * Get Status Code
     *
     * @return integer Status Code
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Set Status Code
     *
     * @param integer $status_code Status Code
     *
     * @return Tap_BaseController
     */
    public function setStatusCode($status_code)
    {
        $this->statusCode = (integer) $status_code;

        return $this;
    }
}
