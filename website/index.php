<?php Header("Content-Type: text/html; charset=utf-8"); 

ob_start(); ?>
<html><head>
<style> td {background-color: #fefefe}</style>
<script src="sorttable.js"> </script>
<title>OpenStreetMap.org Country Statistics by Komяpa</title></head><body bgcolor=#cccccc><h2>OpenStreetMap.org Country Statistics / Статистика OSM по странам</h2>

<p>Everyday update starts at 09:00 GMT and executes avg. 18 hours. <a href="http://www.openstreetmap.org/message/new/Alexandr%20Zeinalov" target="_new">Contact me</a> for questions.</p>

<p>Ежедневное обновление запускается в 13:00 по Москве и выполняется около 18 часов. Багрепорты слать <a href="http://forum.openstreetmap.org/viewtopic.php?pid=121016">сюда</a>.
См. также статистику от <a href="http://gis-lab.info/projects/osm-stats.html">gis-lab.info</a> и <a href="http://peirce.gis-lab.info/stat.php">Zkir</a>.</p>

<table class="sortable"  cellspacing=3 width=100%><tr><td>Name<td>Last update<td>Users<td>Speed<sup>1</sup><td>Quality<sup>2</sup><td>Activity<td>Best place
<?php
$rl=array(
  "az" => "Азербайджан",
  "am" => "Армения",
  "ge" => "Грузия",
  "kz" => "Казахстан",
  "kg" => "Кыргызстан",
  "lv" => "Латвия",
  "lt" => "Литва",
  "md" => "Молдова",
  "tj" => "Таджикистан",
  "tm" => "Туркменистан",
  "uz" => "Узбекистан",
  "ee" => "Эстония",
  "*by" => "Беларусь",
  "*ru" => "Россия",
  #"ua/crimea" => "Крым",
  "*ua" => "Украина",
  "ar" => "Argentina",
  "bo" => "Bolivia",
  "cl" => "Chile",
  "ht" => "Haiti",
  "ie" => "Ireland and Northern Ireland",
  "lu" => "Luxembourg",
  "ni" => "Nicaragua",
  "ph" => "Philippines",
  "pt" => "Portugal",
  "ro" => "Romania",
  "za" => "South Africa and Lesotho",
  #"tn" => "Tunisia (تونس)",
);
foreach($rl as $r=>$n) {
  $byreg = 0;
  if($r[0] == "*") { $r = substr($r, 1); $byreg = 1; }
  if(file_exists("./$r/latest/oneline.inc.html")) {
    $pad="";
    if(preg_match("/\//",$r) && !preg_match("/crimea/",$r)) $pad = "&raquo;&nbsp;";
    if(count(explode("/",$r))-1>1) {
      print("<tr><td>".$pad."&raquo; <a href=./$r/latest/>");
      print file_get_contents("./$r/latest/oneline.inc.html");
      print "\n";
    } else {
      print("<tr><td>".$pad."<a href=./$r/latest/>");
      print file_get_contents("./$r/latest/oneline.inc.html");
      print "\n";
    }
  } else
    print "<tr><td>".(preg_match("/\//",$r)?"&raquo; ":"").$n."</td><td colspan=6>calculation problem</td></tr>";
  if($byreg)
    print "<tr><td><a href=./$r/>$n (регионы)</a></td><td colspan=6>&nbsp;</td></tr>\n";
}
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
