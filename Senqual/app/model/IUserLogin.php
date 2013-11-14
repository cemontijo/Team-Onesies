<?php

namespace Senqual\Model;

/*
 * IUserLogin interface
 * Manages Login: Username & Password
 */
interface IUserLogin
{
	public function setUsername($username);
	public function getUsername();
	public function setPassword($password);
}
?>