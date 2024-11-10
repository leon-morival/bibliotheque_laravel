# Projet Laravel de Gestion de Livres

Ce projet est une application Laravel pour la gestion d'une bibliothèque, permettant aux utilisateurs d'emprunter et de rendre des livres. Les administrateurs ont des droits supplémentaires pour ajouter de nouveaux livres.

## Prérequis

Avant de commencer, assurez-vous que vous avez les éléments suivants installés :

-   [PHP >= 8.1](https://www.php.net/downloads.php)
-   [Composer](https://getcomposer.org/download/)
-   [Node.js et npm](https://nodejs.org/en/download/) (pour le frontend avec Laravel Mix ou Vite)
-   [MySQL](https://www.mysql.com/downloads/) ou autre base de données compatible avec Laravel

## Installation

1. **Clonez le dépôt :**

    ssh

    ```bash
    git clone git@github.com:leon-morival/bibliotheque_laravel.git
    ```

    http

    ```bash
    git clone https://github.com/leon-morival/bibliotheque_laravel.git
    cd repo-name
    ```

2. **Installez les dépendances PHP :**

    ```bash
    composer install
    ```

3. **Installez les dépendances npm :**

    ```bash
    npm install
    ```

4. **Configurez l'environnement :**

    - Copiez le fichier `.env.example` en `.env` :

        ```bash
        cp .env.example .env
        ```

    - Modifiez le fichier `.env` pour configurer les informations de la base de données

5. **Générez la clé de l'application :**

    ```bash
    php artisan key:generate
    ```

6. **Exécutez les migrations :**

    ```bash
    php artisan migrate
    ```

## Démarrage du projet

1. **Lancez le serveur de développement :**

    ```bash
    php artisan serve
    ```

2. **Compilez les assets front-end :**

    ```bash
    npm run dev
    ```

## Utilisation

-   **Utilisateur normal** : Un utilisateur inscrit peut emprunter et rendre des livres.
-   **Administrateur** : L'administrateur peut ajouter, modifier et supprimer des livres.
