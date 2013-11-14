<?php

namespace Senqual\Model;

use Senqual\Data\Repository;
use Nette\Database;

/*
 * MonitorRepository class
 */
class MonitorRepository extends Repository
{	
	/*
	 * Ctor
	*/
	public function __construct(Database\Connection $database)
	{
		parent::__construct($database, 'monitors', "Senqual\\Model\\Monitor");
	}
}

?>