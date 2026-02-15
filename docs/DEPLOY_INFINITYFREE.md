# Déployer ce projet Laravel sur InfinityFree

Ce guide prépare l’application pour un hébergement simple sur InfinityFree (Apache + PHP + MySQL). Il évite SSH/Composer côté serveur et s’appuie sur une configuration prête à l’emploi.

## 1) Prérequis côté InfinityFree
- Créez un compte et un site (sous-domaine `*.epizy.com` ou domaine custom).
- Dans le panneau, réglez la version PHP sur 8.2.
- Créez une base MySQL et notez :
  - Host: `sqlXXX.epizy.com`
  - Database: `epiz_XXXXXXXX_nom`
  - Username: `epiz_XXXXXXXX`
  - Password: votre mot de passe

## 2) Préparation locale
1. Installez les dépendances PHP (localement) :
   - PHP 8.2+, Composer
2. Dans le projet, exécutez :
   - `composer install`
3. Copiez et adaptez l’environnement pour InfinityFree :
   - Dupliquez `.env.infinityfree.example` vers `.env`
   - Renseignez `APP_URL`, `DB_*` avec les valeurs InfinityFree
   - Gardez `SESSION_DRIVER=file`, `CACHE_STORE=file`, `QUEUE_CONNECTION=sync`
4. Générez la clé applicative et mettez-la dans `.env` :
   - `php artisan key:generate`
5. (Option A recommandé) Import SQL sur le serveur :
   - Ouvrez `database/schema.infinityfree.mysql.sql` et importez-le via phpMyAdmin dans la base MySQL InfinityFree.
   - Cette étape crée les tables `vehicules`, `techniciens`, `reparations`.

> Remarque: InfinityFree ne permet pas d’exécuter `php artisan migrate` en SSH. L’import SQL remplace les migrations.

## 3) Upload des fichiers
1. Via FTP/gestionnaire de fichiers, uploadez TOUT le projet dans le dossier `htdocs/` :
   - Incluez le dossier `vendor/` généré par `composer install`
   - Conservez l’arborescence intacte (notamment `public/`)
2. Vérifiez que ces chemins existent sur le serveur :
   - `htdocs/public/index.php`
   - `htdocs/.htaccess` (redirige vers `public/`)
3. Droits d’écriture : assurez-vous que `storage/` et `bootstrap/cache/` sont accessibles en écriture (755 répertoires, 644 fichiers en général).

## 4) Configuration finale
- Placez votre fichier `.env` (préparé localement) à la racine du projet sur le serveur.
- Assurez-vous que `APP_DEBUG=false` en production.
- Les e-mails sortants SMTP sont bloqués en gratuit chez InfinityFree : `MAIL_MAILER=log` est conservé.

## 5) Vérification
- Ouvrez `https://votre-domaine.epizy.com/`
- Testez les pages principales et les modules CRUD:
  - Véhicules: `/vehicules`
  - Techniciens: `/techniciens`
  - Réparations: `/reparations`

## Notes techniques
- Le fichier racine [.htaccess](../.htaccess) redirige automatiquement le trafic vers [`public/`](../public) (front controller Laravel).
- Les assets sont servis depuis [`public/`](../public) via `asset(...)`. Aucun build Node n’est requis pour ce projet tel quel.
- Le schéma MySQL minimal fourni dans [`database/schema.infinityfree.mysql.sql`](../database/schema.infinityfree.mysql.sql) suit les migrations présentes.

## Dépannage
- Erreur 500 au chargement :
  - Vérifiez que `vendor/` est uploadé et que `APP_KEY` est bien défini.
  - Confirmez la version PHP (8.2).
  - Droits d’écriture sur `storage/` et `bootstrap/cache/`.
- Page blanche ou 404 :
  - Confirmez la présence de `htdocs/.htaccess` et `htdocs/public/.htaccess`.
  - Désactivez `APP_DEBUG` seulement après validation.

