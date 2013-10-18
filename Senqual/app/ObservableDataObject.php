<?php

class ObservableDataObject 
{
	const UNCHANGED = 0;
	const ADD = 1;
	const REMOVE = 2;
	
	private $dataObject;
	private $status;

	public function __construct($dataObject, $status = UNCHANGED)
	{
		$this->dataObject = $dataObject;
		$this->status = $status;
	}
	
	/**
	 * @return the $dataObject
	 */
	public function getDataObject() {
		return $this->dataObject;
	}
	
	/**
	 * @return the $status
	 */
	public function getStatus() {
		return $this->status;
	}
	
	/**
	 * @param string $status
	 */
	public function setStatus($status) {
		$this->status = $status;
	}
}

?>