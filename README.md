# projet_city

Projet de première année de cycle d'ingénierie.

Thème : Promouvoir sa ville à travers son quartier

## Technologies utilisées

- Leaflet : Bibliothèque JavaScript permettant de créer et gérer des cartes
- JQuery : Framwork JavaScript pour faciliter l'écriture de scripts côté client ( permet également le bon fonctionnement de Leaflet )
- PHP7 : Dernière version de php, permettant de créer l'intelligence du site côté serveur
- Bootstrap : Librairie CSS (style du site)
- Bootstrap Notify : Librairie d'extension de bootstrap permettant de transformer les alertes en Toast : 

## Architecture

> MVC : Modèle Vue Contrôleur

> Service PHP **REST**

## Installation API

> Renommer le fichier *"config.js.template"* en *"config.js"* (./Site/config/) puis renseigner la variable **environnement** suivant le besoin

## Installation BDD

> Type de base MariaDB
> SGBD : PhpMyAdmin
>
> Script d'installation : projet_city.sql
> Jeux de donnée : dataDump.sql

La configuration des accès à la base doit être renseigner dans le fichier **configuration.php**