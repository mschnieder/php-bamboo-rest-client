<?php

namespace BambooRestApi\Configuration;

/**
 * Class AbstractConfiguration.
 */
abstract class AbstractConfiguration implements ConfigurationInterface
{
    /**
     * Bamboo host.
     *
     * @var string
     */
    protected $bambooHost;

    /**
     * Bamboo login.
     *
     * @var string
     */
    protected $bambooUser;

    /**
     * Bamboo password.
     *
     * @var string
     */
    protected $bambooPassword;

    /**
     * Path to log file.
     *
     * @var string
     */
    protected $bambooLogFile;

    /**
     * Log level (DEBUG, INFO, ERROR, WARNING).
     *
     * @var string
     */
    protected $bambooLogLevel;

    /**
     * Curl options CURLOPT_SSL_VERIFYHOST.
     *
     * @var bool
     */
    protected $curlOptSslVerifyHost;

    /**
     * Curl options CURLOPT_SSL_VERIFYPEER.
     *
     * @var bool
     */
    protected $curlOptSslVerifyPeer;

    /**
     * Curl options CURLOPT_VERBOSE.
     *
     * @var bool
     */
    protected $curlOptVerbose;

    /**
     * @return string
     */
    public function getBambooHost()
    {
        return $this->bambooHost;
    }

    /**
     * @return string
     */
    public function getBambooUser()
    {
        return $this->bambooUser;
    }

    /**
     * @return string
     */
    public function getBambooPassword()
    {
        return $this->bambooPassword;
    }

    /**
     * @return string
     */
    public function getBambooLogFile()
    {
        return $this->bambooLogFile;
    }

    /**
     * @return string
     */
    public function getBambooLogLevel()
    {
        return $this->bambooLogLevel;
    }

    /**
     * @return bool
     */
    public function isCurlOptSslVerifyHost()
    {
        return $this->curlOptSslVerifyHost;
    }

    /**
     * @return bool
     */
    public function isCurlOptSslVerifyPeer()
    {
        return $this->curlOptSslVerifyPeer;
    }

    /**
     * @return bool
     */
    public function isCurlOptVerbose()
    {
        return $this->curlOptVerbose;
    }
}
