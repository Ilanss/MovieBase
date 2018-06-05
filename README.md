# MovieBase
Ce projet de site web à été développé dans le cadre d'un cours de développement PHP/SQL à la HEIG-VD. Le but de ce site est de permettre à de utilisateurs d'insérer des films, de les ajouter à leur liste et d'indiquer si ils ont été visionné. Il possède aussi une gestion de comptes administrateur.

# How to
1. Télécharger la totalité du projet
2. Décompresser l'archive
3. Placer le contenu du dossier à l'endroit voulut sur le serveur (racine ou pas)
4. Importez le fichier `dump.sql` dans votre base de données (celui contient la structure de la base de données ainsi que quelques films et un utilisateur de type administrateur)
5. Ouvrir le fichier `config.php` et le modifier en fonction de votre configuration
  * DB_USER = Utilisateur de la BDD
  * DB_PASS = Mot de passe de la BDD
  * DB_NAME = Nom de la BDD
  * DB_HOST = Adresse de la BDD (probablement localhost)
  * SITE_ROOT = Chemin du site dans le cas ou il n'est pas à la racine
6. Enjoy! Le site est fonctionnel!

# Future change
Le site est en train d'être migré pour utiliser le système de templating Smarty. Il sera publié dans un autre repo (ou éventuellement celui-ci).
