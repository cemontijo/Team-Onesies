<?php

namespace Senqual\Model;

use Senqual\Data\Repository;
use Nette\Database;

/*
 * RulesRepository class
*/
class RulesRepository extends Repository
{
	/*
	 * Ctor
	*/
	public function __construct(Database\Connection $database)
	{
		parent::__construct($database, 'rules', "Senqual\\Model\\Rule");
	}
}

?>