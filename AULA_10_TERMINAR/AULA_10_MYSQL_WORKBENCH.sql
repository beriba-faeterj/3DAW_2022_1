

CREATE TABLE `3daw_2022_1_m`.`Usuario` (
	`id` INT NOT NULL AUTO_INCREMENT ,
	`nome` VARCHAR(100) CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL,
	`matricula` VARCHAR(16) CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL,
	`funcao` VARCHAR(100) CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL,
	`senha` VARCHAR(100) CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL,
	PRIMARY KEY (`id`), UNIQUE (`matricula`)
) ENGINE = MyISAM;
	
INSERT INTO `usuario`(`id`, `nome`, `matricula`, `funcao`, `senha`)
VALUES (10,'teste','111','aaa','')

INSERT INTO `usuario`(`nome`, `matricula`, `funcao`, `senha`)
VALUES ('teste auto increment','nao','funciona aaaa ele deixa colocar','')

UPDATE `usuario` SET `funcao`='Presiente' WHERE id = 11
