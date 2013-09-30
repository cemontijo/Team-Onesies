<?php

/**
 * Homepage presenter.
 */
class HomepagePresenter extends BasePresenter
{

	public function renderDefault()
	{
		if ( !$this->user->isLoggedIn() ) $this->redirect("Login:");
	}

}
