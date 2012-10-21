OSM Statistics script

Syntax:

	cat file.osm|./parse.py <language> <Country Name> [<modules>]

E.g.:

	bzcat RU.osm.bz2|./parse.py ru "Россия" users,tags
	bzcat RU-KLU.osm.bz2|./parse.py ru "Калужская область"
	wget http://download.geofabrik.de/openstreetmap/south-america/argentina.osm.bz2 -O - -o /dev/null|bunzip2|./parse.py en Argentina
