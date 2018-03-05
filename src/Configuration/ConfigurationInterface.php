<?php
/**
 * Created by PhpStorm.
 * User: markus schnieder
 * Date: 01.03.2018
 * Time: 13:20.
 */

namespace BambooRestApi\Configuration;

/**
 * Interface ConfigurationInterface.
 */
interface ConfigurationInterface
{
    /**
     * Bamboo host.
     *
     * @return string
     */
    public function getBambooHost();

    /**
     * Bamboo login.
     *
     * @return string
     */
    public function getBambooUser();

    /**
     * Bamboo password.
     *
     * @return string
     */
    public function getBambooPassword();

    /**
     * Path to log file.
     *
     * @return string
     */
    public function getBambooLogFile();

    /**
     * Log level (DEBUG, INFO, ERROR, WARNING).
     *
     * @return string
     */
    public function getBambooLogLevel();

    /**
     * Curl options CURLOPT_SSL_VERIFYHOST.
     *
     * @return bool
     */
    public function isCurlOptSslVerifyHost();

    /**
     * Curl options CURLOPT_SSL_VERIFYPEER.
     *
     * @return bool
     */
    public function isCurlOptSslVerifyPeer();

    /**
     * Curl options CURLOPT_VERBOSE.
     *
     * @return bool
     */
    public function isCurlOptVerbose();
}
