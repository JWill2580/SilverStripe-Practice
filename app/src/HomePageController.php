<?php

namespace Layout;

use PageController;    


class HomePageController extends PageController 
{
	public function LatestArticles($count = 1)
	{
		return ArticlePage::get()
			->sort('Created', 'DESC')
			->limit($count);
	}
}
