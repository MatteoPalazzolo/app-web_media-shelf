## DESCRIZIONE

Progetto svolto nell'arco del mese di Settembre del 2024.
Ho utilizzato Web Vanilla + JQuery, PHP, PostgreSQL e Docker.
Durante lo sviluppo il sito permetteva di caricare nuovi media sul db compilando il form sulle carte che cadono dall'alto, ma poco prima di abbandonare il progetto ho modificato quel codice e adesso non è utilizzabile.
Ho cercato di fare il tutto con meno sovrastrutture possibili, rimandendo su HTML, CSS e PHP, aiutandomi con JQuery per interfacciarmi più agevolmente al DOM da JS.
L'interfaccia grafica è ispirata a quella di Persona 4.
Una volta caricata l'immagine, un sistema seleziona i 3 colori più presenti e li usa per creare dinamicamente una palette, che verrà poi utilizzata per colorare la carta.
Era anche possibile impostare la palette di una carta come globale, applicando lo stile su tutto il documento (attivabile solo da codice tramite console perchè non completamente implementato).

Con questo progetto ho provato a stravolgere un po' di concetti di design per vedere quanto fosse complesso coniugare usabilità e creatività, ma ho presto scoperto che c'è un motivo se i form non sono implementati con carte volanti che si aprono a ventaglio :)


## PREVIEW

<img width="1920" height="910" alt="cover" src="https://github.com/user-attachments/assets/aa7cdf80-3968-42e5-a5d0-ba2cca332369" />

https://github.com/user-attachments/assets/3c882e32-7537-4dc0-9bcd-4d9f994414c2


## TODO

#### NOW
- [ ] add media type selection to form.php
- [ ] sezioni separate nella home per Film, Anime, Videogames, ...
- [ ] color api: set global palette and find higher contrast color
- [ ] fetch api: get passing url params to the server

#### ENHANCEMENT
- [ ] migrare a curl su php per scaricare immagini
- [ ] little icon for media type (Film, Anime, Videogames, ...), maybe a badge in SVG

## CMD
#### RUN
```shell
docker compose up --build -d
```
visitare http://localhost:80/?num=100&str=3

i parametri num e str permettono di influenzare la generazione procedurale delle stelle nello sfondo
- num: quante stelle per layer (ci sono 3 layer)
- str: quanto forte le vuoi raggruppate verso l'alto

#### DOCKER
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

#### GIT
```shell
git branch
git checkout <branch-name>
git merge <branch-name>

# creates and checks out to the new branch
git checkout -b <branch-name>
```

## ASSETS
#### FONTS
- https://www.1001fonts.com/heavy-heap-font.html
- https://www.fontspace.com/mighty-souly-font-f111821
- https://www.fontspace.com/gildeon-font-f109208
- https://www.1001fonts.com/octin-spraypaint-free-font.html
- https://www.1001fonts.com/ringbearer-font.html
- https://www.fontspace.com/airborne-86-stencil-font-f46490

#### ICONS
[Twinkle icons created by meaicon - Flaticon](https://www.flaticon.com/free-icons/twinkle)
[Image by freepik](https://www.freepik.com/free-vector/flat-sparkling-star-collection_15591227.htm#fromView=keyword&page=1&position=2&uuid=b7a01977-91ce-4b36-98a2-10a11ce26070")
[Card by sundari sugiyono from Noun Project (CC BY 3.0)](https://thenounproject.com/browse/icons/term/card/)

#### MEDIA TYPE ICONS
- https://thenounproject.com/icon/film-7210841/
- https://thenounproject.com/icon/tv-7210847/
- https://thenounproject.com/icon/controller-7178840/
- https://thenounproject.com/icon/book-7217516/
- https://thenounproject.com/icon/comic-book-4780020/
- https://thenounproject.com/icon/madara-6834529/

#### BEAR BACKGROUND
- https://www.freepik.com/free-vector/hand-drawn-bear-outline-illustration_27596234.htm
- https://www.svgrepo.com/vectors/teddy-bear/
- https://iconscout.com/illustration/brown-bear-couple-11884961
- https://www.freepik.com/free-vector/cute-bear-holding-love-heart-cartoon-vector-icon-illustration-animal-nature-icon-concept-isolated_33633063.htm
- https://pixabay.com/vectors/polar-bear-baby-animal-cute-kawaii-6387496/

#### WEATHER API
https://www.weatherapi.com/pricing.aspx

#### WEATHER ICONS
https://www.flaticon.com/free-icons/weather

## INSPIRATION
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
