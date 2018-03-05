<?php

namespace BambooRestApi\Project;

//use BambooRestApi\Issue\IssueType;
//use BambooRestApi\Issue\Reporter;
//use BambooRestApi\Issue\Version;

class ProjectService extends \BambooRestApi\BambooClient
{
    private $uri = '/project';

    /**
     * get all project list.
     *
     * @param array $paramArray
     *
     * @throws \BambooRestApi\BambooException
     *
     * @return Project[] array of Project class
     */
    public function getAllProjects($paramArray = [])
    {
        $ret = $this->exec($this->uri.$this->toHttpQueryParameter($paramArray), null);

        $prjs = $this->json_mapper->mapArray(
            json_decode($ret, false), new \ArrayObject(), '\BambooRestApi\Project\Project'
        );

        return $prjs;
    }

    /**
     * get Project id By Project Key.
     * throws HTTPException if the project is not found, or the calling user does not have permission or view it.
     *
     * @param string|int $projectIdOrKey projectName or Project Key(Ex: Test, MyProj)
     *
     * @throws \BambooRestApi\BambooException
     * @throws \JsonMapper_Exception
     *
     * @return Project|object
     */
    public function get($projectIdOrKey)
    {
        $ret = $this->exec($this->uri."/$projectIdOrKey?expand=projects", null);

        $this->log->addInfo('Result='.$ret);

        $prj = $this->json_mapper->map(
            json_decode($ret), new Project()
        );

        return $prj;
    }
}
