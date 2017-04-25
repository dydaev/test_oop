<?php

namespace root;

class Counter
{
	private $counter;

	final public function __construct($count = 0)
	{
		$this->counter = $count;
	}
	
	public function getCount()
	{
		return $this->counter;
	}

	public function getObject($count)
	{
		if ($count <= $this->counter) {
			$this->counter -= $count;
			return new $this($count);
		}
		return null;
	}

	public function addObject($count)
	{
		$this->counter += $count;
		return $count;
	}

}

