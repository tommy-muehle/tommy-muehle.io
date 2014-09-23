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
	(7, 'Github');

INSERT INTO `blog_post_to_tag` (`post_id`, `tag_id`)
VALUES
	(1, 2),
	(1, 3);

SET FOREIGN_KEY_CHECKS=1;