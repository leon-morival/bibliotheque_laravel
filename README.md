# Projet Laravel de Gestion de Livres

Ce projet est une application Laravel pour la gestion d'une bibliothèque, permettant aux utilisateurs d'emprunter et de rendre des livres. Les administrateurs ont des droits supplémentaires pour gérer les livres (ajout, modification, suppression).

## Fonctionnalités principales

### 1. **Gestion des livres**

-   **Ajout de nouveaux livres** : Les administrateurs peuvent ajouter de nouveaux livres à la bibliothèque avec les informations suivantes :

    -   Titre du livre
    -   Auteur
    -   Année de publication
    -   Image de couverture (optionnelle)
    -   Disponibilité du livre (Disponible ou Non disponible)

-   **Modification des livres** : Les administrateurs peuvent modifier les informations d'un livre existant, y compris le titre, l'auteur, l'année de publication, l'image de couverture et la disponibilité.

-   **Suppression des livres** : Les administrateurs peuvent supprimer un livre de la bibliothèque.

### 2. **Emprunt de livres**

-   **Emprunter un livre** : Les utilisateurs peuvent emprunter un livre uniquement s'il est disponible. Les livres empruntés sont marqués comme "Non disponible" et ne peuvent pas être empruntés par d'autres utilisateurs jusqu'à ce qu'ils soient retournés.

-   **Retour de livre** : Lorsqu'un utilisateur retourne un livre, celui-ci devient à nouveau disponible pour les autres utilisateurs.

### 3. **Gestion des utilisateurs**

-   **Suppression d'un utilisateur** : Lorsqu'un utilisateur est supprimé du système, tous les livres qu'il avait empruntés sont automatiquement rendus disponibles. La date de retour de ces livres est mise à jour pour refléter leur disponibilité.

### 4. **Interface utilisateur**

-   **Liste des livres** : Les utilisateurs peuvent voir une liste de tous les livres disponibles dans la bibliothèque, avec les informations suivantes :

    -   Titre du livre
    -   Auteur
    -   Année de publication
    -   Disponibilité du livre (Disponible ou Non disponible)
    -   Image de couverture (si disponible)

-   **Détails d'un livre** : Les utilisateurs peuvent consulter les détails d'un livre, y compris son titre, auteur, année de publication et sa disponibilité.

-   **Actions des administrateurs** : Les administrateurs peuvent modifier ou supprimer un livre, ainsi que gérer les utilisateurs et leurs emprunts.

### 5. **Authentification et autorisation**

-   **Rôles d'utilisateur** : Le système gère deux types d'utilisateurs :

    -   **Utilisateur normal** : Peut uniquement emprunter et retourner des livres.
    -   **Administrateur** : Peut ajouter, modifier, supprimer des livres et gérer les utilisateurs.

-   **Protection des routes** : Certaines actions (ajouter, modifier, supprimer des livres) sont réservées aux administrateurs, grâce à une gestion des rôles et de l'autorisation.

### 6. **Gestion des erreurs et des messages de confirmation**

-   **Messages de succès** : Les utilisateurs et administrateurs reçoivent des messages de confirmation après l'ajout, la modification, ou la suppression d'un livre.
-   **Messages d'erreur** : Si une action échoue (par exemple, une tentative de suppression de livre échouée ou l'absence d'un livre dans la bibliothèque), des messages d'erreur appropriés sont affichés.

### 7. **Accessibilité et performance**

-   **Interface responsive** : L'interface est conçue pour être utilisée sur différents appareils (ordinateurs de bureau, tablettes, et smartphones) avec un design responsive.

-   **Performance** : Les opérations sont optimisées pour fonctionner de manière fluide même avec un grand nombre de livres et d'utilisateurs.

## Prérequis

Avant de commencer, assurez-vous que vous avez les éléments suivants installés :

-   [PHP >= 8.1](https://www.php.net/downloads.php)
-   [Composer](https://getcomposer.org/download/)
-   [Node.js et npm](https://nodejs.org/en/download/) (pour le frontend avec Laravel Mix ou Vite)
-   [MySQL](https://www.mysql.com/downloads/) ou une autre base de données compatible avec Laravel

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

    - Modifiez le fichier `.env` pour configurer les informations de la base de données.

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

## À faire

-   **Afficher la date de disponibilité des livres** : Implémenter une fonctionnalité pour afficher la date exacte à laquelle un livre sera disponible.
-   **Notifications et alertes** : Ajouter des notifications pour alerter les utilisateurs lorsque des livres qu'ils souhaitent emprunter deviennent disponibles.
