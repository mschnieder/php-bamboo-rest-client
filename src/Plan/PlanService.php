<?php

namespace BambooRestApi\Plan;

//use BambooRestApi\Issue\IssueType;
//use BambooRestApi\Issue\Reporter;
//use BambooRestApi\Issue\Version;

class PlanService extends \BambooRestApi\BambooClient
{
    private $uri = '/plan';

    /**
     * get all plan list.
     *
     * @param array $paramArray
     *
     * @throws \BambooRestApi\BambooException
     *
     * @return Plan[] array of Plan class
     */
    public function getAllPlans($paramArray = [])
    {
        $ret = $this->exec($this->uri.$this->toHttpQueryParameter($paramArray), null);

        $prjs = $this->json_mapper->mapArray(
            json_decode($ret, false), new \ArrayObject(), '\BambooRestApi\Plan\Plan'
        );

        return $prjs;
    }

    /**
     * get Plan id By Plan Key.
     * throws HTTPException if the plan is not found, or the calling user does not have permission or view it.
     *
     * @param string|int $planIdOrKey planName or Plan Key(Ex: Test, MyProj)
     *
     * @throws \BambooRestApi\BambooException
     * @throws \JsonMapper_Exception
     *
     * @return Plan|object
     */
    public function get($planIdOrKey)
    {
        $ret = $this->exec($this->uri."/$planIdOrKey?expand=plans", null);

        $this->log->addInfo('Result='.$ret);

        $prj = $this->json_mapper->map(
            json_decode($ret), new Plan()
        );

        return $prj;
    }
}
