# 🕶️ Opticien App — Symfony 6

Application de gestion d’un opticien développée en PHP avec Symfony.  
Permet la gestion des lunettes, des catégories, des utilisateurs, et des commandes.

---

## 🚀 Fonctionnalités principales

- 🔐 Authentification sécurisée (connexion, déconnexion)
- 👤 Deux types de rôles : `ROLE_USER` et `ROLE_ADMIN`
- 🕶️ Gestion des lunettes (CRUD)
- 📚 Gestion des catégories (CRUD)
- 📦 Gestion des commandes par les utilisateurs
- ⚙️ Interface d’administration (accès restreint aux admins)
- 📡 API REST accessible pour les entités principales (`Lunette`, `Categorie`)

---

## 🛠️ Installation (en local)

### 1. Cloner le projet

```bash
git clone https://github.com/ton-pseudo/opticien-app.git
cd opticien-app
```

### 2. Installer les dépendances

```bash
composer install
```

### 3. Configurer la base de données

Créer un fichier `.env.local` à partir du `.env` :

```dotenv
DATABASE_URL="sqlite:///%kernel.project_dir%/var/data.db"
```

### 4. Créer la base et exécuter les migrations

```bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```

### 5. Lancer le serveur

```bash
symfony server:start
```

---

## 👥 Utilisation des rôles

- Par défaut, un utilisateur créé via `/register` a le rôle `ROLE_USER`
- Un administrateur doit être promu manuellement :
  - via la base de données
  - ou avec la commande suivante :

```bash
php bin/console security:promote user@example.com ROLE_ADMIN
```

---

## 📡 API REST

Endpoints disponibles :

| Méthode | URL                 | Description                    |
|---------|---------------------|--------------------------------|
| GET     | `/api/lunettes`     | Liste des lunettes             |
| GET     | `/api/categories`   | Liste des catégories           |

---

## 💻 Interface utilisateur

- Navigation dynamique (connexion, rôle, accès)
- Design harmonisé avec Twig
- Affichage des messages de confirmation (flashs)
- Accès conditionnel aux fonctionnalités selon le rôle

---

## ✅ TODO

- [x] Authentification sécurisée
- [x] Gestion des entités
- [x] Interface front minimaliste
- [x] API REST
- [ ] (Optionnel) Auth sur l’API
- [ ] (Optionnel) Filtres/exports pour les commandes

---

## 🤝 Auteur: Yoann Le Chevalier

Projet réalisé dans le cadre du cours de PHP / Symfony.  
✨ Propulsé avec [Symfony](https://symfony.com/) et du RedBull !
