<?php

namespace Php1C\Exceptions;

use Exception;
use Php1C\Request;

/**
 * Class UnsupportedRequestException
 *
 * @package Php1C\Exceptions
 */
class UnsupportedRequestException extends Exception
{
    /**
     * @var \Php1C\Request
     */
    private $request;

    /**
     * UnsupportedRequestException constructor
     *
     * @param \Php1C\Request $request
     * @param int $code
     * @param Exception|null $previous
     */
    public function __construct(Request $request = null, $code = 0, Exception $previous = null)
    {
        $this->request = $request;

        parent::__construct('Sending of unsupported request', $code, $previous);
    }

    /**
     * @return \Php1C\Request
     */
    public function getRequest()
    {
        return $this->request;
    }
}
