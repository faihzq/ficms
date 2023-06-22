CREATE TABLE `report_damage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `boat_id` int(11) NOT NULL,
  `report_date` date NOT NULL,
  `report_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `requestor_id` int(11) NOT NULL,
  `damage_date` date NOT NULL,
  `status_id` int(11) NOT NULL,
  `boat_location_id` int(11) COLLATE utf8_unicode_ci NOT NULL,
  `sel_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `equipment_serial` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `equipment_location` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `running_hours` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `damage_information` text COLLATE utf8_unicode_ci NOT NULL,
  `support_doc_1` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `support_doc_2` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `support_doc_3` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_officer_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `contact_officer_tel` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `commander_sign` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `commander_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sign_time` datetime DEFAULT NULL,
  `commander_rank` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `commander_position` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contract_no` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_time` datetime NOT NULL,
  `updated_time` datetime NOT NULL,
  `updated_user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
)