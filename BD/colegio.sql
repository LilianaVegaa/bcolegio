-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for colegio
CREATE DATABASE IF NOT EXISTS `colegio` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `colegio`;

-- Dumping structure for table colegio.administrativos
CREATE TABLE IF NOT EXISTS `administrativos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombres` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ci` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_administrativos_usuarios` (`usuario_id`),
  CONSTRAINT `FK_administrativos_usuarios` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table colegio.administrativos: ~1 rows (approximately)
/*!40000 ALTER TABLE `administrativos` DISABLE KEYS */;
INSERT INTO `administrativos` (`id`, `nombres`, `apellidos`, `telefono`, `direccion`, `ci`, `usuario_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Juan Jose', 'Perez Silva', '77078147', 'El Alto', '8940654', 1, '2024-12-09 15:05:43', '2024-12-12 16:12:27', NULL);
/*!40000 ALTER TABLE `administrativos` ENABLE KEYS */;

-- Dumping structure for table colegio.asistencias
CREATE TABLE IF NOT EXISTS `asistencias` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `estado` enum('P','F','R') COLLATE utf8mb4_unicode_ci NOT NULL,
  `observaciones` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estudiante_curso_id` bigint(20) unsigned NOT NULL,
  `materia_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_asistencias_estudiante_curso` (`estudiante_curso_id`),
  KEY `FK_asistencias_materias` (`materia_id`),
  CONSTRAINT `FK_asistencias_estudiante_curso` FOREIGN KEY (`estudiante_curso_id`) REFERENCES `estudiante_curso` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_asistencias_materias` FOREIGN KEY (`materia_id`) REFERENCES `materias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table colegio.asistencias: ~15 rows (approximately)
/*!40000 ALTER TABLE `asistencias` DISABLE KEYS */;
INSERT INTO `asistencias` (`id`, `fecha`, `estado`, `observaciones`, `estudiante_curso_id`, `materia_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(2, '2024-12-18', 'P', NULL, 42, 1, '2024-12-18 15:25:41', '2024-12-18 15:25:42', NULL),
	(3, '2024-12-16', 'P', NULL, 42, 1, '2024-12-20 14:40:40', '2024-12-20 14:40:40', NULL),
	(4, '2024-12-17', 'P', NULL, 42, 1, '2024-12-20 14:40:40', '2024-12-20 14:40:40', NULL),
	(5, '2024-12-16', 'P', NULL, 45, 1, '2024-12-20 14:41:28', '2024-12-20 14:41:28', NULL),
	(6, '2024-12-17', 'R', NULL, 45, 1, '2024-12-20 14:41:28', '2024-12-20 14:41:28', NULL),
	(7, '2024-12-18', 'F', NULL, 45, 1, '2024-12-20 14:41:28', '2024-12-20 14:41:28', NULL),
	(8, '2024-12-01', 'P', NULL, 46, 6, '2024-12-20 15:00:00', '2024-12-20 15:00:00', NULL),
	(9, '2024-12-02', 'P', NULL, 46, 6, '2024-12-20 15:00:00', '2024-12-20 15:00:00', NULL),
	(10, '2024-12-03', 'F', NULL, 46, 6, '2024-12-20 15:00:00', '2024-12-20 15:00:00', NULL),
	(11, '2024-12-04', 'F', NULL, 46, 6, '2024-12-20 15:00:00', '2024-12-20 15:00:00', NULL),
	(12, '2024-12-05', 'P', NULL, 46, 6, '2024-12-20 15:00:00', '2024-12-20 15:00:00', NULL),
	(13, '2024-12-06', 'R', NULL, 46, 6, '2024-12-20 15:00:00', '2024-12-20 15:00:00', NULL),
	(14, '2024-12-07', 'P', NULL, 46, 6, '2024-12-20 15:00:00', '2024-12-20 15:00:00', NULL),
	(15, '2024-12-01', 'P', NULL, 42, 1, '2024-12-23 19:16:34', '2024-12-23 19:16:34', NULL),
	(16, '2024-12-02', 'R', NULL, 42, 1, '2024-12-23 19:16:34', '2024-12-23 19:16:34', NULL);
/*!40000 ALTER TABLE `asistencias` ENABLE KEYS */;

-- Dumping structure for table colegio.cursos
CREATE TABLE IF NOT EXISTS `cursos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table colegio.cursos: ~18 rows (approximately)
/*!40000 ALTER TABLE `cursos` DISABLE KEYS */;
INSERT INTO `cursos` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, '1A', NULL, '2024-12-09 15:06:14', '2024-12-09 15:06:14', NULL),
	(2, '1B', NULL, '2024-12-09 15:06:20', '2024-12-09 15:06:21', NULL),
	(3, '1C', NULL, '2024-12-09 15:06:26', '2024-12-09 15:06:26', NULL),
	(4, '2A', NULL, '2024-12-09 15:06:30', '2024-12-09 15:06:31', NULL),
	(5, '2B', NULL, '2024-12-09 15:06:36', '2024-12-09 15:06:37', NULL),
	(6, '2C', NULL, '2024-12-09 15:06:41', '2024-12-09 15:06:41', NULL),
	(7, '3A', NULL, '2024-12-09 15:06:46', '2024-12-09 15:06:46', NULL),
	(8, '3B', NULL, '2024-12-09 15:06:50', '2024-12-09 15:06:51', NULL),
	(9, '3C', NULL, '2024-12-09 15:06:55', '2024-12-09 15:06:55', NULL),
	(10, '4A', NULL, '2024-12-09 15:07:25', '2024-12-09 15:07:25', NULL),
	(11, '4B', NULL, '2024-12-09 15:07:32', '2024-12-09 15:07:32', NULL),
	(12, '4C', NULL, '2024-12-09 15:07:36', '2024-12-09 15:07:36', NULL),
	(13, '5A', NULL, '2024-12-09 15:07:42', '2024-12-09 15:07:42', NULL),
	(14, '5B', NULL, '2024-12-09 15:07:46', '2024-12-09 15:07:46', NULL),
	(15, '5C', NULL, '2024-12-09 15:07:51', '2024-12-09 15:07:51', NULL),
	(16, '6A', NULL, '2024-12-09 15:07:56', '2024-12-09 15:07:56', NULL),
	(17, '6B', NULL, '2024-12-09 15:08:01', '2024-12-09 15:08:01', NULL),
	(18, '6C', NULL, '2024-12-09 15:08:05', '2024-12-09 15:08:06', NULL);
/*!40000 ALTER TABLE `cursos` ENABLE KEYS */;

-- Dumping structure for table colegio.curso_materia
CREATE TABLE IF NOT EXISTS `curso_materia` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `curso_id` bigint(20) unsigned NOT NULL,
  `materia_id` bigint(20) unsigned NOT NULL,
  `gestion_id` bigint(20) unsigned NOT NULL,
  `profesor_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_curso_materia_cursos` (`curso_id`),
  KEY `FK_curso_materia_materias` (`materia_id`),
  KEY `FK_curso_materia_gestiones` (`gestion_id`),
  KEY `FK_curso_materia_profesores` (`profesor_id`),
  CONSTRAINT `FK_curso_materia_cursos` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_curso_materia_gestiones` FOREIGN KEY (`gestion_id`) REFERENCES `gestiones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_curso_materia_materias` FOREIGN KEY (`materia_id`) REFERENCES `materias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_curso_materia_profesores` FOREIGN KEY (`profesor_id`) REFERENCES `profesores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table colegio.curso_materia: ~2 rows (approximately)
/*!40000 ALTER TABLE `curso_materia` DISABLE KEYS */;
INSERT INTO `curso_materia` (`id`, `curso_id`, `materia_id`, `gestion_id`, `profesor_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(49, 1, 1, 1, 1, '2024-12-17 19:03:06', '2024-12-17 19:03:06', NULL),
	(50, 2, 6, 1, 2, '2024-12-17 19:04:44', '2024-12-17 19:04:44', NULL);
/*!40000 ALTER TABLE `curso_materia` ENABLE KEYS */;

-- Dumping structure for table colegio.estudiantes
CREATE TABLE IF NOT EXISTS `estudiantes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombres` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ci` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '0',
  `padre_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_estudiantes_padres` (`padre_id`),
  CONSTRAINT `FK_estudiantes_padres` FOREIGN KEY (`padre_id`) REFERENCES `padres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table colegio.estudiantes: ~6 rows (approximately)
/*!40000 ALTER TABLE `estudiantes` DISABLE KEYS */;
INSERT INTO `estudiantes` (`id`, `nombres`, `apellidos`, `ci`, `telefono`, `estado`, `padre_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Julian', 'Martinez', '4560233', '7896320', 1, 1, '2024-12-09 15:25:29', '2024-12-17 19:04:44', NULL),
	(2, 'Anabel', 'Antelo', '3698753', '68952410', 1, 1, '2024-12-16 15:48:09', '2024-12-17 19:04:44', NULL),
	(3, 'Franco', 'Armani', '2548796', '78523102', 1, 1, '2024-12-17 11:26:15', '2024-12-17 18:48:46', NULL),
	(4, 'Xavi', 'Hernandez', '1234569', '74014785', 0, 1, '2024-12-17 11:26:36', '2024-12-17 18:48:46', NULL),
	(5, 'Gabriel', 'Batistuta', '2536945', '65487102', 0, 1, '2024-12-17 14:46:15', '2024-12-17 18:48:46', NULL),
	(6, 'Roman ', 'Riquelme', '2369745', '78963140', 0, 1, '2024-12-17 14:46:32', '2024-12-17 18:48:46', NULL),
	(7, 'Carlos', 'Truco', '5696302', '78410236', 0, 1, '2024-12-17 14:46:58', '2024-12-17 18:48:46', NULL);
/*!40000 ALTER TABLE `estudiantes` ENABLE KEYS */;

-- Dumping structure for table colegio.estudiante_curso
CREATE TABLE IF NOT EXISTS `estudiante_curso` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fecha_registro` date NOT NULL,
  `estudiante_id` bigint(20) unsigned NOT NULL,
  `curso_id` bigint(20) unsigned NOT NULL,
  `gestion_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_estudiante_curso_estudiantes` (`estudiante_id`),
  KEY `FK_estudiante_curso_cursos` (`curso_id`),
  KEY `FK_estudiante_curso_gestiones` (`gestion_id`),
  CONSTRAINT `FK_estudiante_curso_cursos` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_estudiante_curso_estudiantes` FOREIGN KEY (`estudiante_id`) REFERENCES `estudiantes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_estudiante_curso_gestiones` FOREIGN KEY (`gestion_id`) REFERENCES `gestiones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table colegio.estudiante_curso: ~3 rows (approximately)
/*!40000 ALTER TABLE `estudiante_curso` DISABLE KEYS */;
INSERT INTO `estudiante_curso` (`id`, `fecha_registro`, `estudiante_id`, `curso_id`, `gestion_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(42, '2024-12-17', 2, 1, 1, '2024-12-17 19:03:06', '2024-12-17 19:04:44', NULL),
	(45, '2024-12-17', 1, 1, 1, '2024-12-17 19:04:44', '2024-12-17 19:04:44', NULL),
	(46, '2024-12-17', 3, 2, 1, '2024-12-20 10:58:40', '2024-12-20 10:58:41', NULL);
/*!40000 ALTER TABLE `estudiante_curso` ENABLE KEYS */;

-- Dumping structure for table colegio.evaluaciones
CREATE TABLE IF NOT EXISTS `evaluaciones` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `calificacion` int(11) NOT NULL DEFAULT '0',
  `fecha` date DEFAULT NULL,
  `estudiante_curso_id` bigint(20) unsigned NOT NULL,
  `materia_id` bigint(20) unsigned NOT NULL,
  `trimestre_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_evaluaciones_materias` (`materia_id`),
  KEY `FK_evaluaciones_trimestres` (`trimestre_id`),
  KEY `FK_evaluaciones_estudiante_curso` (`estudiante_curso_id`) USING BTREE,
  CONSTRAINT `FK_evaluaciones_estudiante_curso` FOREIGN KEY (`estudiante_curso_id`) REFERENCES `estudiante_curso` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_evaluaciones_materias` FOREIGN KEY (`materia_id`) REFERENCES `materias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_evaluaciones_trimestres` FOREIGN KEY (`trimestre_id`) REFERENCES `trimestres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table colegio.evaluaciones: ~20 rows (approximately)
/*!40000 ALTER TABLE `evaluaciones` DISABLE KEYS */;
INSERT INTO `evaluaciones` (`id`, `nombre`, `calificacion`, `fecha`, `estudiante_curso_id`, `materia_id`, `trimestre_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(4, NULL, 70, NULL, 42, 1, 4, '2024-12-20 23:12:39', '2024-12-20 23:13:25', '2024-12-20 23:13:25'),
	(5, NULL, 33, NULL, 45, 1, 4, '2024-12-20 23:12:39', '2024-12-20 23:13:25', '2024-12-20 23:13:25'),
	(6, NULL, 70, NULL, 42, 1, 4, '2024-12-20 23:13:25', '2024-12-20 23:55:46', '2024-12-20 23:55:46'),
	(7, NULL, 80, NULL, 42, 1, 4, '2024-12-20 23:13:25', '2024-12-20 23:55:46', '2024-12-20 23:55:46'),
	(8, NULL, 51, NULL, 42, 1, 4, '2024-12-20 23:13:25', '2024-12-20 23:55:46', '2024-12-20 23:55:46'),
	(9, NULL, 55, NULL, 45, 1, 4, '2024-12-20 23:13:25', '2024-12-20 23:55:46', '2024-12-20 23:55:46'),
	(10, NULL, 60, NULL, 45, 1, 4, '2024-12-20 23:13:25', '2024-12-20 23:55:46', '2024-12-20 23:55:46'),
	(11, NULL, 65, NULL, 45, 1, 4, '2024-12-20 23:13:25', '2024-12-20 23:55:46', '2024-12-20 23:55:46'),
	(12, NULL, 70, NULL, 42, 1, 4, '2024-12-20 23:55:46', '2024-12-23 19:17:16', '2024-12-23 19:17:16'),
	(13, NULL, 80, NULL, 42, 1, 4, '2024-12-20 23:55:46', '2024-12-23 19:17:16', '2024-12-23 19:17:16'),
	(14, NULL, 51, NULL, 42, 1, 4, '2024-12-20 23:55:46', '2024-12-23 19:17:16', '2024-12-23 19:17:16'),
	(15, NULL, 55, NULL, 45, 1, 4, '2024-12-20 23:55:46', '2024-12-23 19:17:16', '2024-12-23 19:17:16'),
	(16, NULL, 60, NULL, 45, 1, 4, '2024-12-20 23:55:46', '2024-12-23 19:17:16', '2024-12-23 19:17:16'),
	(17, NULL, 65, NULL, 45, 1, 4, '2024-12-20 23:55:46', '2024-12-23 19:17:16', '2024-12-23 19:17:16'),
	(18, NULL, 70, NULL, 42, 1, 4, '2024-12-23 19:17:16', '2024-12-23 19:17:16', NULL),
	(19, NULL, 80, NULL, 42, 1, 4, '2024-12-23 19:17:16', '2024-12-23 19:17:16', NULL),
	(20, NULL, 51, NULL, 42, 1, 4, '2024-12-23 19:17:16', '2024-12-23 19:17:16', NULL),
	(21, NULL, 55, NULL, 45, 1, 4, '2024-12-23 19:17:16', '2024-12-23 19:17:16', NULL),
	(22, NULL, 60, NULL, 45, 1, 4, '2024-12-23 19:17:16', '2024-12-23 19:17:16', NULL),
	(23, NULL, 65, NULL, 45, 1, 4, '2024-12-23 19:17:16', '2024-12-23 19:17:16', NULL);
/*!40000 ALTER TABLE `evaluaciones` ENABLE KEYS */;

-- Dumping structure for table colegio.gestiones
CREATE TABLE IF NOT EXISTS `gestiones` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `año` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `año` (`año`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table colegio.gestiones: ~1 rows (approximately)
/*!40000 ALTER TABLE `gestiones` DISABLE KEYS */;
INSERT INTO `gestiones` (`id`, `año`, `fecha_inicio`, `fecha_fin`, `estado`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, '2024', '2024-03-16', '2024-12-16', 1, '2024-12-16 19:04:11', '2024-12-17 19:04:44', NULL);
/*!40000 ALTER TABLE `gestiones` ENABLE KEYS */;

-- Dumping structure for table colegio.materias
CREATE TABLE IF NOT EXISTS `materias` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table colegio.materias: ~6 rows (approximately)
/*!40000 ALTER TABLE `materias` DISABLE KEYS */;
INSERT INTO `materias` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Lenguaje', NULL, '2024-12-12 17:10:50', '2024-12-12 17:10:50', NULL),
	(2, 'Matemáticas', NULL, '2024-12-12 17:11:28', '2024-12-12 17:11:29', NULL),
	(3, 'Ciencias Sociales', NULL, '2024-12-12 17:11:38', '2024-12-12 17:11:38', NULL),
	(4, 'Ciencias Naturales', NULL, '2024-12-12 17:11:49', '2024-12-12 17:11:49', NULL),
	(5, 'Educación Física', NULL, '2024-12-12 17:11:59', '2024-12-12 17:12:00', NULL),
	(6, 'Inglés', NULL, '2024-12-12 17:12:07', '2024-12-21 15:58:50', NULL);
/*!40000 ALTER TABLE `materias` ENABLE KEYS */;

-- Dumping structure for table colegio.oauth_access_tokens
CREATE TABLE IF NOT EXISTS `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `client_id` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table colegio.oauth_access_tokens: ~16 rows (approximately)
/*!40000 ALTER TABLE `oauth_access_tokens` DISABLE KEYS */;
INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
	('0f4b593f15fd2efa0c0848b5b7cb8978bba9b5039ab4766a6f79e104f9fabe0b614100b1d4f60904', 1, 2, NULL, '[]', 1, '2024-12-11 21:56:12', '2024-12-11 21:56:12', '2025-12-11 21:56:12'),
	('143c916282cb302fcee8f7eb3d50c05f977c963617c6c6e62314a1374149168b12b95c614f6d0894', 1, 2, NULL, '[]', 0, '2024-12-23 20:24:07', '2024-12-23 20:24:07', '2025-12-23 20:24:07'),
	('14c6efca5e8d5ce8e2d786c02580d0ef3bedf42cc4941e39bd43adcd106160c63cc54fcffa9f8e3a', 1, 2, NULL, '[]', 1, '2024-12-11 20:27:07', '2024-12-11 20:27:07', '2025-12-11 20:27:07'),
	('1ad2cae4557e4ef60b22c467e86aea7611926e6cb8fa266d43f45153a76ec75bf5a5472104db168c', 1, 2, NULL, '[]', 0, '2024-12-19 16:37:45', '2024-12-19 16:37:45', '2025-12-19 16:37:45'),
	('2731b9e979d46c5e38da60c6b4bb2410b00900ea24ec3e50a0b2c8527366202a57f2be2c77a0990f', 1, 2, NULL, '[]', 1, '2024-12-11 22:57:44', '2024-12-11 22:57:44', '2025-12-11 22:57:44'),
	('2f71289b0eccda56d64771b4236752c1aa16de0eedd0f3775a9c560c6dad8fcc9e79342d92d5836e', 1, 2, NULL, '[]', 0, '2024-12-19 01:51:21', '2024-12-19 01:51:21', '2025-12-19 01:51:21'),
	('40d1f51bbc92f674333c965c72d0d7e4fa287b3c2f63b36438212a4675d618db07ff4d7bb5b315e9', 1, 2, NULL, '[]', 1, '2024-12-12 05:29:13', '2024-12-12 05:29:13', '2025-12-12 05:29:13'),
	('46c0698847d7658df29631398448f2ec4b493fe3f4825407379f893291259a4c328c8444b07c8932', 1, 2, NULL, '[]', 0, '2024-12-19 16:23:11', '2024-12-19 16:23:11', '2025-12-19 16:23:11'),
	('4923060fe91155bfb215d7b32ed1cedf60311665f7e6e35607f5fe6b24a1b53ded2b615bdfbad9ac', 1, 2, NULL, '[]', 1, '2024-12-12 17:15:02', '2024-12-12 17:15:02', '2025-12-12 17:15:02'),
	('4e7fdd9765004b844abf4747212d7cbbb14ac3c7adbedae2e00a8163313533ef3e3f9e9383fa6507', 1, 2, NULL, '[]', 0, '2024-12-11 19:48:22', '2024-12-11 19:48:22', '2025-12-11 19:48:22'),
	('4f7a436622e3de43156da327a5e33ee556a9792597a87c4fb26e04a16a61e7211aba0abdfe04b7e6', 1, 2, NULL, '[]', 0, '2024-12-19 16:30:47', '2024-12-19 16:30:47', '2025-12-19 16:30:47'),
	('53f1a06aea351c5e249241d28ffa548f2ba69d66133610639bb94831f93c499f9533c73f5f945f0c', 1, 2, NULL, '[]', 1, '2024-12-11 22:29:15', '2024-12-11 22:29:15', '2025-12-11 22:29:15'),
	('6622a3f230d476a635d34c27ce378c00db2798346ea9e87149eb546d0cb02c6f68dcc95f0b98ace6', 1, 2, NULL, '[]', 1, '2024-12-11 21:11:40', '2024-12-11 21:11:40', '2025-12-11 21:11:40'),
	('7f2931c155af4ab3a9d1a271c25eb665dabb8e96e543d715fc68c114011db95daf2027729bf9a254', 1, 2, NULL, '[]', 0, '2024-12-19 16:34:25', '2024-12-19 16:34:25', '2025-12-19 16:34:25'),
	('903358b5a3e5d05835a639982724909372fbdd30f4f2d02cddc0c9bf7a0e5e1680572c3a6e1ef683', 1, 2, NULL, '[]', 0, '2024-12-12 05:36:00', '2024-12-12 05:36:00', '2025-12-12 05:36:00'),
	('b3f89fb854eb800bc565392235f5b77fca412fa8152a3b83dfb072f04a06e2345855ae888e75fd79', 1, 2, NULL, '[]', 1, '2024-12-11 21:53:54', '2024-12-11 21:53:54', '2025-12-11 21:53:54'),
	('c299f60b6ea32512d97943a6f193f9f0d38318f7cb75b2fc6d2d8e29c464fa58b1758678233629ff', 1, 2, NULL, '[]', 1, '2024-12-11 22:06:32', '2024-12-11 22:06:32', '2025-12-11 22:06:32'),
	('ed672a62f649d150620dc3f61712c4d455480397417ba8996413c6c577dcdfec9fec21f0adcca9e5', 1, 2, NULL, '[]', 1, '2024-12-11 22:42:07', '2024-12-11 22:42:07', '2025-12-11 22:42:07'),
	('f2f65c66a9c7089531496772652c01db7b5a068faa8cc8e7a571846764f9da1a818980f6cc90d05c', 1, 2, NULL, '[]', 1, '2024-12-11 19:51:08', '2024-12-11 19:51:08', '2025-12-11 19:51:08');
/*!40000 ALTER TABLE `oauth_access_tokens` ENABLE KEYS */;

-- Dumping structure for table colegio.oauth_auth_codes
CREATE TABLE IF NOT EXISTS `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `client_id` int(10) unsigned NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table colegio.oauth_auth_codes: ~0 rows (approximately)
/*!40000 ALTER TABLE `oauth_auth_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_auth_codes` ENABLE KEYS */;

-- Dumping structure for table colegio.oauth_clients
CREATE TABLE IF NOT EXISTS `oauth_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table colegio.oauth_clients: ~2 rows (approximately)
/*!40000 ALTER TABLE `oauth_clients` DISABLE KEYS */;
INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
	(1, NULL, 'Laravel Personal Access Client', '7kDIrpaKOdgbkG9AeBWIMrDrR8kKvzL8zCMVUI4a', 'http://localhost', 1, 0, 0, '2024-12-11 04:15:10', '2024-12-11 04:15:10'),
	(2, NULL, 'Laravel Password Grant Client', 'OkcqzHgpqtQiXkStSnm5uheZwkqeksYMVqppFtTy', 'http://localhost', 0, 1, 0, '2024-12-11 04:15:10', '2024-12-11 04:15:10');
/*!40000 ALTER TABLE `oauth_clients` ENABLE KEYS */;

-- Dumping structure for table colegio.oauth_personal_access_clients
CREATE TABLE IF NOT EXISTS `oauth_personal_access_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_personal_access_clients_client_id_index` (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table colegio.oauth_personal_access_clients: ~0 rows (approximately)
/*!40000 ALTER TABLE `oauth_personal_access_clients` DISABLE KEYS */;
INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
	(1, 1, '2024-12-11 04:15:10', '2024-12-11 04:15:10');
/*!40000 ALTER TABLE `oauth_personal_access_clients` ENABLE KEYS */;

-- Dumping structure for table colegio.oauth_refresh_tokens
CREATE TABLE IF NOT EXISTS `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table colegio.oauth_refresh_tokens: ~16 rows (approximately)
/*!40000 ALTER TABLE `oauth_refresh_tokens` DISABLE KEYS */;
INSERT INTO `oauth_refresh_tokens` (`id`, `access_token_id`, `revoked`, `expires_at`) VALUES
	('10b400fe8fdedb2dec6ff9f6168a2efc69667d49416d3aa59e217fb0aa6d638bf3484340b91125e1', '4f7a436622e3de43156da327a5e33ee556a9792597a87c4fb26e04a16a61e7211aba0abdfe04b7e6', 0, '2025-12-19 16:30:47'),
	('1ddb8a645d5d64c0c6e2ef4003bd7eeaccbe5692535b34250e41f1bc4ff4a36d9ccd47557284a006', '903358b5a3e5d05835a639982724909372fbdd30f4f2d02cddc0c9bf7a0e5e1680572c3a6e1ef683', 0, '2025-12-12 05:36:00'),
	('1ef32a6e0bea5fa8d9dbbdbffc3736e0c6bb66b993ad42e50084ad3691bc6e8eaf3e785fe58f7ca9', 'c299f60b6ea32512d97943a6f193f9f0d38318f7cb75b2fc6d2d8e29c464fa58b1758678233629ff', 1, '2025-12-11 22:06:32'),
	('28e45d3855894fbb99b732eef6b643881ac3d96b5aa362ba2222e82eb26ff8f5ec3019d9fd127bbf', '53f1a06aea351c5e249241d28ffa548f2ba69d66133610639bb94831f93c499f9533c73f5f945f0c', 1, '2025-12-11 22:29:15'),
	('32b9b82333c0a509fbea916aab76bfed982ecdf8033a4cae4b455f9442e692219f56e95ad7f533ac', '14c6efca5e8d5ce8e2d786c02580d0ef3bedf42cc4941e39bd43adcd106160c63cc54fcffa9f8e3a', 1, '2025-12-11 20:27:08'),
	('3dd72aac7f73d4ec8982f971e2d2a765fecbfb92d16d5e24443cd0fae0809f772d773c48d126344d', '2731b9e979d46c5e38da60c6b4bb2410b00900ea24ec3e50a0b2c8527366202a57f2be2c77a0990f', 1, '2025-12-11 22:57:44'),
	('3df23d8b7467c8752bde4629e71e423e92e619be7ad39b4e5e2e9be7098e6a1d2b0eaa68de8cad0e', '4923060fe91155bfb215d7b32ed1cedf60311665f7e6e35607f5fe6b24a1b53ded2b615bdfbad9ac', 1, '2025-12-12 17:15:02'),
	('71b6095cc651e66905691128a523ca302f2936f1ba3b93ce6125ee7c92e5dd7527210f8c2557dfaf', '143c916282cb302fcee8f7eb3d50c05f977c963617c6c6e62314a1374149168b12b95c614f6d0894', 0, '2025-12-23 20:24:07'),
	('80cc4ad1e3f3b863a301b7d1a46637c293723d7ad3a012436d99262a2abab817e13b1e06d96e9d4a', '1ad2cae4557e4ef60b22c467e86aea7611926e6cb8fa266d43f45153a76ec75bf5a5472104db168c', 0, '2025-12-19 16:37:45'),
	('905a3389b4f9f70cf377e8d4198f744f2bcbe7e74f35a4d483d1a52f3e6085bfc1e96aa562e9041b', '46c0698847d7658df29631398448f2ec4b493fe3f4825407379f893291259a4c328c8444b07c8932', 0, '2025-12-19 16:23:11'),
	('9eff83a87b4902e291351cc07332f0e7e99fb3f7cdf8e82b779d1c7fea8064c629033cbee7e0157a', '2f71289b0eccda56d64771b4236752c1aa16de0eedd0f3775a9c560c6dad8fcc9e79342d92d5836e', 0, '2025-12-19 01:51:21'),
	('b9f41f2e3aed3cc4b0156991f8cd50d3bc2ec57bb448d00911de8e5c3c0dcbb96299d04246307d8c', 'b3f89fb854eb800bc565392235f5b77fca412fa8152a3b83dfb072f04a06e2345855ae888e75fd79', 1, '2025-12-11 21:53:54'),
	('be0c69ea0311ada5f302800c500a94ea7ee2c535dd6b2ed71aa871b064ff6b27a5d52b701b348e28', 'ed672a62f649d150620dc3f61712c4d455480397417ba8996413c6c577dcdfec9fec21f0adcca9e5', 1, '2025-12-11 22:42:07'),
	('caed526a449807ddf8d3a76dc64bf5d7d57e010bf82915a33172ae9193f54d1e125500bf6a8e0f71', '4e7fdd9765004b844abf4747212d7cbbb14ac3c7adbedae2e00a8163313533ef3e3f9e9383fa6507', 0, '2025-12-11 19:48:22'),
	('d012a652024686b60cc3744f22b1cbda994e9f69f470a4c623197c0b6ecbf9b347adc611042aae8c', '7f2931c155af4ab3a9d1a271c25eb665dabb8e96e543d715fc68c114011db95daf2027729bf9a254', 0, '2025-12-19 16:34:25'),
	('d065e38a5d751a2464739ce1c05a945bf6a79138c7ca551989a3cb0c15bbb915961c24b3fc02f2ce', '40d1f51bbc92f674333c965c72d0d7e4fa287b3c2f63b36438212a4675d618db07ff4d7bb5b315e9', 1, '2025-12-12 05:29:13'),
	('d7659b1355a294688b6cedaf333b10999689d897b0b41745749d3ec24aea402ed1e5c294e79ebf80', '6622a3f230d476a635d34c27ce378c00db2798346ea9e87149eb546d0cb02c6f68dcc95f0b98ace6', 1, '2025-12-11 21:11:40'),
	('f726c8104bfbeca53731477be15f93f409798ccc83a2f11c8ee30c86358d03a2291aaefffbc54c5c', 'f2f65c66a9c7089531496772652c01db7b5a068faa8cc8e7a571846764f9da1a818980f6cc90d05c', 1, '2025-12-11 19:51:08'),
	('ff8f8032eb627f2594384ae89335e4891f3b037dd0ab98da9c7d550ccbac99687fd656525f2dae3b', '0f4b593f15fd2efa0c0848b5b7cb8978bba9b5039ab4766a6f79e104f9fabe0b614100b1d4f60904', 1, '2025-12-11 21:56:12');
/*!40000 ALTER TABLE `oauth_refresh_tokens` ENABLE KEYS */;

-- Dumping structure for table colegio.padres
CREATE TABLE IF NOT EXISTS `padres` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombres` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ci` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_padres_usuarios` (`usuario_id`),
  CONSTRAINT `FK_padres_usuarios` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table colegio.padres: ~1 rows (approximately)
/*!40000 ALTER TABLE `padres` DISABLE KEYS */;
INSERT INTO `padres` (`id`, `nombres`, `apellidos`, `telefono`, `direccion`, `ci`, `usuario_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Marco', 'Castro Ramos', '69056123', 'La Paz', '1056230', 3, '2024-12-09 15:19:49', '2024-12-09 15:19:50', NULL);
/*!40000 ALTER TABLE `padres` ENABLE KEYS */;

-- Dumping structure for table colegio.perfiles
CREATE TABLE IF NOT EXISTS `perfiles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table colegio.perfiles: ~2 rows (approximately)
/*!40000 ALTER TABLE `perfiles` DISABLE KEYS */;
INSERT INTO `perfiles` (`id`, `descripcion`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Administrador', '2024-12-09 15:02:46', '2024-12-09 15:02:47', NULL),
	(2, 'Profesor', '2024-12-09 15:12:35', '2024-12-09 15:12:35', NULL),
	(3, 'Padre', '2024-12-09 15:12:41', '2024-12-09 15:12:42', NULL),
	(4, 'Administrativo', '2024-12-12 11:25:10', '2024-12-12 11:25:10', NULL);
/*!40000 ALTER TABLE `perfiles` ENABLE KEYS */;

-- Dumping structure for table colegio.perfil_permiso
CREATE TABLE IF NOT EXISTS `perfil_permiso` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `perfil_id` bigint(20) unsigned NOT NULL,
  `permiso_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_perfil_permiso_perfiles` (`perfil_id`),
  KEY `FK_perfil_permiso_permisos` (`permiso_id`),
  CONSTRAINT `FK_perfil_permiso_perfiles` FOREIGN KEY (`perfil_id`) REFERENCES `perfiles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_perfil_permiso_permisos` FOREIGN KEY (`permiso_id`) REFERENCES `permisos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table colegio.perfil_permiso: ~13 rows (approximately)
/*!40000 ALTER TABLE `perfil_permiso` DISABLE KEYS */;
INSERT INTO `perfil_permiso` (`id`, `perfil_id`, `permiso_id`) VALUES
	(1, 1, 1),
	(2, 2, 38),
	(3, 2, 39),
	(4, 2, 40),
	(5, 2, 41),
	(6, 2, 42),
	(7, 2, 43),
	(8, 2, 44),
	(9, 2, 45),
	(10, 3, 54),
	(11, 4, 34),
	(12, 4, 38),
	(13, 4, 42);
/*!40000 ALTER TABLE `perfil_permiso` ENABLE KEYS */;

-- Dumping structure for table colegio.permisos
CREATE TABLE IF NOT EXISTS `permisos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `metodo` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modulo` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orden` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table colegio.permisos: ~48 rows (approximately)
/*!40000 ALTER TABLE `permisos` DISABLE KEYS */;
INSERT INTO `permisos` (`id`, `nombre`, `metodo`, `modulo`, `orden`) VALUES
	(1, 'Acesso total al sistema', '*', 'Sistema', 1),
	(2, 'Ver Lista', 'gestiones.index', 'Gestiones', 2),
	(3, 'Registrar', 'gestiones.create', 'Gestiones', 3),
	(4, 'Modificar', 'gestiones.update', 'Gestiones', 4),
	(5, 'Eliminar', 'gestiones.delete', 'Gestiones', 5),
	(6, 'Ver Lista', 'cursos.index', 'Cursos', 6),
	(7, 'Registrar', 'cursos.create', 'Cursos', 7),
	(8, 'Modificar', 'cursos.update', 'Cursos', 8),
	(9, 'Eliminar', 'cursos.delete', 'Cursos', 9),
	(10, 'Ver Lista', 'materias.index', 'Materias', 10),
	(11, 'Registrar', 'materias.create', 'Materias', 11),
	(12, 'Modificar', 'materias.update', 'Materias', 12),
	(13, 'Eliminar', 'materias.delete', 'Materias', 13),
	(14, 'Ver Lista', 'administrativos.index', 'Administrativos', 14),
	(15, 'Registrar', 'administrativos.create', 'Administrativos', 15),
	(16, 'Modificar', 'administrativos.update', 'Administrativos', 16),
	(17, 'Eliminar', 'administrativos.delete', 'Administrativos', 17),
	(18, 'Ver Lista', 'estudiantes.index', 'Estudiantes', 18),
	(19, 'Registrar', 'estudiantes.create', 'Estudiantes', 19),
	(20, 'Modificar', 'estudiantes.update', 'Estudiantes', 20),
	(21, 'Eliminar', 'estudiantes.delete', 'Estudiantes', 21),
	(22, 'Ver Lista', 'padres.index', 'Padres', 22),
	(23, 'Registrar', 'padres.create', 'Padres', 23),
	(24, 'Modificar', 'padres.update', 'Padres', 24),
	(25, 'Eliminar', 'padres.delete', 'Padres', 25),
	(26, 'Ver Lista', 'profesores.index', 'Profesores', 26),
	(27, 'Registrar', 'profesores.create', 'Profesores', 27),
	(28, 'Modificar', 'profesores.update', 'Profesores', 28),
	(29, 'Eliminar', 'profesores.delete', 'Profesores', 29),
	(30, 'Ver Lista', 'trimestres.index', 'Trimestres', 30),
	(31, 'Registrar', 'trimestres.create', 'Trimestres', 31),
	(32, 'Modificar', 'trimestres.update', 'Trimestres', 32),
	(33, 'Eliminar', 'trimestres.delete', 'Trimestres', 33),
	(34, 'Ver Lista', 'asignaciones.index', 'Asignaciones', 34),
	(35, 'Registrar', 'asignaciones.create', 'Asignaciones', 35),
	(36, 'Modificar', 'asignaciones.update', 'Asignaciones', 36),
	(37, 'Eliminar', 'asignaciones.delete', 'Asignaciones', 37),
	(38, 'Ver Lista', 'asistencias.index', 'Asistencias', 38),
	(39, 'Registrar', 'asistencias.create', 'Asistencias', 39),
	(40, 'Modificar', 'asistencias.update', 'Asistencias', 40),
	(41, 'Eliminar', 'asistencias.delete', 'Asistencias', 41),
	(42, 'Ver Lista', 'evaluaciones.index', 'Evaluaciones', 42),
	(43, 'Registrar', 'evaluaciones.create', 'Evaluaciones', 43),
	(44, 'Modificar', 'evaluaciones.update', 'Evaluaciones', 44),
	(45, 'Eliminar', 'evaluaciones.delete', 'Evaluaciones', 45),
	(46, 'Ver Lista', 'perfiles.index', 'Perfiles', 46),
	(47, 'Registrar', 'perfiles.create', 'Perfiles', 47),
	(48, 'Modificar', 'perfiles.update', 'Perfiles', 48),
	(49, 'Elimar', 'perfiles.delete', 'Perfiles', 49),
	(50, 'Ver Lista', 'usuarios.index', 'Usuarios', 50),
	(51, 'Registrar', 'usuarios.create', 'Usuarios', 51),
	(52, 'Modificar', 'usuarios.update', 'Usuarios', 52),
	(53, 'Eliminar', 'usuarios.delete', 'Usuarios', 53),
	(54, 'Ver', 'chatbot.index', 'ChatBot', 54);
/*!40000 ALTER TABLE `permisos` ENABLE KEYS */;

-- Dumping structure for table colegio.profesores
CREATE TABLE IF NOT EXISTS `profesores` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombres` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ci` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_profesores_usuarios` (`usuario_id`),
  FULLTEXT KEY `nombres` (`nombres`),
  FULLTEXT KEY `apellidos` (`apellidos`),
  FULLTEXT KEY `ci` (`ci`),
  CONSTRAINT `FK_profesores_usuarios` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table colegio.profesores: ~1 rows (approximately)
/*!40000 ALTER TABLE `profesores` DISABLE KEYS */;
INSERT INTO `profesores` (`id`, `nombres`, `apellidos`, `telefono`, `direccion`, `ci`, `usuario_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Fernando', 'Cruz Banegas', '68774551', 'La Guardia', '7045620', 2, '2024-12-09 15:19:02', '2024-12-12 16:12:09', NULL),
	(2, 'Raul', 'Guzman', '69632310', 'Plan 3000', '5689741', 6, '2024-12-16 19:50:13', '2024-12-16 19:50:13', NULL);
/*!40000 ALTER TABLE `profesores` ENABLE KEYS */;

-- Dumping structure for table colegio.trimestres
CREATE TABLE IF NOT EXISTS `trimestres` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pruebas` int(11) NOT NULL,
  `gestion_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_trimestres_gestiones` (`gestion_id`),
  FULLTEXT KEY `nombre` (`nombre`),
  CONSTRAINT `FK_trimestres_gestiones` FOREIGN KEY (`gestion_id`) REFERENCES `gestiones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table colegio.trimestres: ~2 rows (approximately)
/*!40000 ALTER TABLE `trimestres` DISABLE KEYS */;
INSERT INTO `trimestres` (`id`, `nombre`, `pruebas`, `gestion_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(4, 'primer trimetre', 3, 1, '2024-12-20 11:20:47', '2024-12-20 11:20:48', NULL),
	(5, 'segundo trimestre', 3, 1, '2024-12-20 16:29:42', '2024-12-20 16:29:42', NULL);
/*!40000 ALTER TABLE `trimestres` ENABLE KEYS */;

-- Dumping structure for table colegio.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contraseña` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `perfil_id` bigint(20) unsigned NOT NULL,
  `tipo_usuario` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_usuarios_perfiles` (`perfil_id`),
  CONSTRAINT `FK_usuarios_perfiles` FOREIGN KEY (`perfil_id`) REFERENCES `perfiles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table colegio.usuarios: ~5 rows (approximately)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `nombre`, `contraseña`, `correo`, `perfil_id`, `tipo_usuario`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, '8940654', '$2y$10$1lq/AFAaGZjPGLpQ4GqeuefMpgaXYGPERM6SNxvAmm7XaO3J9D0YS', 'nano@gmail.com', 1, 'App\\Administrativo', '2024-12-09 15:04:35', '2024-12-12 05:35:39', NULL),
	(2, '7045620', '$2a$12$mwcerV0XUQutVMELFnUWk.1G/IZwhJXqCUy0wnxYq4kXHoqK5ADxu', NULL, 2, 'App\\Profesor', '2024-12-09 15:17:48', '2024-12-09 15:17:48', NULL),
	(3, '1056230', '$2a$12$mwcerV0XUQutVMELFnUWk.1G/IZwhJXqCUy0wnxYq4kXHoqK5ADxu', NULL, 3, 'App\\Tutor', '2024-12-09 15:18:02', '2024-12-09 15:18:03', NULL),
	(4, '22222222', '$2y$10$qQypefFwe96Rz/438tAha.AWBFagjAH8eq6jjFlXoUpH/povZBcva', NULL, 2, 'App\\Profesor', '2024-12-12 15:28:55', '2024-12-12 15:28:55', NULL),
	(5, '666666', '$2y$10$4JPVV1oLyQuD6yfPlEzX9O5FRwgDLwvoZ28oj9obzODxQqrNG7VUa', NULL, 3, 'App\\Tutor', '2024-12-12 15:38:45', '2024-12-12 15:38:45', NULL),
	(6, '5689741', '$2y$10$ACAZMDjCSryFLmD4jUWfYuwvx.uKr3wdsvUJmbRzhZyiR/8e.LTaO', NULL, 2, 'App\\Profesor', '2024-12-16 19:50:13', '2024-12-16 19:50:13', NULL);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
