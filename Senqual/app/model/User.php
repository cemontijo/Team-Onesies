<?php

namespace Senqual\Model;

use Senqual\Data\DataObject;
use Nette\Database;

/*
 * User class
 */
class User extends DataObject implements IUserLogin, IUserProfile
{
	
	/*
	 * Ctor
	 */
	protected function __construct(Database\Connection $database, $userId, $id=-1)
	{
		parent::__construct($database, $userId, $id, 'users');
	}
	
	/*
	 * IUserLogin Interface
	 */
	public function setUsername($username) {
		$this->row['email'] = $username;
	}
	
	public function getUsername() {
		return $this->row['email'];
	}
	
	public function setPassword($password) {
		$this->row['password'] = \Authenticator::calculateHash($password);
	}
	
	/*
	 * IUserProfile Interface
	 */
	public function setEmail($email) {
		$this->row['email'] = $email;
	}

	public function getEmail() {
		return $this->row['email'];
	}

	public function setName($name) {
		$this->row['name'] = $name;
	}

	public function getName() {
		return $this->row['name'];
	}

	public function setAffiliation($affiliation) {
		$this->row['affiliation'] = $affiliation;
	}

	public function getAffiliation() {
		return $this->row['affiliation'];
	}
	
	public function setTitle($title) {
		$this->row['title'] = $title;
	}
	
	public function getTitle() {
		return $this->row['title'];
	}

	public function setPhone($phone) {
		$this->row['phone'] = $phone;
	}

	public function getPhone() {
		return $this->row['phone'];
	}

}

?>