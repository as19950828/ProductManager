CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT 'カテゴリID',
  `name` varchar(10) NOT NULL COMMENT 'カテゴリ名',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;