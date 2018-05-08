<?php
include_once ROOT. '/models/News.php';
class NewsController
{
	
	public function actionIndex()
	{
		$newsList = array();
		$newsList = News::getNewsList();
		echo '<pre>';
		print_r($newsList);
		echo '</pre>';
		////echo 'NewsController actionIndex';
		//echo 'Список новостей';
		return true;
	}
	//public function actionView($params)
	public function actionView($category,$id)
	{
		//echo 'NewsController actionIndex';
		echo '<br>Просмотр одной новости';

		/*echo '<br>'.$params[0];
		echo '<br>'.$params[1];
		echo '<br>'.$params[2];*/
		echo '<br>'.$category;
		echo '<br>'.$id;

		return true;
	}

}


?>