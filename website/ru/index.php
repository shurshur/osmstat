<?php Header("Content-Type: text/html; charset=utf-8"); 

ob_start(); ?>
<html><head>
<style> td {background-color: #fefefe}</style>
<?php //<script src="http://me.komzpa.net/sorttable.js"> </script> ?>
<title>OpenStreetMap.org Country Statistics by Komяpa</title></head><body bgcolor=#cccccc><h2>Статистика по областям России</h2>

<?php
//<p><font color=red><b>Из-за того, что обработка всей России перестала укладываться в ограничения по памяти, подсчёт её заморожен с 27 октября 2010 г.
//</b></font></p>
?>
<p><b>Статистика по России считается нерегулярно</b></p>
<p>Ежедневное обновление запускается в 13:00 по Москве и выполняется около 18 часов. Багрепорты слать <a href="http://forum.openstreetmap.org/viewtopic.php?pid=121016">сюда</a>.
<p>См. также статистику от <a href="http://gis-lab.info/projects/osm-stats.html">gis-lab.info</a> и <a href="http://peirce.gis-lab.info/stat.php">Zkir</a>.</p>
<table class="sortable"  cellspacing=3 width=100%><tr><td>Name<td>Last update<td>Users<td>Speed<sup>1</sup><td>Quality<sup>2</sup><td>Activity<td>Best place
<?php
$rl=array(
  "" => "Россия",
  "altayskiy" => "Алтайский край",
  "amur" => "Амурская область",
  "arkhan" => "Архангельская область",
  "astrakhan" => "Астраханская область",
  "belgorod" => "Белгородская область",
  "bryansk" => "Брянская область",
  "vladimir" => "Владимирская область",
  "volgograd" => "Волгоградская область",
  "vologda" => "Вологодская область",
  "voronezh" => "Воронежская область",
  "evrey" => "Еврейская автономная область",
  "zabaikal" => "Забайкальский край",
  "ivanov" => "Ивановская область",
  "irkutsk" => "Иркутская область",
  "kabardin" => "Кабардино-Балкарская Республика",
  "kalinin" => "Калининградская область",
  "kaluzh" => "Калужская область",
  "kamch" => "Камчатский край",
  "karach" => "Карачаево-Черкесская Республика",
  "kemerovo" => "Кемеровская область",
  "kirov" => "Кировская область",
  "kostrom" => "Костромская область",
  "krasnodar" => "Краснодарский край",
#  "krasnodar/krymsk" => "Крымск",
  "krasnoyarsk" => "Красноярский край",
  "kurgan" => "Курганская область",
  "kursk" => "Курская область",
  "leningrad" => "Ленинградская область",
  "lipetsk" => "Липецкая область",
  "magadan" => "Магаданская область",
  "mosobl" => "Московская область",
  "murmansk" => "Мурманская область",
  "nenec" => "Ненецкий автономный округ",
  "nizhegorod" => "Нижегородская область",
  "novgorod" => "Новгородская область",
  "novosib" => "Новосибирская область",
  "omsk" => "Омская область",
  "orenburg" => "Оренбургская область",
  "orlovsk" => "Орловская область",
  "penz" => "Пензенская область",
  "perm" => "Пермский край",
  "prim" => "Приморский край",
  "pskov" => "Псковская область",
  "adygeya" => "Республика Адыгея",
  "altay" => "Республика Алтай",
  "bashkir" => "Республика Башкортостан",
  "buryat" => "Республика Бурятия",
  "dagestan" => "Республика Дагестан",
  "ingush" => "Республика Ингушетия",
  "kalmyk" => "Республика Калмыкия",
  "karel" => "Республика Карелия",
  "komi" => "Республика Коми",
  "crimea" => "Республика Крым",
  "mariyel" => "Республика Марий Эл",
  "mordov" => "Республика Мордовия",
  "yakut" => "Республика Саха (Якутия)",
  "osetiya" => "Республика Северная Осетия - Алания",
  "tatar" => "Республика Татарстан",
  "tyva" => "Республика Тыва",
  "khakas" => "Республика Хакасия",
  "rostov" => "Ростовская область",
  "ryazan" => "Рязанская область",
  "samar" => "Самарская область",
  "saratov" => "Саратовская область",
  "sakhalin" => "Сахалинская область",
  "sverdl" => "Свердловская область",
  "smol" => "Смоленская область",
  "stavrop" => "Ставропольский край",
  "tambov" => "Тамбовская область",
  "tver" => "Тверская область",
  "tomsk" => "Томская область",
  "tul" => "Тульская область",
  "tumen" => "Тюменская область",
  "udmurt" => "Удмуртская Республика",
  "ulyan" => "Ульяновская область",
  "khabar" => "Хабаровский край",
  "khanty" => "Ханты-Мансийский автономный округ",
  "chel" => "Челябинская область",
  "chechen" => "Чеченская Республика",
  "chuvash" => "Чувашская Республика",
  "chukot" => "Чукотский автономный округ",
  "yamal" => "Ямало-Ненецкий автономный округ",
  "yarosl" => "Ярославская область",
);
foreach($rl as $r=>$n)
  if(file_exists("./$r/latest/oneline.inc.html"))
    if(count(explode("/",$r))-1>0) {
      #print("<tr><td>".($r?"&raquo;&raquo; ":"")."<a href=./$r/latest/>".file_get_contents("./$r/latest/oneline.inc.html"));
      print("<tr><td>".($r?"&raquo;&raquo; ":"")."<a href=./$r/latest/>");
      include("./$r/latest/oneline.inc.html");
    } else
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
