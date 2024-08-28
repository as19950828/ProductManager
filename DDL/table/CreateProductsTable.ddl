CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT '商品ID',
  `name` varchar(20) NOT NULL COMMENT '商品名',
  `description` varchar(200) DEFAULT NULL COMMENT '商品説明',
  `price` int(11) NOT NULL COMMENT '金額',
  `category_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'カテゴリID',
  `maker_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'メーカーID',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '削除日',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;