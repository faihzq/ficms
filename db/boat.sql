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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci