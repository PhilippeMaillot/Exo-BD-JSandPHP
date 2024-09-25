Voici une mise en forme plus structurée et détaillée pour le fichier `README.md` de ton projet **Monster Hunter World App** :

---

# Monster Hunter World App

Cette application permet aux utilisateurs de consulter les informations des armes du jeu **Monster Hunter World** et de les gérer via une fonctionnalité de favoris. Les données sur les armes sont récupérées à partir de l'API publique [MHW DB](https://mhw-db.com/weapons).

## Fonctionnalités

- **Consultation des armes** : Affiche une liste d'armes sur la page d'accueil avec la possibilité de les ajouter aux favoris.
- **Favoris** :
  - Ajout d'armes à une liste de favoris via un bouton sur la page d'accueil.
  - Suppression d'armes depuis la liste des favoris.
  - Les armes ajoutées sont enregistrées en base de données locale.
- **Gestion des utilisateurs** :
  - Connexion et inscription avec gestion de session.
  - Les utilisateurs peuvent se déconnecter via un bouton de déconnexion.
  - La liste de favoris est personnalisée pour chaque utilisateur connecté.
- **Sécurité** :
  - Les mots de passe sont hashés avant d'être enregistrés en base de données.
  - Les informations de connexion sont vérifiées dans la base de données.
- **Base de données** :
  - Utilisation de PDO pour interagir avec la base de données locale (MySQL).

## Structure des dossiers

L'application est organisée en deux parties principales : **Back** (côté serveur) et **Front** (côté client).

### Dossier `Back`
Contient les fichiers PHP pour la gestion de la base de données et de la logique métier :

- **`env.php`** : Contient les variables d'environnement pour la connexion à la base de données (nom d'utilisateur, mot de passe, hôte, etc.).
- **`server.php`** : Gère la connexion à la base de données.
- **`signup_process.php`** : Gère l'inscription des utilisateurs et l'enregistrement de leurs informations en base de données.
- **`login_process.php`** : Vérifie les informations de connexion des utilisateurs.
- **`addToFav.php`** : Permet d'ajouter une arme à la liste des favoris en enregistrant les informations en base de données.
- **`del_fav.php`** : Permet de supprimer une arme des favoris en la retirant de la base de données.
- **`getFav.php`** : Récupère la liste des armes ajoutées aux favoris pour un utilisateur connecté.

### Dossier `Front`
Contient les fichiers PHP pour la gestion de l'interface utilisateur et la communication avec l'API MHW DB :

- **`index.php`** : Page d'accueil qui affiche la liste des armes récupérées de l'API et permet d'ajouter des armes aux favoris.
- **`fav.php`** : Page des favoris affichant les armes ajoutées aux favoris avec un bouton pour les retirer.
- **`logout.php`** : Gère la déconnexion des utilisateurs.
- **`login.php`** : Page de connexion des utilisateurs.
- **`signup.php`** : Page d'inscription des utilisateurs.

Dans le dossier `Front`, on trouve également deux sous-dossiers :
- **`CSS`** : Contient les fichiers de styles CSS.
- **`Script`** : Contient les fichiers JavaScript.

## Configuration de l'environnement

L'application fonctionne avec **XAMPP**, qui permet de lancer le serveur Apache et MySQL localement. Suivez les étapes ci-dessous pour installer et configurer l'application :

### Prérequis
- [XAMPP](https://www.apachefriends.org/index.html) (Apache + MySQL)
- Navigateur Web
- PHP 7.4 ou supérieur

### Installation

1. **Cloner le projet** :
   Clonez le dépôt dans le répertoire htdocs de XAMPP.

   ```bash
   git clone https://github.com/PhilippeMaillot/Exo-BD-JSandPHP.git
   ```

2. **Configurer la base de données** :
   - Créez une base de données MySQL.
   - Modifiez le fichier `Back/env.php` avec les informations de connexion à la base de données.

3. **Lancer XAMPP** :
   - Démarrez Apache et MySQL depuis le panneau de contrôle XAMPP.
   
4. **Accéder à l'application** :
   - Ouvrez votre navigateur et accédez à `http://localhost/nom_du_projet/Front/index.php`.

### Base de données

La base de données comprend au moins deux tables :

1. **Utilisateurs (`users`)** :
   - `id` : clé primaire
   - `username` : nom d'utilisateur
   - `password` : mot de passe hashé
   - Autres colonnes selon les besoins (e-mail, etc.).

2. **Favoris (`favorites`)** :
   - `id` : clé primaire
   - `user_id` : clé étrangère faisant référence à l'utilisateur.
   - `weapon_id` : ID de l'arme ajoutée en favoris.
   - `weapon_name` : nom de l'arme (récupéré de l'API).
   - Autres colonnes pour stocker des détails de l'arme si nécessaire.

## Utilisation

### Connexion / Inscription

- Les utilisateurs peuvent s'inscrire via la page d'inscription (`signup.php`), puis se connecter avec leurs identifiants sur la page de connexion (`login.php`).
- Une fois connectés, une session est créée pour l'utilisateur, lui permettant de gérer ses favoris.

### Gestion des favoris

- Depuis la page d'accueil (`index.php`), les utilisateurs peuvent ajouter des armes aux favoris en cliquant sur le bouton correspondant à chaque arme.
- La liste des favoris est accessible depuis la page des favoris (`fav.php`), où les utilisateurs peuvent également retirer des armes de leurs favoris.

### Déconnexion

- Les utilisateurs peuvent se déconnecter via le bouton de déconnexion, qui termine leur session.

## Sécurité

- Les mots de passe des utilisateurs sont **hashés** avec `password_hash()` avant d'être stockés en base de données.
- Les sessions sont utilisées pour maintenir l'état de connexion des utilisateurs.

## API utilisée

- Les informations des armes proviennent de l'API **[MHW DB](https://mhw-db.com/weapons)**, qui fournit des données détaillées sur les armes du jeu Monster Hunter World.

## Contributions

Les contributions sont les bienvenues ! N'hésitez pas à ouvrir des issues ou à proposer des pull requests.

---

Cette version est plus claire et suit une organisation standard pour un projet de développement web, avec une attention particulière à la structure des dossiers, aux fonctionnalités, et à la configuration.