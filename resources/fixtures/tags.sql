SET FOREIGN_KEY_CHECKS=0;

TRUNCATE `blog_tag`;

INSERT INTO `blog_tag` (`id`, `name`)
VALUES
	(1, 'VM'),
	(2, 'Mac'),
	(3, 'Ant'),
	(4, 'PHP'),
	(5, 'Library'),
	(6, 'Gist'),
	(7, 'Github');

SET FOREIGN_KEY_CHECKS=1;