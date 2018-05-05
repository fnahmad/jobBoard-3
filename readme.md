# Job board

A website to quickly find freelance offers between Heticien.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

## Prerequisites

What things you need to install the software and how to install them

#### Without Docker

```
- PHP
- Node.js
```

#### With Docker

```
- Docker
- docker-compose
```



## Installing

How to get the project working

#### Without Docker

```
git clone https://github.com/etifontaine/jobBoard.git
cd jobBoard
composer install
yarn
cp .env.example .env
php artisan key:generate
```

#### With Docker

```
git clone https://github.com/etifontaine/jobBoard.git
cd jobBoard
cd laradock/
docker-compose up -d
docker-compose exec workspace bash
composer install
yarn
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
```

### Compte de test
```
Email : jobboard@example.com
Password : jobBoardHetic
```

## Authors

* **Alexis BENOLIEL** - *Front-end developer* - [Portfolio](https://www.alexisbenoliel.fr/)
* **Antonin CARLIN** - *Front-end developer* - [Portfolio](http://www.antonincarlin.com/)
* **Etienne FONTAINE** - *Back-end developer, DevOps,Product Owner* - [Portfolio](https://etiennefontaine.fr/)
* **BAPTISTE VILLAIN** - *Front-end developer* - [Github](https://github.com/BaptisteVillain)