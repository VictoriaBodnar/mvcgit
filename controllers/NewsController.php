<?php
class NewsController
{
	
	public function actionIndex()
	{
		//echo 'NewsController actionIndex';
		echo 'Список новостей';
		return true;
	}
	public function actionView()
	{
		//echo 'NewsController actionIndex';
		echo 'Просмотр одной новости';
		return true;
	}
	

}


?>