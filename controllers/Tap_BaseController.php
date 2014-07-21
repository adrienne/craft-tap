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

    /**
     * Respond
     *
     * @param mixed $data Data
     *
     * @return void
     */
    public function respond($data)
    {
        http_response_code($this->getStatusCode());

        return $this->returnJson($data);
    }

    /**
     * Respond With Error
     *
     * @param string $message Message
     *
     * @return void
     */
    public function respondWithError($message)
    {
        return $this->respond(array(
            'error' => array(
                'status_code' => $this->getStatusCode(),
                'message'     => $message,
            ),
        ));
    }

    /**
     * Respond Bad Request
     *
     * @param string $message Message
     *
     * @return void
     */
    public function respondBadRequest($message = "Bad Request")
    {
        return $this->setStatusCode(400)->respondWithError($message);
    }

    /**
     * Respond Not Found
     *
     * @param string $message Message
     *
     * @return void
     */
    public function respondNotFound($message = "Not Found")
    {
        return $this->setStatusCode(404)->respondWithError($message);
    }
}
