CREATE TABLE IF NOT EXISTS `hashtags` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tag` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_trend_time` int(255) NOT NULL,
  `trend_use_num` int(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `hash` (`hash`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

ALTER TABLE `accounts` ADD `email_verification_key` VARCHAR(255) NOT NULL AFTER `email`, ADD `email_verified` INT(1) NOT NULL DEFAULT '0' AFTER `email_verification_key`, ADD `language` VARCHAR(255) NOT NULL AFTER `email_verified`;

ALTER TABLE `configurations` ADD `chat` INT(1) NOT NULL DEFAULT '0' AFTER `censored_words`, ADD `email` VARCHAR(255) NOT NULL DEFAULT 'no-reply@website.com' AFTER `chat`, ADD `email_verification` INT(1) NOT NULL DEFAULT '0' AFTER `email`;

ALTER TABLE `posts` ADD `link_title` VARCHAR(255) NOT NULL AFTER `hidden`, ADD `link_url` VARCHAR(255) NOT NULL AFTER `link_title`;
