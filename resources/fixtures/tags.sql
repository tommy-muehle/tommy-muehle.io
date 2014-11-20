SET FOREIGN_KEY_CHECKS=0;

TRUNCATE `blog_tag`;
TRUNCATE `blog_post_to_tag`;

INSERT INTO `blog_tag` (`id`, `name`)
VALUES
	(1, 'VM'),
	(2, 'Mac'),
	(3, 'Ant'),
	(4, 'PHP'),
	(5, 'Library'),
	(6, 'Gist'),
	(7, 'Github'),
	(8, 'Bash'),
	(9, 'Zsh'),
	(10, 'Vagrant');

INSERT INTO `blog_post_to_tag` (`post_id`, `tag_id`)
VALUES
	(1, 2),
	(1, 3),
	(2, 4),
	(2, 6),
	(2, 7),
	(3, 8),
	(3, 9),
	(3, 2),
	(3, 10);

SET FOREIGN_KEY_CHECKS=1;