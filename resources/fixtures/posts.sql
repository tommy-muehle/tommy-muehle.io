SET FOREIGN_KEY_CHECKS=0;

TRUNCATE `blog_post`;

INSERT INTO `blog_post` (`id`, `title`, `introduction`, `is_published`, `created`, `updated`, `url_title`, `content_file`)
VALUES
	(1, 'Probleme mit dem lokalen Jenkins und Ant', 'Kleine Hilfestellung für Ant-Jobs unter Jenkins.', 1, '2014-09-20 20:00:00', '2014-09-20 20:00:00', 'ant-probleme-bei-macosx-und-jenkins', 'local-jenkins.html.twig');

SET FOREIGN_KEY_CHECKS=1;