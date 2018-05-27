<?php 


class slideControllers
{
	public function showSlidesInViewController()
	{
		$response = slideModels::showSlidesInViewModel("slide");
		if ($response) {
			return $response;
		}
		return [];
	}
}