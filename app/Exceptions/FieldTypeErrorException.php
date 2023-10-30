<?php

namespace App\Exceptions;

class FieldTypeErrorException extends \Exception
{
    /**
     * Exception constructor
     *
     * @param string $message error message
     * @param int $code error code
     */
    public function __construct($message = 'Error on request', $code = 400)
    {
        parent::__construct($message, $code);
    }
}
