/*
 Navicat Premium Data Transfer

 Source Server         : poa2__
 Source Server Type    : MySQL
 Source Server Version : 50740 (5.7.40)
 Source Host           : localhost:3306
 Source Schema         : ezonshar_mdepsaddb

 Target Server Type    : MySQL
 Target Server Version : 50740 (5.7.40)
 File Encoding         : 65001

 Date: 27/12/2023 11:21:51
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for poa_incremento_anexo_proyecto
-- ----------------------------
DROP TABLE IF EXISTS `poa_incremento_anexo_proyecto`;
CREATE TABLE `poa_incremento_anexo_proyecto`  (
  `idAnexoProyecto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombreAnexo` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `idOrganismo` int(10) UNSIGNED NULL DEFAULT NULL,
  `fecha` date NULL DEFAULT NULL,
  `perioIngreso` int(11) NULL DEFAULT NULL,
  `idTramite` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`idAnexoProyecto`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3473 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for poa_incremento_anexo_proyecto_documentos
-- ----------------------------
DROP TABLE IF EXISTS `poa_incremento_anexo_proyecto_documentos`;
CREATE TABLE `poa_incremento_anexo_proyecto_documentos`  (
  `idDocumentosP` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombreDocumento` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `fecha` date NULL DEFAULT NULL,
  `perioIngreso` int(11) NULL DEFAULT NULL,
  `idAnexoProyecto` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`idDocumentosP`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3473 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for poa_incrementos_actdeportivas
-- ----------------------------
DROP TABLE IF EXISTS `poa_incrementos_actdeportivas`;
CREATE TABLE `poa_incrementos_actdeportivas`  (
  `idActividadIncremento` int(11) NOT NULL AUTO_INCREMENT,
  `idPda` int(10) NULL DEFAULT NULL,
  `tipoFinanciamiento` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nombreEvento` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `Deporte` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `provincia` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ciudadPais` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `alcance` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `fechaInicio` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `fechaFin` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `genero` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `categoria` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `numeroEntreandores` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `numeroAtletas` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `total` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `mBenefici` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `hBenefici` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `justificacionAd` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `canitdarBie` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `idProgramacionFinanciera` int(11) NULL DEFAULT NULL,
  `fecha` date NULL DEFAULT NULL,
  `enero` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `febrero` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `marzo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `abril` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `mayo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `junio` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `julio` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `agosto` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `septiembre` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `octubre` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `noviembre` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `diciembre` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `totalElem` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `detalleBien` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `modifica` char(4) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `perioIngreso` int(11) NULL DEFAULT NULL,
  `idOrganismo` int(11) NULL DEFAULT NULL,
  `estadoP` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `idActividad` int(11) NULL DEFAULT NULL,
  `enero2` double NULL DEFAULT NULL,
  `febrero2` double NULL DEFAULT NULL,
  `marzo2` double NULL DEFAULT NULL,
  `abril2` double NULL DEFAULT NULL,
  `mayo2` double NULL DEFAULT NULL,
  `junio2` double NULL DEFAULT NULL,
  `julio2` double NULL DEFAULT NULL,
  `agosto2` double NULL DEFAULT NULL,
  `septiembre2` double NULL DEFAULT NULL,
  `octubre2` double NULL DEFAULT NULL,
  `noviembre2` double NULL DEFAULT NULL,
  `diciembre2` double NULL DEFAULT NULL,
  `total2` double NULL DEFAULT NULL,
  `fechaTramite` date NULL DEFAULT NULL,
  `tipoTramite` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `estado` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idActividadIncremento`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 84285 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for poa_incrementos_administrativas
-- ----------------------------
DROP TABLE IF EXISTS `poa_incrementos_administrativas`;
CREATE TABLE `poa_incrementos_administrativas`  (
  `idAdminIncremento` int(11) NOT NULL AUTO_INCREMENT,
  `idActividadAd` int(10) NULL DEFAULT NULL,
  `justificacionActividad` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `cantidadBien` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `idProgramacionFinanciera` int(11) NULL DEFAULT NULL,
  `fecha` date NULL DEFAULT NULL,
  `modifica` char(2) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `perioIngreso` int(11) NULL DEFAULT NULL,
  `fechaTramite` date NULL DEFAULT NULL,
  `tipoTramite` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `estado` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idAdminIncremento`) USING BTREE,
  INDEX `fk_programa`(`idProgramacionFinanciera`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 16131 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for poa_incrementos_bonificaciones
-- ----------------------------
DROP TABLE IF EXISTS `poa_incrementos_bonificaciones`;
CREATE TABLE `poa_incrementos_bonificaciones`  (
  `idIncrementoSueldos` int(11) NOT NULL AUTO_INCREMENT,
  `enero` double NULL DEFAULT NULL,
  `febrero` double NULL DEFAULT NULL,
  `marzo` double NULL DEFAULT NULL,
  `abril` double NULL DEFAULT NULL,
  `mayo` double NULL DEFAULT NULL,
  `junio` double NULL DEFAULT NULL,
  `julio` double NULL DEFAULT NULL,
  `agosto` double NULL DEFAULT NULL,
  `septiembre` double NULL DEFAULT NULL,
  `octubre` double NULL DEFAULT NULL,
  `noviembre` double NULL DEFAULT NULL,
  `diciembre` double NULL DEFAULT NULL,
  `idTramiteIncremento` int(11) NULL DEFAULT NULL,
  `tipoBonificacion` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `estado` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idIncrementoSueldos`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for poa_incrementos_honorarios2022
-- ----------------------------
DROP TABLE IF EXISTS `poa_incrementos_honorarios2022`;
CREATE TABLE `poa_incrementos_honorarios2022`  (
  `idHonorariosIncremento` int(11) NOT NULL,
  `idHonorarios` int(10) NULL DEFAULT NULL,
  `cedula` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nombres` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `cargo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `honorarioMensual` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `enero` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `febrero` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `marzo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `abril` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `mayo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `junio` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `julio` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `agosto` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `septiembre` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `octubre` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `noviembre` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `diciembre` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `total` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `idOrganismo` int(10) UNSIGNED NULL DEFAULT NULL,
  `fecha` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tipoCargo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `idActividad` int(11) NULL DEFAULT NULL,
  `modifica` char(2) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `perioIngreso` int(11) NULL DEFAULT NULL,
  `enero2` double NULL DEFAULT NULL,
  `febrero2` double NULL DEFAULT NULL,
  `marzo2` double NULL DEFAULT NULL,
  `abril2` double NULL DEFAULT NULL,
  `mayo2` double NULL DEFAULT NULL,
  `junio2` double NULL DEFAULT NULL,
  `julio2` double NULL DEFAULT NULL,
  `agosto2` double NULL DEFAULT NULL,
  `septiembre2` double NULL DEFAULT NULL,
  `octubre2` double NULL DEFAULT NULL,
  `noviembre2` double NULL DEFAULT NULL,
  `diciembre2` double NULL DEFAULT NULL,
  `total2` double NULL DEFAULT NULL,
  `fechaTramite` date NULL DEFAULT NULL,
  `tipoTramite` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `estado` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idHonorariosIncremento`) USING BTREE,
  INDEX `idOrganismosss`(`idOrganismo`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for poa_incrementos_ingreso
-- ----------------------------
DROP TABLE IF EXISTS `poa_incrementos_ingreso`;
CREATE TABLE `poa_incrementos_ingreso`  (
  `idIncrementos` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) UNSIGNED NULL DEFAULT NULL,
  `idOrganismo` int(11) UNSIGNED NULL DEFAULT NULL,
  `fecha` date NULL DEFAULT NULL,
  `hora` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NULL DEFAULT NULL,
  `comentario` text CHARACTER SET latin1 COLLATE latin1_general_ci NULL,
  `perioIngreso` int(11) NULL DEFAULT NULL,
  `estado` char(1) CHARACTER SET latin1 COLLATE latin1_general_ci NULL DEFAULT NULL,
  `tramite` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idIncrementos`) USING BTREE,
  INDEX `fk_incrementos_idOrganismos`(`idOrganismo`) USING BTREE,
  INDEX `fk_incrementos_usuarios`(`idUsuario`) USING BTREE,
  CONSTRAINT `fk_incrementos_idOrganismos` FOREIGN KEY (`idOrganismo`) REFERENCES `poa_organismo` (`idOrganismo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_incrementos_usuarios` FOREIGN KEY (`idUsuario`) REFERENCES `th_usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 26 CHARACTER SET = latin1 COLLATE = latin1_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for poa_incrementos_ingreso_final
-- ----------------------------
DROP TABLE IF EXISTS `poa_incrementos_ingreso_final`;
CREATE TABLE `poa_incrementos_ingreso_final`  (
  `idTramiteFinalIncrementos` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idOrganismo` int(11) UNSIGNED NULL DEFAULT NULL,
  `perioIngreso` int(11) UNSIGNED NULL DEFAULT NULL,
  `fecha` date NULL DEFAULT NULL,
  `hora` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NULL DEFAULT NULL,
  `tipoTramite` varchar(500) CHARACTER SET latin1 COLLATE latin1_general_ci NULL DEFAULT NULL,
  `idPreliminar` int(11) UNSIGNED NULL DEFAULT NULL,
  `techoActual` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NULL DEFAULT NULL,
  `documento` varchar(500) CHARACTER SET latin1 COLLATE latin1_general_ci NULL DEFAULT NULL,
  `numeroResolucion` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idTramiteFinalIncrementos`) USING BTREE,
  INDEX `fk_incrementos_aprobados`(`idOrganismo`) USING BTREE,
  INDEX `fk_incrementos_idIncrementos`(`idPreliminar`) USING BTREE,
  INDEX `fk_inversion_usuarios`(`techoActual`) USING BTREE,
  CONSTRAINT `fk_incrementos_aprobados` FOREIGN KEY (`idOrganismo`) REFERENCES `poa_organismo` (`idOrganismo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for poa_incrementos_mantenimiento
-- ----------------------------
DROP TABLE IF EXISTS `poa_incrementos_mantenimiento`;
CREATE TABLE `poa_incrementos_mantenimiento`  (
  `idMantenimientoIncremento` int(11) NOT NULL AUTO_INCREMENT,
  `idMantenimiento` int(10) NULL DEFAULT NULL,
  `nombreInfras` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `provincia` int(11) NULL DEFAULT NULL,
  `direccionCompleta` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `estado` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `tipoRecursos` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `tipoIntervencion` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `detallarTipoIn` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `tipoMantenimiento` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `materialesServicios` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `fechaUltimo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `idProgramacionFinanciera` int(11) NULL DEFAULT NULL,
  `fecha` date NULL DEFAULT NULL,
  `modifica` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `perioIngreso` int(11) NULL DEFAULT NULL,
  `idOrganismo` int(11) NULL DEFAULT NULL,
  `enero` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `febrero` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `marzo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `abril` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `mayo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `junio` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `julio` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `agosto` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `septiembre` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `octubre` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `noviembre` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `diciembre` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `total` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `enero2` double NULL DEFAULT NULL,
  `febrero2` double NULL DEFAULT NULL,
  `marzo2` double NULL DEFAULT NULL,
  `abril2` double NULL DEFAULT NULL,
  `mayo2` double NULL DEFAULT NULL,
  `junio2` double NULL DEFAULT NULL,
  `julio2` double NULL DEFAULT NULL,
  `agosto2` double NULL DEFAULT NULL,
  `septiembre2` double NULL DEFAULT NULL,
  `octubre2` double NULL DEFAULT NULL,
  `noviembre2` double NULL DEFAULT NULL,
  `diciembre2` double NULL DEFAULT NULL,
  `total2` double NULL DEFAULT NULL,
  `fechaTramite` date NULL DEFAULT NULL,
  `tipoTramite` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `estadoT` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idMantenimientoIncremento`) USING BTREE,
  INDEX `fk_mante`(`idProgramacionFinanciera`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1304 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for poa_incrementos_notificacion
-- ----------------------------
DROP TABLE IF EXISTS `poa_incrementos_notificacion`;
CREATE TABLE `poa_incrementos_notificacion`  (
  `idNotificacionIncremento` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) UNSIGNED NULL DEFAULT NULL,
  `idOrganismo` int(11) UNSIGNED NULL DEFAULT NULL,
  `fecha` date NULL DEFAULT NULL,
  `hora` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NULL DEFAULT NULL,
  `perioIngreso` int(11) NULL DEFAULT NULL,
  `estado` char(1) CHARACTER SET latin1 COLLATE latin1_general_ci NULL DEFAULT NULL,
  `tramite` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NULL DEFAULT NULL,
  `valorIncremento` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NULL DEFAULT NULL,
  `valorTechoA` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NULL DEFAULT NULL,
  `documento` varchar(500) CHARACTER SET latin1 COLLATE latin1_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idNotificacionIncremento`) USING BTREE,
  INDEX `fk_incrementos_notificacion_idOrganismos`(`idOrganismo`) USING BTREE,
  INDEX `fk_incrementos_notificacion_usuarios`(`idUsuario`) USING BTREE,
  CONSTRAINT `fk_incrementos_notificacion_idOrganismos` FOREIGN KEY (`idOrganismo`) REFERENCES `poa_organismo` (`idOrganismo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_incrementos_notificacion_usuarios` FOREIGN KEY (`idUsuario`) REFERENCES `th_usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 56 CHARACTER SET = latin1 COLLATE = latin1_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for poa_incrementos_observaciones
-- ----------------------------
DROP TABLE IF EXISTS `poa_incrementos_observaciones`;
CREATE TABLE `poa_incrementos_observaciones`  (
  `idObservacion` int(11) NOT NULL AUTO_INCREMENT,
  `observacion` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `fechaEnvioObservacion` date NULL DEFAULT NULL,
  `fechaFinObservacion` date NULL DEFAULT NULL,
  `idTramite` int(11) NULL DEFAULT NULL,
  `perioIngreso` int(11) NULL DEFAULT NULL,
  `documentoObservacion` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `estado` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `fechaEnvioOrganismo` date NULL DEFAULT NULL,
  PRIMARY KEY (`idObservacion`) USING BTREE,
  INDEX `fk_tramite_observacion`(`idTramite`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 28 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for poa_incrementos_poainicial
-- ----------------------------
DROP TABLE IF EXISTS `poa_incrementos_poainicial`;
CREATE TABLE `poa_incrementos_poainicial`  (
  `idInicialIncrementos` int(11) NOT NULL AUTO_INCREMENT,
  `idPoaEnviado` int(10) NULL DEFAULT NULL,
  `primertrimestre` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `segundotrimestre` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tercertrimestre` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `cuartotrimestre` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `metaindicador` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `fecha` date NULL DEFAULT NULL,
  `idActividad` int(11) NULL DEFAULT NULL,
  `idOrganismo` int(11) NULL DEFAULT NULL,
  `modifica` char(2) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `perioIngreso` int(11) NULL DEFAULT NULL,
  `fechaTramite` date NULL DEFAULT NULL,
  `tipoTramite` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `estado` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idInicialIncrementos`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 11597 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for poa_incrementos_preliminar_envio
-- ----------------------------
DROP TABLE IF EXISTS `poa_incrementos_preliminar_envio`;
CREATE TABLE `poa_incrementos_preliminar_envio`  (
  `idPoaIncremento` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idOrganismo` int(10) UNSIGNED NULL DEFAULT NULL,
  `activo` char(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `fecha` date NULL DEFAULT NULL,
  `hora` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `planificacion` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `planificacion2` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `infraestructura` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `infraestructura2` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `subsecretariaAlto` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `subsecretariaAlto2` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `subsecretariaActividad` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `subsecretariaActividad2` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `financiero` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `financiero2` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `planificacionF` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `perioIngreso` int(11) NULL DEFAULT NULL,
  `planificacionF2` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `documentoAlto` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `documentoDesarrollo` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `documentoInstalaciones` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `documentoAdministrativo` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `documentoPlanificacion` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `documentoInfraestructura` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `instalaciones` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `instalaciones2` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `observacionesPlanificacion` char(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idPoaIncremento`) USING BTREE,
  INDEX `fk_preliminar_organismo`(`idOrganismo`) USING BTREE,
  CONSTRAINT `poa_incrementos_preliminar_envio_ibfk_1` FOREIGN KEY (`idOrganismo`) REFERENCES `poa_organismo` (`idOrganismo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Table structure for poa_incrementos_programacion_financiera
-- ----------------------------
DROP TABLE IF EXISTS `poa_incrementos_programacion_financiera`;
CREATE TABLE `poa_incrementos_programacion_financiera`  (
  `idProgramacionIncrementos` int(11) NOT NULL AUTO_INCREMENT,
  `idProgramacionFinanciera` int(10) NULL DEFAULT NULL,
  `enero` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `febrero` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `marzo` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `abril` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `mayo` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `junio` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `julio` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `agosto` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `septiembre` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `octubre` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `noviembre` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `diciembre` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `totalSumaItem` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `totalTotales` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `quedaActividadFinanciera` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `quedaItemFinanciero` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `idOrganismo` int(10) UNSIGNED NULL DEFAULT NULL,
  `idItem` int(10) UNSIGNED NULL DEFAULT NULL,
  `idActividad` int(10) UNSIGNED NULL DEFAULT NULL,
  `idProgramatica` int(10) UNSIGNED NULL DEFAULT NULL,
  `fecha` date NULL DEFAULT NULL,
  `hora` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `calificacion` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `observaciones` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `estadoTransaccional` char(2) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `stringObservacionCeroArray` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `modifica` char(4) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `perioIngreso` int(11) NULL DEFAULT NULL,
  `enero2` double NULL DEFAULT NULL,
  `febrero2` double NULL DEFAULT NULL,
  `marzo2` double NULL DEFAULT NULL,
  `abril2` double NULL DEFAULT NULL,
  `mayo2` double NULL DEFAULT NULL,
  `junio2` double NULL DEFAULT NULL,
  `julio2` double NULL DEFAULT NULL,
  `agosto2` double NULL DEFAULT NULL,
  `septiembre2` double NULL DEFAULT NULL,
  `octubre2` double NULL DEFAULT NULL,
  `noviembre2` double NULL DEFAULT NULL,
  `diciembre2` double NULL DEFAULT NULL,
  `total2` double NULL DEFAULT NULL,
  `fechaTramite` date NULL DEFAULT NULL,
  `tipoTramite` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `estado` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idProgramacionIncrementos`) USING BTREE,
  INDEX `fk_financiero_organismo`(`idOrganismo`) USING BTREE,
  INDEX `fk_financiero_item`(`idItem`) USING BTREE,
  INDEX `fk_financiero_actividad`(`idActividad`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 165 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for poa_incrementos_recomienda_tecnicos
-- ----------------------------
DROP TABLE IF EXISTS `poa_incrementos_recomienda_tecnicos`;
CREATE TABLE `poa_incrementos_recomienda_tecnicos`  (
  `idRecorridoIncremento` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idFuncionario` int(10) UNSIGNED NULL DEFAULT NULL,
  `idOrganismo` int(10) UNSIGNED NULL DEFAULT NULL,
  `fecha` date NULL DEFAULT NULL,
  `hora` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tipoE` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `observacionesTecnicas` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `tipo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `fisicamente` int(10) NULL DEFAULT NULL,
  `perioIngreso` int(11) NULL DEFAULT NULL,
  `idFuncionario2` int(10) NULL DEFAULT NULL,
  `fisicamente2` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`idRecorridoIncremento`) USING BTREE,
  INDEX `fk_organismo`(`idOrganismo`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 88 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for poa_incrementos_sueldossalarios2022
-- ----------------------------
DROP TABLE IF EXISTS `poa_incrementos_sueldossalarios2022`;
CREATE TABLE `poa_incrementos_sueldossalarios2022`  (
  `idSueldosIncrementos` int(11) NOT NULL AUTO_INCREMENT,
  `idSueldos` int(10) NULL DEFAULT NULL,
  `cedula` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nombres` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `cargo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tipoCargo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tiempoTrabajo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `sueldoSalario` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `aportePatronal` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `decimoTercera` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `mensualizaTercera` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `decimoCuarta` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `menusalizaCuarta` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `fondosReserva` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `enero` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `febrero` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `marzo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `abril` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `mayo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `junio` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `julio` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `agosto` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `septiembre` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `octubre` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `noviembre` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `diciembre` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `total` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `idOrganismo` int(10) UNSIGNED NULL DEFAULT NULL,
  `fecha` date NULL DEFAULT NULL,
  `idActividad` int(11) NULL DEFAULT NULL,
  `modifica` char(2) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `perioIngreso` int(11) NULL DEFAULT NULL,
  `enero2` double NULL DEFAULT NULL,
  `febrero2` double NULL DEFAULT NULL,
  `marzo2` double NULL DEFAULT NULL,
  `abril2` double NULL DEFAULT NULL,
  `mayo2` double NULL DEFAULT NULL,
  `junio2` double NULL DEFAULT NULL,
  `julio2` double NULL DEFAULT NULL,
  `agosto2` double NULL DEFAULT NULL,
  `septiembre2` double NULL DEFAULT NULL,
  `octubre2` double NULL DEFAULT NULL,
  `noviembre2` double NULL DEFAULT NULL,
  `diciembre2` double NULL DEFAULT NULL,
  `total2` double NULL DEFAULT NULL,
  `fechaTramite` date NULL DEFAULT NULL,
  `tipoTramite` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `estado` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idSueldosIncrementos`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for poa_incrementos_tramites
-- ----------------------------
DROP TABLE IF EXISTS `poa_incrementos_tramites`;
CREATE TABLE `poa_incrementos_tramites`  (
  `idTramiteIncremento` int(11) NOT NULL AUTO_INCREMENT,
  `idActividad` int(11) NULL DEFAULT NULL,
  `nombreEvento` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nombreInfra` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `idItemProF` int(11) NULL DEFAULT NULL,
  `idItemPresupuestario` int(11) NULL DEFAULT NULL,
  `idOrganismo` int(11) NULL DEFAULT NULL,
  `fecha` date NULL DEFAULT NULL,
  `justificacion` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `documento` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `enero` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `febrero` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `marzo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `abril` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `mayo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `junio` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `julio` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `agosto` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `septiembre` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `octubre` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `noviembre` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `diciembre` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `estado` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tramite` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `perioIngreso` int(11) NULL DEFAULT NULL,
  `totalIncrementoEje` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `idPoaIncremento` int(10) NULL DEFAULT NULL,
  `eneroP` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `febreroP` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `marzoP` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `abrilP` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `mayoP` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `junioP` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `julioP` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `agostoP` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `septiembreP` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `octubreP` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `noviembreP` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `diciembreP` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `totalP` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `eneroR` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `febreroR` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `marzoR` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `abrilR` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `mayoR` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `junioR` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `julioR` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `agostoR` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `septiembreR` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `octubreR` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `noviembreR` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `diciembreR` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `totalR` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idTramiteIncremento`) USING BTREE,
  INDEX `fk_incrementos_aprobados`(`idOrganismo`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 69 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
