ALTER TABLE `media` ADD `descr` TEXT NOT NULL AFTER `album_id`;
ALTER TABLE `posts` ADD `activity_text` TEXT NOT NULL AFTER `active`;
ALTER TABLE `users` ADD `post_privacy` VARCHAR(255) NOT NULL DEFAULT 'everyone' AFTER `message_privacy`;

CREATE TABLE IF NOT EXISTS `announcements` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `admin_id` int(255) NOT NULL DEFAULT '0',
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `time` int(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `announcement_views` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `account_id` int(255) DEFAULT '0',
  `announcement_id` int(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

DROP TABLE `configurations`;