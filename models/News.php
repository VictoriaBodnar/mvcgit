<?php
class News {
/**
* Returns single news item with secified id	
* @param integer $id
*
*/
public static function getNewsItemById($id)
{
	//Запрос к БД
	$id = intval($id);
	if ($id) {

		$db = Db::detConnection();
		$result = $db->query('SELECT * FROM news WHERE id='.$id);
		$result->setFetchMode(PDO::FETCH_ASSOC);

		$newsItem = $result->fetch();

		return $newsItem;

	}
}
/**
*Returns array of news items
*
*/
public static function getNewsList()
{

}
	
}
?>