<?php

namespace Php1C;

use stdClass;

/**
 * Class Request Базовый класс для всех запросов к 1С
 *
 * @package Php1C
 */
abstract class Request extends stdClass
{
    public function __toString()
    {
        return print_r($this, true);
    }
}
