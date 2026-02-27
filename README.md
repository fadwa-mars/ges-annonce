# Ges-Annonce — Application de Gestion des Annonces Immobilières

Application Laravel permettant de gérer des annonces de vente immobilière (CRUD complet) avec upload de photos et dashboard de statistiques.

---

## Prérequis

- PHP >= 8.1
- Composer
- MySQL
- Node.js & NPM

---

## Installation

### 1. Créer le projet
```bash
composer create-project laravel/laravel ges-annonce
cd ges-annonce
```

### 2. Configurer la base de données dans `.env`
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ges-annonce
DB_USERNAME=root
DB_PASSWORD=
```

### 3. Créer les fichiers via Artisan
```bash
php artisan make:migration create_annonce_table
php artisan make:migration add_photo_to_annonce_table
php artisan make:seeder AnnoncesTableSeeder
php artisan make:model Annonce
php artisan make:controller AnnonceController --resource
```

### 4. Exécuter les migrations
```bash
php artisan migrate
```

### 5. Créer le lien Storage
```bash
php artisan storage:link
```

### 6. Exécuter le seeder
```bash
php artisan db:seed --class=AnnoncesTableSeeder
```

### 7. Lancer le serveur
```bash
php artisan serve
```

---

## Structure du projet

```
ges-annonce/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       └── AnnonceController.php
│   └── Models/
│       └── Annonce.php
├── database/
│   ├── migrations/
│   │   ├── create_annonce_table.php
│   │   └── add_photo_to_annonce_table.php
│   └── seeders/
│       └── AnnoncesTableSeeder.php
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── layout.blade.php
│       └── annonce/
│           ├── index.blade.php
│           ├── create.blade.php
│           ├── edit.blade.php
│           ├── show.blade.php
│           ├── form.blade.php
│           └── dashboard.blade.php
├── routes/
│   └── web.php
└── vercel.json
```

---

## Routes disponibles

```bash
# Afficher toutes les routes
php artisan route:list
```

| Method | URI | Name | Description |
|--------|-----|------|-------------|
| GET | /annonces/dashboard | - | Dashboard statistiques |
| GET | /annonce | annonce.index | Liste des annonces |
| GET | /annonce/create | annonce.create | Formulaire création |
| POST | /annonce | annonce.store | Enregistrer annonce |
| GET | /annonce/{id} | annonce.show | Détail annonce |
| GET | /annonce/{id}/edit | annonce.edit | Formulaire modification |
| PUT | /annonce/{id} | annonce.update | Modifier annonce |
| DELETE | /annonce/{id} | annonce.destroy | Supprimer annonce |

---

## Fonctionnalités

### CRUD Annonces
- Lister toutes les annonces
- Créer une nouvelle annonce avec validation
- Afficher le détail d'une annonce
- Modifier une annonce
- Supprimer une annonce avec confirmation

### Upload Photo
- Ajout du champ photo dans la table annonce
- Upload et stockage des images dans `storage/app/public/annonces`
- Affichage de la photo dans index, show et edit
- Suppression automatique de l'ancienne photo lors de la modification
- Suppression automatique de la photo lors de la suppression de l'annonce

### Dashboard Statistiques
- Nombre total d'annonces `count()`
- Valeur totale du catalogue `sum('prix')`
- Prix moyen d'un bien `avg('prix')`
- Superficie totale `sum('superficie')`

---

## Technologies utilisées

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap_5-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)
![Bootstrap Icons](https://img.shields.io/badge/Bootstrap_Icons-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)
![Blade](https://img.shields.io/badge/Blade-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)

---

## Pusher sur GitHub
```bash
git init
git add .
git commit -m "Application gestion annonces immobilières"
git remote add origin https://github.com/votre-username/ges-annonce.git
git branch -M main
git push -u origin main
```


## Auteur

Projet réalisé par @mars-Fadwa