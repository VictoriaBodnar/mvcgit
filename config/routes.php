 <?php
return array (

//'news/77' => 'news/view', 
//'news/15' => 'news/view', 
'news/([0-9]+)' => 'news/view', 
'news' => 'news/index', //actionIndex в NewsController
'products' => 'product/list', //actionList в ProductController

);

?>