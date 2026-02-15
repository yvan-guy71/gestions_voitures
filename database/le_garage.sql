-- Schéma minimal pour InfinityFree (MySQL)
-- Importer ce fichier via phpMyAdmin après avoir créé la base
-- Utilise InnoDB et utf8mb4 pour compatibilité Laravel

SET NAMES utf8mb4;
SET time_zone = '+00:00';

CREATE TABLE `vehicules` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `immatriculation` varchar(255) NOT NULL,
  `marque` varchar(255) NOT NULL,
  `modele` varchar(255) NOT NULL,
  `couleur` varchar(255) NOT NULL,
  `annee` int NOT NULL,
  `kilometrage` int NOT NULL,
  `carrosserie` varchar(255) NOT NULL,
  `energie` varchar(255) NOT NULL,
  `boite` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `vehicules_immatriculation_unique` (`immatriculation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `techniciens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `specialite` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `reparations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `vehicule_id` bigint unsigned NOT NULL,
  `technicien_id` bigint unsigned NOT NULL,
  `date` date NOT NULL,
  `duree_main_oeuvre` int NOT NULL,
  `objet_reparation` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reparations_vehicule_id_index` (`vehicule_id`),
  KEY `reparations_technicien_id_index` (`technicien_id`),
  CONSTRAINT `reparations_vehicule_id_foreign` FOREIGN KEY (`vehicule_id`) REFERENCES `vehicules` (`id`) ON DELETE CASCADE,
  CONSTRAINT `reparations_technicien_id_foreign` FOREIGN KEY (`technicien_id`) REFERENCES `techniciens` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

