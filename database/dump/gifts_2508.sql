-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-08-2024 a las 16:25:46
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gifts`
--
CREATE DATABASE IF NOT EXISTS `gifts` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `gifts`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donations`
--

DROP TABLE IF EXISTS `donations`;
CREATE TABLE `donations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) NOT NULL,
  `dateCollection` date NOT NULL,
  `timeCollection` time NOT NULL,
  `numberToys` int(11) NOT NULL,
  `observations` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `donations`
--

INSERT INTO `donations` (`id`, `address`, `dateCollection`, `timeCollection`, `numberToys`, `observations`, `user_id`, `created_at`, `updated_at`) VALUES
(36, 'CR 43 A # 20 C - 55', '2024-08-17', '10:12:00', 20, '20 carros', 39, '2024-08-16 05:49:38', '2024-08-16 05:49:38'),
(37, 'cra4 este #33-44', '2024-08-31', '10:22:00', 20, '10 carros y 5 muñecas', 41, '2024-08-17 08:22:33', '2024-08-17 08:22:33'),
(38, 's', '2024-08-14', '10:44:00', 10, '10 perros', 39, '2024-08-19 17:41:30', '2024-08-19 17:41:30'),
(39, '10', '2024-08-21', '11:15:00', 10, 'perro', 39, '2024-08-19 18:15:11', '2024-08-19 18:15:11'),
(40, 's', '2024-08-31', '11:36:00', 10, '10', 39, '2024-08-20 04:32:47', '2024-08-20 04:32:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gifts`
--

DROP TABLE IF EXISTS `gifts`;
CREATE TABLE `gifts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `urlimage` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `codigobono` varchar(255) NOT NULL,
  `state` int(11) NOT NULL,
  `expirationDate` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `gifts`
--

INSERT INTO `gifts` (`id`, `name`, `description`, `urlimage`, `company`, `codigobono`, `state`, `expirationDate`, `created_at`, `updated_at`) VALUES
(10, 'Morrales de locura', 'Redime este bono y presenta en cualquier tienda TOTTO el código que te llega al correo electrónico y recibirás un descuento del 20% en cualquier morral que compresa', 'http://127.0.0.1:8000/images/1723769185.jpg', '40', 'MorralesTottoloc2024', 2, '2025-10-15', '2024-08-16 05:46:25', '2024-08-19 17:28:16'),
(11, '2x1 en zapatillas', 'Canjea este bono en tu tienda mas cercana y recibe 2x1 en tenis.', 'http://127.0.0.1:8000/images/1723865420.jpg', '42', 'nike2x1', 2, '2024-08-20', '2024-08-17 08:30:20', '2024-08-17 08:31:03'),
(12, 'prueba', 'prueba2', 'http://127.0.0.1:8000/images/1724071413.jpg', '40', 'prueba3', 2, '2024-08-31', '2024-08-19 17:43:33', '2024-08-19 17:44:19'),
(13, 'www', '21212', 'http://127.0.0.1:8000/images/1724073426.jpg', '40', '212', 2, '2024-08-22', '2024-08-19 18:17:06', '2024-08-19 18:24:27'),
(14, 'bono1', 'pruebva', 'http://127.0.0.1:8000/images/1724092426.jpg', '1', 'prueba33', 2, '2024-08-31', '2024-08-19 23:33:47', '2024-08-20 04:15:33'),
(15, 'prueba', 'orueba2', 'http://127.0.0.1:8000/images/1724594808.jpg', '40', '1010mario', 1, '2024-08-31', '2024-08-25 19:06:49', '2024-08-25 19:06:49'),
(16, 'mamam', 'mamamam', 'http://127.0.0.1:8000/images/1724595463.jpg', '1', '23213213', 1, '2024-08-30', '2024-08-25 19:17:43', '2024-08-25 19:17:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gift_users`
--

DROP TABLE IF EXISTS `gift_users`;
CREATE TABLE `gift_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gift_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `state` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `gift_users`
--

INSERT INTO `gift_users` (`id`, `gift_id`, `user_id`, `state`, `created_at`, `updated_at`) VALUES
(10, 11, 41, 1, '2024-08-17 08:31:03', '2024-08-17 08:31:03'),
(11, 10, 39, 1, '2024-08-19 17:28:16', '2024-08-19 17:28:16'),
(12, 12, 39, 1, '2024-08-19 17:44:19', '2024-08-19 17:44:19'),
(13, 13, 39, 1, '2024-08-19 18:24:27', '2024-08-19 18:24:27'),
(14, 14, 39, 1, '2024-08-20 04:15:33', '2024-08-20 04:15:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_04_22_005510_create_donations_table', 1),
(7, '2024_04_24_015400_create_gifts_table', 1),
(8, '2024_04_26_005637_create_state_donations_table', 1),
(9, '2024_04_26_020637_create_gift_users_table', 1),
(10, '2024_04_30_040122_create_user_toys_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `state_donations`
--

DROP TABLE IF EXISTS `state_donations`;
CREATE TABLE `state_donations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `donation_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('en_recogida','en_proceso_administrativo','en_proceso_entrega','entregado') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `state_donations`
--

INSERT INTO `state_donations` (`id`, `user_id`, `donation_id`, `status`, `created_at`, `updated_at`) VALUES
(36, 39, 36, 'en_proceso_administrativo', '2024-08-16 05:49:38', '2024-08-19 18:23:31'),
(37, 41, 37, 'en_proceso_administrativo', '2024-08-17 08:22:33', '2024-08-17 08:28:18'),
(38, 39, 38, 'en_proceso_administrativo', '2024-08-19 17:41:30', '2024-08-19 18:23:37'),
(39, 39, 39, 'en_proceso_administrativo', '2024-08-19 18:15:11', '2024-08-19 18:23:45'),
(40, 39, 40, 'en_recogida', '2024-08-20 04:32:47', '2024-08-20 04:32:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `state` int(11) NOT NULL,
  `rol` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `state`, `rol`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mario', 'hrojas26@uan.edu.co', '2024-05-01 01:49:08', '$2y$12$12Xltvzfm3XB4ImsDaZHZuXikHz835F4kqsNN2O6KTFl9sawUQt0K', 1, 'admin', 'Y5R3fUk0nbU3tJKyU4p7vCUP5A1MpyPaLdlLHDvbgaiGdhvdYSnq2xsBVNlC', '2024-05-01 01:49:08', '2024-05-01 01:49:08'),
(39, 'Natalia pastor', 'natalia_-98@hotmail.es', NULL, '$2y$12$5QQ2F4OJE5Z6O37q8vY76.r7vCMC/0AE4Cyd0hn6RQUYh/94ebi.2', 1, 'persona', 'sPx5lHHMyWOaXIyduDPQfG8R8Ss1pcHrDmd4IacV0dsHVinvKGYtDxdMEWeF', '2024-08-16 05:34:26', '2024-08-16 05:34:26'),
(40, 'TOTTO', 'mariorojas.2013@outlook.com', NULL, '$2y$12$WbGa5U5D67vxFtoAjZRyb.xHg1NdEd75llUYLaaH0fQly4tGjisVu', 1, 'empresa', NULL, '2024-08-16 05:35:36', '2024-08-16 05:42:34'),
(41, 'Nicolas yosa', 'nicolasyosa@gmail.com', NULL, '$2y$12$mLqtZY2Wfpd9BSl3xeuKSOLm1J8Ymt82w4FmmljkJyVS8dld.xP6y', 1, 'persona', NULL, '2024-08-17 08:21:15', '2024-08-17 08:21:15'),
(42, 'Nike', 'nike@nike.com', NULL, '$2y$12$ZuW3t0k/Ao7/t2sb95s10eueTW1L96zKx4hMuklFGRghxiRh55yh6', 1, 'empresa', NULL, '2024-08-17 08:25:14', '2024-08-17 08:27:41'),
(43, 'empresa prueba', 'prueba@totto.com', NULL, '$2y$12$/or033I.mQUjGFP1KV61SOT0GeWGdGL4kuDsYslWE7tnE4ZzdM9oy', 0, 'empresa', NULL, '2024-08-19 23:07:27', '2024-08-19 23:07:27'),
(44, 'empresa prueba', 'prueba2@totto.com', NULL, '$2y$12$frirA2sAsfNGidkqcZj3F.O9GfwOW9TXPS6ebU8r9yJ9Raq7t2N/O', 0, 'empresa', NULL, '2024-08-19 23:08:03', '2024-08-19 23:08:03'),
(45, 'www', 'hrojass26@uan.edu.co', NULL, '$2y$12$QzcxpuNN3VtcJXgHIYRCEOtvxajvUxmS8SUBYA/r2ceXWf1/r49cy', 1, 'persona', NULL, '2024-08-19 23:20:33', '2024-08-19 23:20:33'),
(46, '333', 'hhh@tt.com', NULL, '$2y$12$dulysmovtiJLmAOoDh4ip.ItUkwMewGoqpBVHud3hLh1GVeekqdEq', 1, 'persona', NULL, '2024-08-19 23:21:34', '2024-08-19 23:21:34'),
(47, 'perro', 'perro@uan.edu.co', NULL, '$2y$12$usOKB1PBvgNFsi6n6zkpyOG35COfRYZLGOp158cImVoMRVd6QFR9y', 0, 'empresa', NULL, '2024-08-19 23:22:28', '2024-08-19 23:22:28'),
(48, 'd', 'qw@f.co', NULL, '$2y$12$4kdkhyMC1b9Y9iZ0a2U8D.JMnKSzXfIa69bzCsgm3v4zJfZ9KBhW6', 1, 'persona', NULL, '2024-08-19 23:23:19', '2024-08-19 23:23:19'),
(49, 'mariñooo', 'marino@marin', NULL, '$2y$12$ehyr.s9wS1iRQ3fmnvyZtO3QLRtR5.NOxXMUuO41Oe8RWECx/x1lq', 1, 'persona', NULL, '2024-08-19 23:28:18', '2024-08-19 23:28:18'),
(50, 'mario', 'mario@toto.commm', NULL, '$2y$12$Jskjn6muZfbL8KbRiE7kEeQOQdvcOhIp1Rf2LLGDSTjLa8lTwoc0S', 1, 'persona', NULL, '2024-08-25 19:10:09', '2024-08-25 19:10:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_toys`
--

DROP TABLE IF EXISTS `user_toys`;
CREATE TABLE `user_toys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `received_toys` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `redeemed_toys` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `user_toys`
--

INSERT INTO `user_toys` (`id`, `received_toys`, `redeemed_toys`, `user_id`, `created_at`, `updated_at`) VALUES
(11, 50, 40, 39, '2024-08-16 05:49:38', '2024-08-20 04:32:47'),
(12, 20, 10, 41, '2024-08-17 08:22:33', '2024-08-17 08:31:03');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donations_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `gifts`
--
ALTER TABLE `gifts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `gift_users`
--
ALTER TABLE `gift_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gift_users_gift_id_foreign` (`gift_id`),
  ADD KEY `gift_users_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `state_donations`
--
ALTER TABLE `state_donations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `state_donations_user_id_foreign` (`user_id`),
  ADD KEY `state_donations_donation_id_foreign` (`donation_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `user_toys`
--
ALTER TABLE `user_toys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_toys_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `donations`
--
ALTER TABLE `donations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `gifts`
--
ALTER TABLE `gifts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `gift_users`
--
ALTER TABLE `gift_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `state_donations`
--
ALTER TABLE `state_donations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `user_toys`
--
ALTER TABLE `user_toys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `donations`
--
ALTER TABLE `donations`
  ADD CONSTRAINT `donations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `gift_users`
--
ALTER TABLE `gift_users`
  ADD CONSTRAINT `gift_users_gift_id_foreign` FOREIGN KEY (`gift_id`) REFERENCES `gifts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `gift_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `state_donations`
--
ALTER TABLE `state_donations`
  ADD CONSTRAINT `state_donations_donation_id_foreign` FOREIGN KEY (`donation_id`) REFERENCES `donations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `state_donations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `user_toys`
--
ALTER TABLE `user_toys`
  ADD CONSTRAINT `user_toys_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
