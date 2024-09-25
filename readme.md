Application Monster Hunter World.
- Cette Application permet de consulter les informations des armes du jeu Monster Hunter World.
- Ces informations sont récupérées de l'api https://mhw-db.com/weapons.
- Il y a un moyen de connexion et de session permettant aux utilisateurs d'avoir une liste de favoris.
- Sur la page d'accueil il y a une liste d'arme avec pour chacune un bouton pour l'ajouter aux favoris.
- Une fois cliqué les informations de l'armes récupérées de l'api sont enregistrées en base de données locale.
- Sur la page de favoris il y a une liste des armes ajoutées aux favoris avec un bouton pour les retirer.
- Une fois cliqué les informations de l'armes sont supprimées de la base de données locale.
- Il y a un bouton pour se déconnecter.
- Les informations de connexion sont stockées en session.
- Les informations de connexion sont vérifiées en base de données.
- Le mot de passe est hashé en base de données.

- Pour communiquer avec la base de données j'utilise PDO.

Les dossiers sont organisés de la manière suivante:
Le dossier \Back contient tous les fichiers php permettant de communiquer à la base de données.
C'est à dire :
* env.php : contient les variables d'environnement permettant la connexion à la base de données.
* server.php : contient la connexion à la base de données.
* signup_process.php : contient le code permettant d'enregistrer un utilisateur en base de données.
* login_process.php : contient le code permettant de vérifier les informations de connexion en base de données.
* addToFav.php : contient la logique permettant d'ajouter une arme aux favoris.
* del_fav.php : contient la logique permettant de supprimer une arme des favoris.
* getFav.php : contient la logique permettant de récupérer les armes des favoris.
