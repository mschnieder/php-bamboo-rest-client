<?php

namespace BambooRestApi\Result;

class ResultService extends \BambooRestApi\BambooClient
{
	private $uri = '/result';

	/**
 * get all result list.
 *
 * @param array $paramArray
 *
 * @throws \BambooRestApi\BambooException
 *
 * @return Result[] array of Result class
 */
	public function getAllResults($paramArray = [])
	{
		$ret = $this->exec($this->uri.'/.json?'.$this->toHttpQueryParameter($paramArray), null);

		$prjs = $this->json_mapper->mapArray(
			json_decode($ret, false), new \ArrayObject(), '\BambooRestApi\Result\Result'
		);

		return $prjs;
	}

	/**
	 * get all result list.
	 *
	 * @param array $paramArray
	 *
	 * @throws \BambooRestApi\BambooException
	 *
	 * @return Result[] array of Result class
	 */
	public function getAllResultsByProject($projectkey)
	{
		$ret = $this->exec($this->uri.'/'.$projectkey.'/.json', null);

		echo $ret;

		$prjs = $this->json_mapper->map(
			json_decode($ret, false), new Result()
		);

		return $prjs;
	}

	/**
	 * get Result id By Result Key.
	 * throws HTTPException if the result is not found, or the calling user does not have permission or view it.
	 *
	 * @param string|int $resultIdOrKey resultName or Result Key(Ex: Test, MyProj)
	 *
	 * @throws \BambooRestApi\BambooException
	 * @throws \JsonMapper_Exception
	 *
	 * @return Result|object
	 */
	public function get($resultIdOrKey)
	{
		$ret = $this->exec($this->uri."/$resultIdOrKey/.json?key=".$resultIdOrKey, null);

		$this->log->addInfo('Result='.$ret);

		$prj = $this->json_mapper->map(
			json_decode($ret), new Result()
		);

		return $prj;
	}

	public function getJiraIssues($projectkey) {
		$ret = $this->exec($this->uri.'/'.$projectkey.'/.json?expand=results.result.jiraIssues&max-results=500', null);

		$prjs = $this->json_mapper->map(
			json_decode($ret, false), new Result()
		);

		return $prjs;
	}

}
