CREATE TABLE `boat_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `boat_id` int(11) DEFAULT NULL,
  `image_file` blob DEFAULT NULL,
  `uploaded_by` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci