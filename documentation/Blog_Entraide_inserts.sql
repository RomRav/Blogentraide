-- Blog_Entraide_inserts.sql

USE blogentraide;

SET FOREIGN_KEY_CHECKS=0;

INSERT INTO categories (id_categorie, categorie) VALUES
(1, 'Frameworks'),
(2, 'Langages'),
(3, 'SGBD');


INSERT INTO produits (id_produit, produit, id_categorie) VALUES
(1, 'Angular', 1),
(2, 'jQuery', 1),
(3, 'React', 1),
(4, 'Spring', 1),
(5, 'Symfony', 1),
(8, 'Algo', 2),
(9, 'C', 2),
(10, 'C#', 2),
(11, 'C++', 2),
(12, 'Cypher', 2),
(13, 'DQL', 2),
(14, 'HQL', 2),
(15, 'Java', 2),
(16, 'JavaScript', 2),
(17, 'PHP', 2),
(18, 'Python', 2),
(19, 'SQL', 2),
(20, 'TypeScript', 2),
(21, 'VB .NET', 2),
(23, 'Cassandra', 3),
(24, 'CouchDB', 3),
(25, 'DB2', 3),
(26, 'MongoDB', 3),
(27, 'MySQL', 3),
(28, 'Neo4j', 3),
(29, 'Oracle', 3),
(30, 'PostgreSQL', 3),
(31, 'Redis', 3);


INSERT INTO utilisateurs (id_utilisateur, pseudo, mdp) VALUES
(1, 'a', 'f'),
(2, 'p', 'Mdp123#');

SET FOREIGN_KEY_CHECKS=1;
