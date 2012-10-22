OSM Statistics script
=====================

Syntax:

	cat file.osm|./parser.py <language> <Country Name> [<modules>]

E.g.:

	bzcat RU.osm.bz2|./parser.py ru "Россия" users,tags
	bzcat RU-KLU.osm.bz2|./parser.py ru "Калужская область"
	wget http://download.geofabrik.de/openstreetmap/south-america/argentina.osm.bz2 -O - -o /dev/null|bunzip2|./parser.py en Argentina

Script parses OSM XML from stdin and creates html files with given region statistics

Available modules:

- users: Show users statistics
- calchome: Calculate point with maximum density of user's edits
- places: Show list of places
- borders: Check administrative boundaries
- warnings: Show warnings
- tags: Tags statistics
- routing: Routing groups
- addr: Belarusian address schema info (deprecated)

Default modules: users,calchome,places,borders,warnings,tags,routing