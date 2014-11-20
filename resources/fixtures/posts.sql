SET FOREIGN_KEY_CHECKS=0;

TRUNCATE `blog_post`;

INSERT INTO `blog_post` (`id`, `title`, `introduction`, `is_published`, `created`, `updated`, `url_title`, `content_file`)
VALUES
	(1, 'Probleme mit dem lokalen Jenkins und Ant', 'Kleine Hilfestellung für Ant-Jobs unter Jenkins.', 1, '2014-09-20 20:00:00', '2014-09-20 20:00:00', 'ant-probleme-bei-macosx-und-jenkins', 'local-jenkins.html.twig'),
  (2, 'Composer, PHPCS und Coding-Standards', 'Nutzung von PHPCS über Composer inkl. verschiedener Coding-Standards.', 1, '2014-10-03 12:49:15', '2014-10-03 12:49:15', 'composer-phpcs-und-coding-standards', 'composer-phpcs.html.twig'),
  (3, 'Zeit zum Shell-Wechsel', 'Umstieg unter Mac OS X von der Bash auf Zsh Shell', 1, '2014-11-20 19:30:17', '2014-11-20 19:30:17', 'zeit-zum-shell-wechsel', 'shell-change.html.twig');

SET FOREIGN_KEY_CHECKS=1;