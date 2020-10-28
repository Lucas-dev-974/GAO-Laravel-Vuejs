# Projet GAO-Laravel-Vuejs
Ce projet est un développement effectué dans le cadre d'une formation *Simplon.co*.

Il est mis à disposition dans une démarche éducative il n'a pas vocation à entrer en production.

# Pré requis

Créer le fichier `.env` depuis `.env.exemple`

## LAMP
* Avoir `npm` installé
* Avoir un environnement de type LAMP fonctionnel
* Création de votre base de donnée
* Modifier votre fichier `.env` pour l'accès à votre BD

## Docker
Le container node n'est pas fonctionnel pour le moment (commenté)
* Avoir `npm` installé
* Avoir `Docker` et `Docker-compose` d'installé 

# Paramétrage
# Installation

## LAMP
```
npm install
composer install
php artisan migrate:fresh --seed
```
## Docker
```
npm install
docker-compose build
docker-compose up
docker-compose exec app composer install
docker-compose exec app php artisan migrate:fresh --seed
```
Le site internet s'exécute sur l'adresse `gao.localhost`

**Erreur possible :** si vous avez un apache ou un autre service s'exécutant sur le port 80 veuiller le stoper

