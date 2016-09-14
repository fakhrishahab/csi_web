<?php

namespace csi\Presenters;

use Lewis\Presenter\AbstractPresenter;

class PagePresenter extends AbstractPresenter
{
	public function uriWildcard()
	{
		return $this->uri.'*';
	}

	public function prettyUri()
	{
		return '/'.ltrim($this->uri, '/');
	}

	public function linkToPaddedTittle($link)
	{
		$padding = str_repeat('&nbsp;', $this->depth * 4);

		return $padding.link_to($link, $this->title);
	}

	public function padded_title()
	{
		return str_repeat('&nbsp;', $this->depth * 4).$this->title;
	}
}