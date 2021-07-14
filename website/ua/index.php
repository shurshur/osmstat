<?php Header("Content-Type: text/html; charset=utf-8"); 

ob_start(); ?>
<html><head>
<style> td {background-color: #fefefe}</style>
<?php //<script src="http://me.komzpa.net/sorttable.js"> </script> ?>
<title>OpenStreetMap.org Country Statistics by Komяpa</title></head><body bgcolor=#cccccc><h2>Статистика по областям Украины</h2>

<p>Ежедневное обновление запускается в 13:00 по Москве и выполняется около 18 часов. Багрепорты слать <a href="http://forum.openstreetmap.org/viewtopic.php?pid=121016">сюда</a>.
<p>См. также статистику от <a href="http://gis-lab.info/projects/osm-stats.html">gis-lab.info</a> и <a href="http://peirce.gis-lab.info/stat.php">Zkir</a>.</p>
<table class="sortable"  cellspacing=3 width=100%><tr><td>Name<td>Last update<td>Users<td>Speed<sup>1</sup><td>Quality<sup>2</sup><td>Activity<td>Best place
<?php
$rl=array(
  "" => "Украина",
  "vinnitsa" => "Винницкая область",
  "volynsk" => "Волынская область",
  "dnepropetrovsk" => "Днепропетровская область",
  "donetsk" => "Донецкая область",
  "zhitomir" => "Житомирская область",
  "zakarpatskaya" => "Закарпатская область",
  "zaporozh" => "Запорожская область",
  "ivanofrank" => "Ивано-Франковская область",
  "kiev" => "Киевская область",
  "kirovograd" => "Кировоградская область",
  "lugansk" => "Луганская область",
  "lvov" => "Львовская область",
  "nikolaev" => "Николаевская область",
  "odessa" => "Одесская область",
  "poltava" => "Полтавская область",
  "../ru/crimea" => "Республика Крым",
  "rovno" => "Ровенская область",
  "sumy" => "Сумская область",
  "ternopol" => "Тернопольская область",
  "kharkov" => "Харьковская область",
  "kherson" => "Херсонская область",
  "khmelnitsky" => "Хмельницкая область",
  "cherkassy" => "Черкасская область",
  "chernigov" => "Черниговская область",
  "chernovtsy" => "Черновицкая область",
);
foreach($rl as $r=>$n)
  if(file_exists("./$r/latest/oneline.inc.html"))
    print("<tr><td>".($r?"&raquo; ":"")."<a href=./$r/latest/>".file_get_contents("./$r/latest/oneline.inc.html"));
  else
    print "<tr><td>".($r?"&raquo; ":"").$n."</td><td colspan=6>calculation problem</td></tr>";
?>
</table>
<p>Credits: coding (c) <a href=xmpp:me@komzpa.net>Komяpa</a>, <a href="http://www.openstreetmap.org/message/new/Alexandr%20Zeinalov">Alexandr&nbsp;Zeinalov</a>;
russian translation (c) Volf Alexander, <a href=http://nanodesu.ru>Hind</a>;
macedonian translation (c) <a href=http://osm.vidi.mk>Goran Cvetkovski</a>;
albanian translation (c) Besnik Bleta.
Hosted on <a href=http://wiki.openstreetmap.org/wiki/OSM_Servers_in_Rambler>OSM.Rambler</a> by <a href=http://osm.sbin.ru>osm.sbin.ru</a>.
Source code available on <a href=https://github.com/shurshur/osmstat/>github</a>.
</p>
<p>[1] Speed = total number of objects / total number of days</p>

<p>[2] Quality = number of objects / number of filled tile; a tile is 2,5*10<sup>-5</sup> deg<sup>2</sup>; filled ones are represented by non-white pixels on density image.</p>
</body></html>
<?php
$cont = ob_get_clean();

#ob_start("gzhandler");
print $cont;

?>
