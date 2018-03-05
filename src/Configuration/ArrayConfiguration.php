<?php
/**
 * Created by PhpStorm.
 * User: markus
 * Date: 01.03.18
 * Time: 13:19.
 */

namespace BambooRestApi\Configuration;

/**
 * Class ArrayConfiguration.
 */
class ArrayConfiguration extends AbstractConfiguration
{
    /**
     * @param array $configuration
     */
    public function __construct(array $configuration)
    {
        $this->bambooLogFile = 'bamboo-rest-client.log';
        $this->bambooLogLevel = 'WARNING';
        $this->curlOptSslVerifyHost = false;
        $this->curlOptSslVerifyPeer = false;
        $this->curlOptVerbose = false;

        foreach ($configuration as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }
}
