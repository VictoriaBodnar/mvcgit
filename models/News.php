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

		$db = Db::getConnection();
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
	

		$db = Db::getConnection();
		$newslist = array();
		$result = $db->query('SELECT * FROM news ORDER BY date DESC LIMIT 10');
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$i=0;
		while ($row	= $result->fetch()) {
			$newslist[$i]['id'] = $row['id'];
			$newslist[$i]['title'] = $row['title'];
			$newslist[$i]['date'] = $row['date'];
			$newslist[$i]['short_content'] = $row['short_content'];
			$i++;
		}
		
		return $newslist;

	

}
	
}
?>