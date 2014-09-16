SET FOREIGN_KEY_CHECKS=0;

TRUNCATE `blog_category`;

INSERT INTO `blog_category` (`id`, `title`, `url_title`, `description`)
VALUES
	(1, 'Vagrant', 'vagrant', 'Vagrant ist eine Software zur Erstellung und Verwaltung von virtuellen Maschinen.'),
	(2, 'PHP', 'php', 'PHP ist eine Skriptsprache, die hauptsächlich zur Erstellung dynamischer Webseiten oder Webanwendungen verwendet wird.'),
	(3, 'Jenkins', 'jenkins', 'Jenkins ist ein erweiterbares, webbasiertes System zur kontinuierlichen Integration.'),
	(4, 'Puppet', 'puppet', '');

SET FOREIGN_KEY_CHECKS=1;