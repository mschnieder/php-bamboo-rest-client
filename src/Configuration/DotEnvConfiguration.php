<?php

namespace BambooRestApi\Configuration;

use BambooRestApi\BambooException;

/**
 * Class DotEnvConfiguration.
 */
class DotEnvConfiguration extends AbstractConfiguration
{
    /**
     * @param string $path
     */
    public function __construct($path = '.')
    {
        if (class_exists('\Dotenv\Dotenv')) {
            $dotenv = new \Dotenv\Dotenv($path);

            $dotenv->load();
            $dotenv->required(['BAMBOO_HOST', 'BAMBOO_USER', 'BAMBOO_PASS']);
        } elseif (class_exists('\Dotenv')) {
            \Dotenv::load($path);
            \Dotenv::required(['BAMBOO_HOST', 'BAMBOO_USER', 'BAMBOO_PASS']);
        } else {
            throw new BambooException('can not load PHP dotenv class.!');
        }

        $this->bambooHost = $this->env('BAMBOO_HOST');
        $this->bambooUser = $this->env('BAMBOO_USER');
        $this->bambooPassword = $this->env('BAMBOO_PASS');
        $this->bambooLogFile = $this->env('BAMBOO_LOG_FILE', 'bamboo-rest-client.log');
        $this->bambooLogLevel = $this->env('BAMBOO_LOG_LEVEL', 'WARNING');
        $this->curlOptSslVerifyHost = $this->env('CURLOPT_SSL_VERIFYHOST', false);
        $this->curlOptSslVerifyPeer = $this->env('CURLOPT_SSL_VERIFYPEER', false);
        $this->curlOptVerbose = $this->env('CURLOPT_VERBOSE', false);
    }

    /**
     * Gets the value of an environment variable. Supports boolean, empty and null.
     *
     * @param string $key
     * @param mixed  $default
     *
     * @return mixed
     */
    private function env($key, $default = null)
    {
        $value = getenv($key);

        if ($value === false) {
            return $default;
        }

        switch (strtolower($value)) {
            case 'true':
            case '(true)':
                return true;

            case 'false':
            case '(false)':
                return false;

            case 'empty':
            case '(empty)':
                return '';

            case 'null':
            case '(null)':
                return;
        }

        if ($this->startsWith($value, '"') && $this->endsWith($value, '"')) {
            return substr($value, 1, -1);
        }

        return $value;
    }

    /**
     * Determine if a given string starts with a given substring.
     *
     * @param string       $haystack
     * @param string|array $needles
     *
     * @return bool
     */
    public function startsWith($haystack, $needles)
    {
        foreach ((array) $needles as $needle) {
            if ($needle != '' && strpos($haystack, $needle) === 0) {
                return true;
            }
        }

        return false;
    }

    /**
     * Determine if a given string ends with a given substring.
     *
     * @param string       $haystack
     * @param string|array $needles
     *
     * @return bool
     */
    public function endsWith($haystack, $needles)
    {
        foreach ((array) $needles as $needle) {
            if ((string) $needle === substr($haystack, -strlen($needle))) {
                return true;
            }
        }

        return false;
    }
}
