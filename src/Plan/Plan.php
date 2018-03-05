<?php

namespace BambooRestApi\Plan;

use BambooRestApi\ClassSerialize;

class Plan implements \JsonSerializable
{
    use ClassSerialize;

    /**
     * return only if Plan query by key(not id).
     *
     * @var string
     */
    public $expand;

    /**
     * Plan URI.
     *
     * @var string
     */
    public $self;

    /**
     * Plan key.
     *
     * @var string
     */
    public $key;

    /**
     * Plan name.
     *
     * @var string
     */
    public $name;

    public function jsonSerialize()
    {
        return array_filter(get_object_vars($this), function ($var) {
            return !is_null($var);
        });
    }
}
