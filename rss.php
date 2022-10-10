<?php
header('Content-Type: text/xml; charset=utf-8');
require_once "Class/Core.php";
require_once "Class/Brands.php";
require_once "Class/Models.php";
$url_str=INDEX."/";
$brands=new Brands();
$models=new Models();
echo '<?xml version="1.0"?>
          <rss version="2.0" xmlns:media="http://search.yahoo.com/mrss/">
          <channel>
          <title>'.TITLE_RSS.'</title>
          <link>'.$url_str.'</link>
          <description>'.DESCR_RSS.'</description>
          <language>ru-ru</language>'

;
foreach ($brands->get_all_brands() as $all_brands)
//'..'
{
    echo '<item>
            <title>'.$all_brands['title'].'</title>
            <link>'.$url_str.$all_brands['url_brands'].'</link>
            <description>'.$all_brands['description'].'</description>
            <guid>'.$url_str.$all_brands['url_brands'].'</guid>
          <enclosure url="'.$url_str."images/brands/".$all_brands['img_brands'].'" type="image/png"/>
              <media:content type="image/png" medium="image" width="900" height="300"
url="'.$url_str."images/brands/".$all_brands['img_brands'].'">
        <media:description type="plain">
            '.$all_brands['title'].'
        </media:description>
        <media:copyright>Farn-Avto</media:copyright>
    </media:content>
          <image>
			<url>'.$url_str."images/brands/".$all_brands['img_brands'].'</url>
		</image>
         </item>';
    foreach ($models->get_all_models($all_brands['url_brands']) as $all_models) {
        echo '<item>
            <title>' . $all_models['title'] . '</title>
            <link>' . $url_str . $all_models['brand_category']."/".$all_models['url_models'] . '</link>
            <description>' . $all_models['description'] . '</description>
            <guid>' . $url_str . $all_models['brand_category']."/".$all_models['url_models'] . '</guid>
            <enclosure url="' . $url_str . "images/models/" . $all_models['img_model1'] . '" type="image/jpg"/>
              <media:content type="image/jpg" medium="image" width="900" height="300"
url="' . $url_str . "images/models/" . $all_models['img_model1'] . '">
        <media:description type="plain">
            '.$all_models['title'].'
        </media:description>
        <media:copyright>Farn-Avto</media:copyright>
    </media:content>
          <image>
			<url>' . $url_str . "images/models/" . $all_models['img_model1'] . '</url>
		</image>
         </item>';
 } }
echo '</channel>
   </rss>';
?>