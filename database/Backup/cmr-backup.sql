-- MySQL Workbench Synchronization
-- Generated: 2021-02-12 10:18
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: Asus

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

ALTER TABLE `cmr_comercialización`.`reclamos` 
DROP FOREIGN KEY `fk_reclamos_clientes1`,
DROP FOREIGN KEY `fk_reclamos_medios1`,
DROP FOREIGN KEY `fk_reclamos_modulos1`,
DROP FOREIGN KEY `fk_reclamos_personal1`;

ALTER TABLE `cmr_comercialización`.`compras` 
DROP FOREIGN KEY `fk_compras_cotizaciones1`;

ALTER TABLE `cmr_comercialización`.`modulo_comercializacion` 
DROP FOREIGN KEY `fk__comercializacion1`;

ALTER TABLE `cmr_comercialización`.`cotizacion_comercializacion` 
DROP FOREIGN KEY `fk_cotizacion_comercializacion_comercializacion1`,
DROP FOREIGN KEY `fk_cotizacion_comercializacion_cotizaciones1`;

ALTER TABLE `cmr_comercialización`.`actualizaciones` 
DROP FOREIGN KEY `fk_actualizaciones_compras1`;

ALTER TABLE `cmr_comercialización`.`compra_modulos` 
DROP FOREIGN KEY `fk_compra_modulos_compras1`;

ALTER TABLE `cmr_comercialización`.`model_has_roles` 
DROP FOREIGN KEY `fk_model_has_roles_roles1`;

ALTER TABLE `cmr_comercialización`.`model_has_permissions` 
DROP FOREIGN KEY `fk_model_has_permissions_permissions1`;

ALTER TABLE `cmr_comercialización`.`roles_has_permissions` 
DROP FOREIGN KEY `fk_roles_has_permissions_permissions1`;

ALTER TABLE `cmr_comercialización`.`clientes` 
CHANGE COLUMN `tipo_documento` `tipo_documento` CHAR(1) NOT NULL COMMENT '1 = DNI\n2 = RUC' ,
CHANGE COLUMN `tipo_persona` `tipo_persona` CHAR(1) NULL DEFAULT NULL COMMENT '1 = INTERESADO\n2 = CLIENTE' ,
CHANGE COLUMN `estado` `estado` CHAR(1) NOT NULL DEFAULT '0' COMMENT '0 =  activo\n1 = inactivo' ;

CREATE TABLE IF NOT EXISTS `cmr_comercialización`.`comercializacion` (
  `idcomercializacion` INT(11) NOT NULL AUTO_INCREMENT,
  `idclientes` INT(11) NOT NULL,
  `persona_contacto` VARCHAR(150) NULL DEFAULT NULL,
  `actividad` TEXT NULL DEFAULT NULL,
  `idmedios` INT(11) NOT NULL,
  `idusers` INT(11) NOT NULL,
  `detalla_llamada` TEXT NULL DEFAULT NULL,
  `ideventos` INT(11) NOT NULL,
  `fecha_evento` TIMESTAMP NULL DEFAULT NULL,
  `descripcion_evento` TEXT NULL DEFAULT NULL,
  `idpersonal` INT(11) NOT NULL,
  `calificacion` INT(11) NULL DEFAULT NULL,
  `avance` VARCHAR(500) NULL DEFAULT NULL,
  `por_cobrar` DOUBLE NULL DEFAULT NULL,
  `observacion` TEXT NULL DEFAULT NULL,
  `estado` CHAR(1) NULL DEFAULT '0',
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`idcomercializacion`),
  INDEX `fk_comercializacion_clientes2_idx` (`idclientes` ASC),
  INDEX `fk_comercializacion_users1_idx` (`idusers` ASC),
  INDEX `fk_comercializacion_medios1_idx` (`idmedios` ASC),
  INDEX `fk_comercializacion_eventos1_idx` (`ideventos` ASC),
  INDEX `fk_comercializacion_personal1_idx` (`idpersonal` ASC),
  CONSTRAINT `fk_comercializacion_clientes2`
    FOREIGN KEY (`idclientes`)
    REFERENCES `cmr_comercialización`.`clientes` (`idclientes`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_comercializacion_users1`
    FOREIGN KEY (`idusers`)
    REFERENCES `cmr_comercialización`.`users` (`idusers`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_comercializacion_medios1`
    FOREIGN KEY (`idmedios`)
    REFERENCES `cmr_comercialización`.`medios` (`idmedios`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_comercializacion_eventos1`
    FOREIGN KEY (`ideventos`)
    REFERENCES `cmr_comercialización`.`eventos` (`ideventos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_comercializacion_personal1`
    FOREIGN KEY (`idpersonal`)
    REFERENCES `cmr_comercialización`.`personal` (`idpersonal`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

ALTER TABLE `cmr_comercialización`.`modulos` 
CHANGE COLUMN `estado` `estado` CHAR(1) NOT NULL DEFAULT '0' COMMENT '0 =  activo\n1 = inactivo' ;

ALTER TABLE `cmr_comercialización`.`medios` 
CHANGE COLUMN `estado` `estado` CHAR(1) NOT NULL DEFAULT '0' COMMENT '0 =  activo\n1 = inactivo' ;

ALTER TABLE `cmr_comercialización`.`eventos` 
CHANGE COLUMN `estado` `estado` CHAR(1) NOT NULL DEFAULT '0' COMMENT '0 =  activo\n1 = inactivo' ;

ALTER TABLE `cmr_comercialización`.`personal` 
CHANGE COLUMN `estado` `estado` CHAR(1) NOT NULL DEFAULT '0' COMMENT '0 =  activo\n1 = inactivo' ;

ALTER TABLE `cmr_comercialización`.`reclamos` 
DROP COLUMN `idpersonal`,
DROP COLUMN `idmodulos`,
DROP COLUMN `idmedios`,
DROP COLUMN `idclientes`,
ADD COLUMN `idclientes` INT(11) NOT NULL AFTER `idreclamos`,
ADD COLUMN `idmedios` INT(11) NOT NULL AFTER `Ruc_nro_contrato`,
ADD COLUMN `idmodulos` INT(11) NOT NULL AFTER `idmedios`,
ADD COLUMN `idpersonal` INT(11) NOT NULL AFTER `accion_tomar`,
CHANGE COLUMN `fecha_compromiso` `fecha_compromiso` TIMESTAMP NULL DEFAULT NULL ,
CHANGE COLUMN `fecha_solucion` `fecha_solucion` TIMESTAMP NULL DEFAULT NULL ,
ADD INDEX `fk_reclamos_clientes1_idx` (`idclientes` ASC),
ADD INDEX `fk_reclamos_medios1_idx` (`idmedios` ASC),
ADD INDEX `fk_reclamos_modulos1_idx` (`idmodulos` ASC),
ADD INDEX `fk_reclamos_personal1_idx` (`idpersonal` ASC),
DROP INDEX `fk_reclamos_personal1_idx` ,
DROP INDEX `fk_reclamos_modulos1_idx` ,
DROP INDEX `fk_reclamos_medios1_idx` ,
DROP INDEX `fk_reclamos_clientes1_idx` ;
;

ALTER TABLE `cmr_comercialización`.`compras` 
DROP COLUMN `idcotizaciones`,
DROP COLUMN `idclientes`,
ADD COLUMN `idclientes` INT(11) NOT NULL AFTER `idcompras`,
ADD COLUMN `idcotizaciones` INT(11) NOT NULL AFTER `idclientes`,
ADD INDEX `fk_historial_cliente_clientes1_idx` (`idclientes` ASC),
ADD INDEX `fk_compras_cotizaciones1_idx` (`idcotizaciones` ASC),
DROP INDEX `fk_compras_cotizaciones1_idx` ,
DROP INDEX `fk_historial_cliente_clientes1_idx` ;
;

ALTER TABLE `cmr_comercialización`.`modulo_comercializacion` 
DROP COLUMN `idcomercializacion`,
DROP COLUMN `idmodulos`,
ADD COLUMN `idmodulos` INT(11) NOT NULL AFTER `idmodulo_comercializacion`,
ADD COLUMN `idcomercializacion` INT(11) NOT NULL AFTER `idmodulos`,
ADD INDEX `fk_table1_modulos1_idx` (`idmodulos` ASC),
ADD INDEX `fk__comercializacion1_idx` (`idcomercializacion` ASC),
DROP INDEX `fk__comercializacion1_idx` ,
DROP INDEX `fk_table1_modulos1_idx` ;
;

ALTER TABLE `cmr_comercialización`.`cotizacion_comercializacion` 
DROP COLUMN `idcotizaciones`,
DROP COLUMN `idcomercializacion`,
ADD COLUMN `idcomercializacion` INT(11) NOT NULL AFTER `idcotizacion_comercializacion`,
ADD COLUMN `idcotizaciones` INT(11) NOT NULL AFTER `idcomercializacion`,
ADD INDEX `fk_cotizacion_comercializacion_comercializacion1_idx` (`idcomercializacion` ASC),
ADD INDEX `fk_cotizacion_comercializacion_cotizaciones1_idx` (`idcotizaciones` ASC),
DROP INDEX `fk_cotizacion_comercializacion_cotizaciones1_idx` ,
DROP INDEX `fk_cotizacion_comercializacion_comercializacion1_idx` ;
;

ALTER TABLE `cmr_comercialización`.`actualizaciones` 
DROP COLUMN `idcompras`,
ADD COLUMN `idcompras` INT(11) NOT NULL AFTER `idactualizaciones`,
ADD INDEX `fk_actualizaciones_compras1_idx` (`idcompras` ASC),
DROP INDEX `fk_actualizaciones_compras1_idx` ;
;

ALTER TABLE `cmr_comercialización`.`compra_modulos` 
DROP COLUMN `idmodulos`,
DROP COLUMN `idcompras`,
ADD COLUMN `idcompras` INT(11) NOT NULL AFTER `idcompra_modulos`,
ADD COLUMN `idmodulos` INT(11) NOT NULL AFTER `idcompras`,
ADD INDEX `fk_compra_modulos_modulos1_idx` (`idmodulos` ASC),
ADD INDEX `fk_compra_modulos_compras1_idx` (`idcompras` ASC),
DROP INDEX `fk_compra_modulos_compras1_idx` ,
DROP INDEX `fk_compra_modulos_modulos1_idx` ;
;

ALTER TABLE `cmr_comercialización`.`model_has_roles` 
DROP COLUMN `role_id`,
ADD COLUMN `role_id` BIGINT(20) NOT NULL FIRST,
ADD INDEX `fk_model_has_roles_roles1_idx` (`role_id` ASC),
DROP INDEX `fk_model_has_roles_roles1_idx` ;
;

ALTER TABLE `cmr_comercialización`.`model_has_permissions` 
DROP COLUMN `permission_id`,
ADD COLUMN `permission_id` BIGINT(20) NOT NULL FIRST,
ADD INDEX `fk_model_has_permissions_permissions1_idx` (`permission_id` ASC),
DROP INDEX `fk_model_has_permissions_permissions1_idx` ;
;

ALTER TABLE `cmr_comercialización`.`roles_has_permissions` 
DROP COLUMN `role_id`,
DROP COLUMN `permission_id`,
ADD COLUMN `permission_id` BIGINT(20) NOT NULL FIRST,
ADD COLUMN `role_id` BIGINT(20) NOT NULL AFTER `permission_id`,
DROP PRIMARY KEY,
ADD PRIMARY KEY (`permission_id`, `role_id`),
ADD INDEX `fk_roles_has_permissions_permissions1_idx` (`permission_id` ASC),
ADD INDEX `fk_roles_has_permissions_roles1_idx` (`role_id` ASC),
DROP INDEX `fk_roles_has_permissions_roles1_idx` ,
DROP INDEX `fk_roles_has_permissions_permissions1_idx` ;
;

DROP TABLE IF EXISTS `cmr_comercialización`.`comercializacion` ;

ALTER TABLE `cmr_comercialización`.`reclamos` 
ADD CONSTRAINT `fk_reclamos_clientes1`
  FOREIGN KEY (`idclientes`)
  REFERENCES `cmr_comercialización`.`clientes` (`idclientes`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_reclamos_medios1`
  FOREIGN KEY (`idmedios`)
  REFERENCES `cmr_comercialización`.`medios` (`idmedios`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_reclamos_modulos1`
  FOREIGN KEY (`idmodulos`)
  REFERENCES `cmr_comercialización`.`modulos` (`idmodulos`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_reclamos_personal1`
  FOREIGN KEY (`idpersonal`)
  REFERENCES `cmr_comercialización`.`personal` (`idpersonal`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `cmr_comercialización`.`compras` 
DROP FOREIGN KEY `fk_historial_cliente_clientes1`;

ALTER TABLE `cmr_comercialización`.`compras` ADD CONSTRAINT `fk_historial_cliente_clientes1`
  FOREIGN KEY (`idclientes`)
  REFERENCES `cmr_comercialización`.`clientes` (`idclientes`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_compras_cotizaciones1`
  FOREIGN KEY (`idcotizaciones`)
  REFERENCES `cmr_comercialización`.`cotizaciones` (`idcotizaciones`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `cmr_comercialización`.`modulo_comercializacion` 
DROP FOREIGN KEY `fk_table1_modulos1`;

ALTER TABLE `cmr_comercialización`.`modulo_comercializacion` ADD CONSTRAINT `fk_table1_modulos1`
  FOREIGN KEY (`idmodulos`)
  REFERENCES `cmr_comercialización`.`modulos` (`idmodulos`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk__comercializacion1`
  FOREIGN KEY (`idcomercializacion`)
  REFERENCES `cmr_comercialización`.`comercializacion` (`idcomercializacion`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `cmr_comercialización`.`cotizacion_comercializacion` 
ADD CONSTRAINT `fk_cotizacion_comercializacion_comercializacion1`
  FOREIGN KEY (`idcomercializacion`)
  REFERENCES `cmr_comercialización`.`comercializacion` (`idcomercializacion`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_cotizacion_comercializacion_cotizaciones1`
  FOREIGN KEY (`idcotizaciones`)
  REFERENCES `cmr_comercialización`.`cotizaciones` (`idcotizaciones`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `cmr_comercialización`.`actualizaciones` 
ADD CONSTRAINT `fk_actualizaciones_compras1`
  FOREIGN KEY (`idcompras`)
  REFERENCES `cmr_comercialización`.`compras` (`idcompras`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `cmr_comercialización`.`compra_modulos` 
DROP FOREIGN KEY `fk_compra_modulos_modulos1`;

ALTER TABLE `cmr_comercialización`.`compra_modulos` ADD CONSTRAINT `fk_compra_modulos_modulos1`
  FOREIGN KEY (`idmodulos`)
  REFERENCES `cmr_comercialización`.`modulos` (`idmodulos`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_compra_modulos_compras1`
  FOREIGN KEY (`idcompras`)
  REFERENCES `cmr_comercialización`.`compras` (`idcompras`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `cmr_comercialización`.`model_has_roles` 
ADD CONSTRAINT `fk_model_has_roles_roles1`
  FOREIGN KEY (`role_id`)
  REFERENCES `cmr_comercialización`.`roles` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `cmr_comercialización`.`model_has_permissions` 
ADD CONSTRAINT `fk_model_has_permissions_permissions1`
  FOREIGN KEY (`permission_id`)
  REFERENCES `cmr_comercialización`.`permissions` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `cmr_comercialización`.`roles_has_permissions` 
DROP FOREIGN KEY `fk_roles_has_permissions_roles1`;

ALTER TABLE `cmr_comercialización`.`roles_has_permissions` ADD CONSTRAINT `fk_roles_has_permissions_roles1`
  FOREIGN KEY (`role_id`)
  REFERENCES `cmr_comercialización`.`roles` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_roles_has_permissions_permissions1`
  FOREIGN KEY (`permission_id`)
  REFERENCES `cmr_comercialización`.`permissions` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
