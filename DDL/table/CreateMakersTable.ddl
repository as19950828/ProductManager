CREATE TABLE `makers` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT 'メーカーID',
  `name` varchar(20) NOT NULL COMMENT 'メーカー名',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;