<?php

namespace Senqual\Data;

interface IDataObject extends IStoreable
{
	public function delete();
	public function isDeleted();
	public function getId();
	public function getTableName();
	public function equals(IDataObject $dataObject);
	public function getDataRow();
}

?>