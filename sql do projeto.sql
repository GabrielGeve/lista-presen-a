CREATE TABLE `alunos` (
	`ra` INT NOT NULL AUTO_INCREMENT,
	`cpf_pessoa` varchar(11) NOT NULL,
	`id_turma` INT NOT NULL,
	`id_provas` INT NOT NULL,
	PRIMARY KEY (`ra`)
);

CREATE TABLE `frequencias` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`id_ra` INT NOT NULL,
	`chamada` BOOLEAN NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `pessoas` (
	`id_cpf` BINARY NOT NULL UNIQUE,
	`nome` varchar(50) NOT NULL,
	`senha` varchar(30) NOT NULL
);

CREATE TABLE `professores` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`id_cpf` INT NOT NULL UNIQUE,
	`id_turma` INT NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `provas` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`descricao` varchar(50) NOT NULL,
	`id_turma` INT NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `turmas` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`curso` varchar(30) NOT NULL,
	PRIMARY KEY (`id`)
);

ALTER TABLE `alunos` ADD CONSTRAINT `alunos_fk0` FOREIGN KEY (`id_turma`) REFERENCES `turmas`(`id`);

ALTER TABLE `alunos` ADD CONSTRAINT `alunos_fk1` FOREIGN KEY (`id_provas`) REFERENCES `provas`(`id`);

ALTER TABLE `frequencias` ADD CONSTRAINT `frequencias_fk0` FOREIGN KEY (`id_ra`) REFERENCES `alunos`(`ra`);

ALTER TABLE `pessoas` ADD CONSTRAINT `pessoas_fk0` FOREIGN KEY (`id_cpf`) REFERENCES `alunos`(`cpf_pessoa`);

ALTER TABLE `professores` ADD CONSTRAINT `professores_fk0` FOREIGN KEY (`id_cpf`) REFERENCES `alunos`(`cpf_pessoa`);

ALTER TABLE `professores` ADD CONSTRAINT `professores_fk1` FOREIGN KEY (`id_turma`) REFERENCES `turmas`(`id`);

ALTER TABLE `provas` ADD CONSTRAINT `provas_fk0` FOREIGN KEY (`id_turma`) REFERENCES `turmas`(`id`);







