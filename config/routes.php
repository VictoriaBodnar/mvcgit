 <?php
return array (


//'news/77' => 'news/view', 
//'news/15' => 'news/view', 
//'news/([0-9]+)' => 'news/view', 
// news/sport/114

'news/([a-z]+)/([0-9]+)' => 'news/view/$1/$2',	

'news' => 'news/index', //actionIndex в NewsController
'products' => 'product/list', //actionList в ProductController

);

?>