-- MySQL Script generated by MySQL Workbench
-- dom 31 out 2021 21:05:04
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema cb_blog
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `cb_blog` ;

-- -----------------------------------------------------
-- Schema cb_blog
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `cb_blog` ;
USE `cb_blog` ;

-- -----------------------------------------------------
-- Table `cb_blog`.`admin`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cb_blog`.`admin` ;

CREATE TABLE IF NOT EXISTS `cb_blog`.`admin` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(80) NOT NULL,
  `email` VARCHAR(80) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `can_manage_posts` TINYINT NOT NULL,
  `can_manage_users` TINYINT NOT NULL,
  `can_manage_dumps` TINYINT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cb_blog`.`post`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cb_blog`.`post` ;

CREATE TABLE IF NOT EXISTS `cb_blog`.`post` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `admin_id` INT NOT NULL,
  `title` VARCHAR(70) NOT NULL,
  `content` TEXT NOT NULL,
  `image` VARCHAR(255) NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  `edited_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  PRIMARY KEY (`id`),
  INDEX `fk_post_admin_idx` (`admin_id` ASC),
  CONSTRAINT `fk_post_admin`
    FOREIGN KEY (`admin_id`)
    REFERENCES `cb_blog`.`admin` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `cb_blog`.`admin`
-- -----------------------------------------------------
START TRANSACTION;
USE `cb_blog`;
INSERT INTO `cb_blog`.`admin` (`id`, `name`, `email`, `password`, `can_manage_posts`, `can_manage_users`, `can_manage_dumps`) VALUES (1, 'Caio Arrabal', 'caio.arrabal@gmail.com', '$2y$10$bm02.Xxp49Ax7arjqD04heRuL.qYGMrrB2NHBcB38AFsl11Im9kB.', 1, 1, 1);
INSERT INTO `cb_blog`.`admin` (`id`, `name`, `email`, `password`, `can_manage_posts`, `can_manage_users`, `can_manage_dumps`) VALUES (2, 'João Arrabal', 'joao.arrabal@gmail.com', '$2y$10$bm02.Xxp49Ax7arjqD04heRuL.qYGMrrB2NHBcB38AFsl11Im9kB.', 0, 1, 1);

COMMIT;


-- -----------------------------------------------------
-- Data for table `cb_blog`.`post`
-- -----------------------------------------------------
START TRANSACTION;
USE `cb_blog`;
INSERT INTO `cb_blog`.`post` (`id`, `admin_id`, `title`, `content`, `image`, `created_at`, `edited_at`) VALUES (1, 1, 'Vue JS e React JS - Duelo de Titãs', 'Atualmente, os dois Frameworks são muito utilizados para criação de aplicações em larga escala de forma mais simples, através da utilização de componentes.', 'https://www.spaceo.ca/wp-content/uploads/2021/02/vue-vs-react.jpg', '2021-01-01 03:00:00', '2021-03-12 03:00:00');
INSERT INTO `cb_blog`.`post` (`id`, `admin_id`, `title`, `content`, `image`, `created_at`, `edited_at`) VALUES (2, 2, '\"Panetone ou Chocotone, eis a questão\"', 'Quem resiste à essa deliciosa tentação do clima natalino? Acho que ninguém (pelo menos, ninguém com fome). Porém, a dúvida é cruel: sabor \"frutinha\" ou sabor chocolate?', 'https://t1.uc.ltmcdn.com/pt/images/4/2/6/como_fazer_panetone_caseiro_20624_600_square.jpg', '2021-10-27 13:00:00', '2021-10-28 14:00:00');

COMMIT;