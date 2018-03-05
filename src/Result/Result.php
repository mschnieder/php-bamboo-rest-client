<?php

namespace BambooRestApi\Result;

use BambooRestApi\ClassSerialize;

class Result implements \JsonSerializable
{
	use ClassSerialize;

	/**
	 * Full name
	 * @var string
	 */
	public $expand;

	/**
	 * Project URI.
	 *
	 * @var string
	 */
	public $self;

	/**
	 * Project key.
	 *
	 * @var string
	 */
	public $key;

	/**
	 * Project name.
	 *
	 * @var string
	 */
	public $name;

	/**
	 * @var object
	 */
	public $jiraIssues;

	public function jsonSerialize()
	{
		return array_filter(get_object_vars($this), function ($var) {
			return !is_null($var);
		});
	}
}
