CREATE TABLE `boat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `boat_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `boat_description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `length_overall` double(10,2) DEFAULT NULL,
  `length_over_waterline` double(10,2) DEFAULT NULL,
  `beam_overall` double(10,2) DEFAULT NULL,
  `draft` double(10,2) DEFAULT NULL,
  `power` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `propulsion` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `speed` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `boat_range` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_file` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `boat_status_id` int(11) DEFAULT NULL,
  `updated_user_id` int(11) DEFAULT NULL,
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `boat_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `boat_id` int(11) DEFAULT NULL,
  `image_file` blob DEFAULT NULL,
  `uploaded_by` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `boat_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_role_id` smallint(6) DEFAULT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
);

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
);