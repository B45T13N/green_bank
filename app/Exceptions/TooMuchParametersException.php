<?php

namespace App\Exceptions;

class TooMuchParametersException extends \Exception
{
    /**
     * Exception constructor
     *
     * @param string $message error message
     * @param int $code error code
     */
    public function __construct(array $unexpectedParameters)
    {
        $message = 'Unexpected parameters in the request: ' . implode(', ', $unexpectedParameters);
        parent::__construct($message, 400);
    }
}
