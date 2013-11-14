<?php

namespace Senqual\Model;

interface IUserProfile 
{
	public function setEmail($email);
	public function getEmail();
	public function setName($name);
	public function getName();
	public function setAffiliation($affiliation);
	public function getAffiliation();
	public function setPhone($phone);
	public function getPhone();
}

?>