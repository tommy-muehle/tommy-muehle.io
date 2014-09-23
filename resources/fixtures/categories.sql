SET FOREIGN_KEY_CHECKS=0;

TRUNCATE `blog_category`;
TRUNCATE `blog_post_to_category`;

INSERT INTO `blog_category` (`id`, `title`, `url_title`, `description`)
VALUES
	(1, 'Vagrant', 'vagrant', 'Vagrant ist eine Software zur Erstellung und Verwaltung von virtuellen Maschinen.'),
	(2, 'PHP', 'php', 'PHP ist eine Skriptsprache, die hauptsächlich zur Erstellung dynamischer Webseiten oder Webanwendungen verwendet wird.'),
	(3, 'Jenkins', 'jenkins', 'Jenkins ist ein erweiterbares, webbasiertes System zur kontinuierlichen Integration.'),
	(4, 'Puppet', 'puppet', 'Puppet ist ein Werkzeug zur automatisierten Konfiguration von Systemen.'),
	(5, 'Composer', 'composer', 'Composer ist ein Paketmanager für PHP-Applikationen.');

INSERT INTO `blog_post_to_category` (`post_id`, `category_id`)
VALUES
	(1, 3);

SET FOREIGN_KEY_CHECKS=1;