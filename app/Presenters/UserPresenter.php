<?php

namespace csi\Presenters;

use Lewis\Presenter\AbstractPresenter;

class UserPresenter extends AbstractPresenter
{
	public function lastLoginDifference()
	{
		return $this->updated_at->diffForHumans();
	}
}