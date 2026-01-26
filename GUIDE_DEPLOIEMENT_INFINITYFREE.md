# Guide de Déploiement sur InfinityFree

Votre site Laravel a été adapté pour fonctionner sur l'hébergement gratuit InfinityFree. Voici les étapes pour le mettre en ligne.

## 1. Préparation des Fichiers

Comme InfinityFree ne permet pas l'accès SSH ni l'exécution de commandes comme `composer install`, vous devez préparer les fichiers localement.

1.  Assurez-vous que le dossier `vendor` est présent (il contient toutes les dépendances PHP).
2.  Si vous avez modifié des fichiers CSS/JS, assurez-vous que les fichiers compilés sont dans `public/css` et `public/js`.

## 2. Configuration de la Base de Données

1.  Connectez-vous à votre panneau de contrôle InfinityFree (CPanel).
2.  Allez dans **MySQL Databases**.
3.  Créez une nouvelle base de données (notez le **Database Name**, le **MySQL Hostname**, le **MySQL User Name** et votre mot de passe).
4.  Allez dans **phpMyAdmin** via le CPanel.
5.  Exportez votre base de données locale actuelle (fichier `.sql`) et importez-la dans la base de données InfinityFree.

## 3. Transfert des Fichiers (FTP)

Utilisez un client FTP (comme FileZilla) pour transférer vos fichiers.

1.  Connectez-vous avec vos identifiants FTP (trouvés dans le CPanel InfinityFree).
2.  Ouvrez le dossier `htdocs` sur le serveur distant.
3.  **Important** : Supprimez les fichiers par défaut (`index2.html`, etc.) s'ils existent.
4.  Transférez **tout le contenu** de votre dossier de projet local (y compris `.htaccess`, `app`, `public`, `vendor`, etc.) **DANS** le dossier `htdocs`.
    *   *Note : Ne transférez pas le dossier `node_modules` ni le dossier `.git` pour gagner du temps.*

## 4. Configuration de l'Environnement

1.  Une fois les fichiers transférés, trouvez le fichier `.env` dans `htdocs` sur le serveur.
    *   *Si vous ne voyez pas `.env`, transférez votre `.env.example`, renommez-le en `.env` sur le serveur.*
2.  Modifiez le fichier `.env` (clic droit > Edit/View) avec les informations d'InfinityFree :

```ini
APP_NAME=DriveUp
APP_ENV=production
APP_KEY=base64:VotreCleDeApplicationIci... (copiez celle de votre .env local)
APP_DEBUG=false
APP_URL=http://votre-site.infinityfreeapp.com

DB_CONNECTION=mysql
DB_HOST=sqlXXX.infinityfree.com (Voir MySQL Hostname dans CPanel)
DB_PORT=3306
DB_DATABASE=if0_12345678_votre_db (Voir Database Name)
DB_USERNAME=if0_12345678 (Voir MySQL User Name)
DB_PASSWORD=votre_mot_de_passe_cpanel
```

## 5. Modifications Apportées Automatiquement

J'ai déjà effectué les modifications techniques nécessaires dans votre code :
*   **Fichier `.htaccess` à la racine** : Redirige automatiquement les visiteurs vers le dossier `public/` pour sécuriser votre site.
*   **AppServiceProvider.php** : Ajout de `Schema::defaultStringLength(191)` pour éviter les erreurs de migration sur les bases de données MySQL partagées.

## 6. Vérifications Finales

*   Accédez à votre site via l'URL fournie par InfinityFree.
*   Si vous voyez une page blanche ou une erreur 500, vérifiez que le dossier `storage` et `bootstrap/cache` ont les permissions d'écriture (chmod 755 ou 777).

Bon déploiement !
