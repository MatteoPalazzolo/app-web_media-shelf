## FONTS
https://www.1001fonts.com/heavy-heap-font.html
https://www.fontspace.com/mighty-souly-font-f111821
https://www.fontspace.com/gildeon-font-f109208

## ICONS
[Twinkle icons created by meaicon - Flaticon](https://www.flaticon.com/free-icons/twinkle)
[Image by freepik](https://www.freepik.com/free-vector/flat-sparkling-star-collection_15591227.htm#fromView=keyword&page=1&position=2&uuid=b7a01977-91ce-4b36-98a2-10a11ce26070")
[Card by sundari sugiyono from Noun Project (CC BY 3.0)](https://thenounproject.com/browse/icons/term/card/)

## WEATHER API
https://www.weatherapi.com/pricing.aspx

## WEATHER ICONS
https://www.flaticon.com/free-icons/weather

## DESIGN LINKS
https://developer.mozilla.org/en-US/docs/Web/CSS/clip-path

## GITHUB
https://github.com/mlocati/docker-php-extension-installer

## TODO

#### NOW
- [ ] heavy refactoring to form.php
- [ ] add tag selection to form.php and db
- [ ] add media type selection to form.php
- [ ] ordinare i media nella homepage in categorie diverse in base al tipo

#### PROGRAMMING
- [ ] creare pagina per editare una card

#### HOME LAYOUT
- [ ] separated sections for Film, Anime, Videogames, ...

#### CARD LAYOUT
- [ ] what should display if no rating yet?
- [ ] how to display planning tag (to watch, watching, seen) for it to be CLEAR?
- [ ] little icon for media type (Film, Anime, Videogames, ...), maybe a badge in SVG

## DOCKER
```
docker ps -a

docker volume ls
docker volume inspect <name>
docker volume rm <name>

docker exec -it <id/name> bash
exit

docker compose up --build -d

docker container stop <id/name>
docker compose down

pg_isready -h localhost -p 5432
```

## File JS
- librerie (tipo color-utils.js) -> tranquillamente utilizzabile come modulo 
- codice legato all'html di una pagina, ma pensato per essere importato altrove (tipo form.php o refresh.php) \[modals] -> sarebbe carino avere un modulo js che abbia pieno controllo su una porzione dell'html a cui si debba accedere per triggerarne gli eventi
- codice di una specifica pagina che setta gli event listener -> da lasciare come normale js, capire come referenziare in maniera  consistente gli elementi del dom: id? classi? come sono sicuro che non siano duplicati? convenzione?