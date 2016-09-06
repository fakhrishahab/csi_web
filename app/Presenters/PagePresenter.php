<?php

namespace csi\Presenters;

use Lewis\Presenter\AbstractPresenter;

class PagePresenter extends AbstractPresenter
{
	public function prettyUri()
	{
		return '/'.ltrim($this->uri, '/');
	}
}