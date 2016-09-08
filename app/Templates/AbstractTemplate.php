<?php

namespace csi\Templates;

use Illuminate\View\View;

abstract class AbstractTemplate
{
	protected $view;

	abstract public function prepare(View $view, array $parameters);

	public getView()
	{
		return $this->view;
	}
}