## FONTS
- https://www.1001fonts.com/heavy-heap-font.html
- https://www.fontspace.com/mighty-souly-font-f111821
- https://www.fontspace.com/gildeon-font-f109208
- https://www.1001fonts.com/octin-spraypaint-free-font.html
- https://www.1001fonts.com/ringbearer-font.html
- https://www.fontspace.com/airborne-86-stencil-font-f46490

## ICONS
[Twinkle icons created by meaicon - Flaticon](https://www.flaticon.com/free-icons/twinkle)
[Image by freepik](https://www.freepik.com/free-vector/flat-sparkling-star-collection_15591227.htm#fromView=keyword&page=1&position=2&uuid=b7a01977-91ce-4b36-98a2-10a11ce26070")
[Card by sundari sugiyono from Noun Project (CC BY 3.0)](https://thenounproject.com/browse/icons/term/card/)

## BEAR BACKGROUND
- https://www.freepik.com/free-vector/hand-drawn-bear-outline-illustration_27596234.htm
- https://www.svgrepo.com/vectors/teddy-bear/
- https://iconscout.com/illustration/brown-bear-couple-11884961
- https://www.freepik.com/free-vector/cute-bear-holding-love-heart-cartoon-vector-icon-illustration-animal-nature-icon-concept-isolated_33633063.htm
- https://pixabay.com/vectors/polar-bear-baby-animal-cute-kawaii-6387496/

## WEATHER API
https://www.weatherapi.com/pricing.aspx

## WEATHER ICONS
https://www.flaticon.com/free-icons/weather

## DESIGN LINKS
- https://codepen.io/petegarvin1/pen/bGBGvvK
- https://codepen.io/cobra_winfrey/pen/ZNGQKx
- https://codepen.io/AbubakerSaeed/pen/EJrRvY
- https://codepen.io/jh3y/pen/qBqqKRw
- https://codepen.io/jcoulterdesign/pen/PXygYN
- https://codepen.io/nitishkmrk/pen/jyYEop
- https://codepen.io/fernandopasik/pen/AvELMG
- https://codepen.io/designcouch/pen/abRNObK
- https://codepen.io/svensonWho/pen/yLZzqGL
- https://codepen.io/t_afif/pen/WNzKJgZ

- https://developer.mozilla.org/en-US/docs/Web/CSS/clip-paths
- https://developer.mozilla.org/en-US/docs/Web/CSS/view-timeline
- https://developer.mozilla.org/en-US/docs/Web/CSS/background-clip

## TODO

#### NOW
- [ ] heavy refactoring to form.php
    - [x] prototype of swap-card with card back and central card rotation
    - [ ] front layout for form cards
    - [x] add tag selection to form.php
    - [ ] add media type selection to form.php
    - [ ] link all new fields to db
- [ ] multiple rating path on card based on rating value
- [ ] ordinare i media nella homepage in categorie diverse in base al tipo
- [ ] migrare a curl su php
- [ ] js api
    - [ ] fetch api: get passing url params to the server
    - [ ] color api: set global palette and find higher contrast color

#### PROGRAMMING
- [ ] creare pagina per editare una card

#### HOME LAYOUT
- [ ] separated sections for Film, Anime, Videogames, ...

#### CARD LAYOUT
- [ ] what should display if no rating yet?
- [ ] how to display planning tag (to watch, watching, seen) for it to be CLEAR?
- [ ] little icon for media type (Film, Anime, Videogames, ...), maybe a badge in SVG

## DOCKER
```shell
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

## GIT
```shell
git branch
git checkout <branch-name>
git merge <branch-name>

# creates and checks out to the new branch
git checkout -b <branch-name>
```

## File JS
- librerie (tipo color-utils.js) -> tranquillamente utilizzabile come modulo 
- codice legato all'html di una pagina, ma pensato per essere importato altrove (tipo form.php o refresh.php) \[modals] -> sarebbe carino avere un modulo js che abbia pieno controllo su una porzione dell'html a cui si debba accedere per triggerarne gli eventi
- codice di una specifica pagina che setta gli event listener -> da lasciare come normale js, capire come referenziare in maniera  consistente gli elementi del dom: id? classi? come sono sicuro che non siano duplicati? convenzione?