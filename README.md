# Green Bank

Projet proposé lors de l'Asynconf 2023 par le partenaire Banque Populaire.

Pour tester le projet en ligne le lien : https://asynconf2023.dowedev.fr

## Contexte proposé

La Green Bank, fondée en 2022, est une institution financière novatrice axée
sur la durabilité et l'impact environnemental positif. Son objectif principal est
de catalyser des investissements et des initiatives qui favorisent la transition
vers une économie verte et durable.
Répondant à la nécessité croissante de mesurer et de comprendre l'impact
environnemental des activités humaines, la Green Bank souhaite lancer un
outil de calcul de l'empreinte écologique.

Cet outil interactif permet aux individus de quantifier leur impact sur
l'environnement en termes de consommation d'énergie, d'émissions de gaz à
effet de serre et d'utilisation des ressources naturelles.

## Prérequis

Composer ^2.5

node ^8.15.0

npm ^v16

PHP ^8.1 

## Installation

1. Dans un premier temps vous pouvez clôner ce dépôt :
``git clone https://github.com/B45T13N/green_bank``
2. Ensuite installer les dépendances nécessaires :
``composer install && npm install``
3. Modifier le fichier .env afin qu'il correspond à votre environnement
4. Lancer les commandes de migrations de base de données : ``php artisan migrate``
5. Lancer la commande de seed : ``php artisan db:seed``
6. Lancer le serveur avec ``npm run dev``
7. Des tests sont implémentés pour la partie back-end `php artisan test`

## Fonctionnement global

### API Rest endpoints

#### Energies

- **URL:** `/api/energies`
- **Méthode:** GET
- **Réponse (200 OK) :**
  ```json
  {
    "data" : [
        {
            "id": 1,
            "name": "Gaz"
        }, {...}
    ]
  }
  ```

#### Kilométrages

- **URL:** `/api/mileages`
- **Méthode:** GET
- **Réponse (200 OK) :**
  ```json
  {
    "data" : [
        {
            "id": 1,
            "wording": "jusqu'à 10 000 km par an"
        }, {...}
    ]
  }
  ```

#### Passagers

- **URL:** `/api/passagers`
- **Méthode:** GET
- **Réponse (200 OK) :**
  ```json
  {
    "data" : [
        {
            "id": 1,
            "wording": "1 passager",
            "bonus": 11
        }, {...}
    ]
  }
  ```

#### Types de véhicule

- **URL:** `/api/vehicleTypes`
- **Méthode:** GET
- **Réponse (200 OK) :**
  ```json
  {
    "data" : [
        {
            "id": 1,
            "category" : "Citadine",
            "weight" : "800-1300kg"
        }, {...}
    ]
  }
  ```

#### Année de conception

- **URL:** `/api/years`
- **Méthode:** GET
- **Réponse (200 OK) :**
  ```json
  {
    "data" : [
        {
            "id": 1,
            "wording": "Avant 1970"
        }, {...}
    ]
  }
  ```

#### Taux d'emprunt

- **URL:** `/api/borrowingRates`
- **Méthode:** GET
- **Réponse :**
  ```json
  {
    "data" : [
        {
            "id": 1,
            "score": 10,
            "rate": 300
        }, {...}
    ]
  }
  ```

#### Envoi des données

- **URL:** `/api/results`
- **Méthode:** POST
- **Requête :**
  ```json
  {
    "vehicleType":"Cabriolet",
    "energy":"Diesel",
    "mileage":"jusqu'à 15 000 km par an",
    "year":"Avant 2000",
    "passenger":"2 passagers",
    "inputAdded" :1
  }
  ```
- **Réponse (302 REDIRECT to /api/fetchResult/{guid})**

#### Récupération des résultats

- **URL:** `/api/fetchResult/{guid}`
- **Méthode:** GET
- **Réponse (200 OK) :**
  ```json
  {
    "bonus": -0.17,
    "finalGrading": 21,
    "finalBorrowingRate": 2.35,
    "borrowingRate": 2.52
  }
  ```
- **Réponse (400 OK) :**
  ```json
  {
    "message": "Non existing result"
  }
  ```

## Remerciements
Merci à l'asynconf ainsi qu'à la Banque Populaire pour ce challenge qui était 
intéressant à implémenter.

Merci également à tous les partenaires pour cette conférence qui 
était une nouvelle fois très intéressante.

<img src="partenaires/polytech.png" width=150>
<img src="partenaires/bp.png" width=150>
<img src="partenaires/axeptio.png" width=150>
<img src="partenaires/infomaniak.png" width=150>
<img src="partenaires/tralalere.png" width=150>
<img src="partenaires/xpilab.png" width=150>
