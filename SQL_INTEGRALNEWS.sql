CREATE DATABASE IF NOT EXISTS INTEGRAL_NEWS;

USE INTEGRAL_NEWS;

#-----------------------------------USUARIO----------------------------------------------

CREATE TABLE IF NOT EXISTS USERS (

	`USER_ID` INT NOT NULL AUTO_INCREMENT COMMENT "Llave primaria de la tabla USERS",
    `EMAIL` VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT "Correo para iniciar sesion",
    `PASS` VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT "Acceso a la pagina",
    `FULL_NAME` VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT "Nombre completo del usuario",
    `PROFILE_PIC` MEDIUMBLOB COMMENT "Foto de perfil del usuario",
    `USER_TYPE_ID` INT COMMENT "Tipo de usuario, 1- Editor, 2- Reportero, 3- Usuario", 
    `USER_STATUS_ID` CHAR(1) DEFAULT 'A' COMMENT "Status del usuario, A- Actvo, B- Bloqueado, I- Inactivo",
    `PHONE` VARCHAR(15) COMMENT "Telefono del usuario",
    `USERNAME` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT "Apodo del usuario",
    `CREATION_DATE` DATETIME NOT NULL COMMENT "Fecha de creacion del registro",
    `USER_INFO` VARCHAR(300) COMMENT "Info de usuario", 
    `VAL_PASS` INT COMMENT "Validar si la contraseña es aceptada", 
    PRIMARY KEY (USER_ID)

);

SELECT * FROM USERS;

CALL `integral_news`.`SP_USER`(, , , , , , , , , , , , );


DELIMITER $$
CREATE PROCEDURE SP_USER(
	vOpcion VARCHAR(20),
	vId int,
	vEmail VARCHAR(200),
    vPassword VARCHAR(200),
    vFullname VARCHAR(200),
    vProfilePic MEDIUMBLOB,
    vUserType VARCHAR(50),
    vUserStatus CHAR,
    vPhone VARCHAR(15),
    vUsername VARCHAR(100),
    vCreationDate DATETIME,
    vInfo varchar(300),
    vVal INT
) BEGIN
	IF vOpcion = 'insertar' THEN
		INSERT INTO USERS(`EMAIL`, `PASS`, `FULL_NAME`, `PROFILE_PIC`, `USER_TYPE_ID`, `USER_STATUS_ID`, `PHONE`, `USERNAME`, `CREATION_DATE`, `USER_INFO`, `VAL_PASS`) 
		VALUES(vEmail, vPassword, vFullname, vProfilePic, vUserType, vUserStatus, vPhone, vUsername, sysdate(), vInfo, vVal);
    END IF;
    IF vOpcion = 'update' THEN
		UPDATE USERS
			SET `EMAIL` = vEmail, `PASS` = vPassword, `FULL_NAME` = vFullname, `PHONE` = vPhone, `USERNAME` = vUsername, `USER_INFO` = vInfo, `VAL_PASS` = vVal
		WHERE `USER_ID` = vId;
    END IF;
    IF vOpcion = 'delete' THEN
		DELETE FROM USERS
		WHERE `USER_ID` = vId;
    END IF;
    IF vOpcion = 'image' THEN
		UPDATE USERS
			SET `PROFILE_PIC`	= vProfilePic
		WHERE `USER_ID` = vId;
    END IF;
END	$$
DELIMITER ;

CALL SP_USER ('insertar', "", "", "", "", "", "3", "A", "", "", sysdate(), "", "1");


ALTER TABLE USERS AUTO_INCREMENT = 1;
SELECT * FROM USERS;

#-----------------------------------------------------------------------------------------
#-----------------------------------------------------------------------------------------
#-----------------------------------------------------------------------------------------


#-----------------------------------NOTICIAS----------------------------------------------
CREATE TABLE `NEWS` (
  `NEWS_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Llave primaria de la tabla NEWS',
  `SIGN` varchar(100) NOT NULL COMMENT 'Firma del reportero',
  `TITLE` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Titulo de la noticia',
  `DESCRIPTION` varchar(300) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Resumen de la noticia',
  `TEXT_NEWS` varchar(800) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Texto que complemente la noticia',
  `CITY` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Ciudad de la noticia',
  `SUBURB` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Colonia de la noticia',
  `COUNTRY` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Pais de la noticia',
  `NEW_STATUS` varchar(100) NOT NULL COMMENT 'Estatus de la noticia',
  `DATE_OF_NEWS` varchar(50) NOT NULL COMMENT 'Fecha de publicacion diferente a la creacion',
  `HOUR_OF_NEWS` varchar(50) NOT NULL COMMENT 'Hora en que ocurrieron los eventos',
  `CREATION_DATE` datetime NOT NULL COMMENT 'Fecha de creacion del registro',
  `CREATED_BY` int(11) NOT NULL COMMENT 'Usuario que dio de alta el registro',
  `COMMENTS_EDITOR` varchar(200) DEFAULT NULL,
  `LIKES` int(11) DEFAULT NULL,
  `USER_DELETED` tinyint(4) NOT NULL DEFAULT 0,
  `URGENTES` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`NEWS_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;



DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_NEWS`(
	vOption VARCHAR(20),
    vNEWS_ID INT,
	vSIGN VARCHAR(100),
    vTITLE VARCHAR(100),
    vDESCRIPTION VARCHAR(300),
    vTEXT_NEWS VARCHAR(800),
    vCITY VARCHAR(100),
    vSUBURB VARCHAR(100),
    vCOUNTRY VARCHAR(100),
    vNEW_STATUS VARCHAR(100),
    vDATE_OF_NEWS VARCHAR(50),
    vHOUR_OF_NEWS VARCHAR(50),
    vCREATION_DATE DATETIME,
    vCREATED_BY INT,
    vCOMMENTS_EDITOR VARCHAR(200),
    vLIKES INT
)
BEGIN
	IF vOption = 'insertar' THEN
		INSERT INTO NEWS(`SIGN`, `TITLE`, `DESCRIPTION`, `TEXT_NEWS`, `CITY`, `SUBURB`, `COUNTRY`, `NEW_STATUS`, `DATE_OF_NEWS`, `HOUR_OF_NEWS`, `CREATION_DATE`, `CREATED_BY`, `LIKES` ) 
		VALUES(vSIGN, vTITLE, vDESCRIPTION, vTEXT_NEWS, vCITY, vSUBURB, vCOUNTRY, vNEW_STATUS, vDATE_OF_NEWS, vHOUR_OF_NEWS, sysdate(), vCREATED_BY, 0);
	END IF;
    IF vOption = 'update' THEN
		UPDATE NEWS
			SET `SIGN` = vSIGN, `TITLE` = vTITLE, `DESCRIPTION` = vDESCRIPTION, `TEXT_NEWS` = vTEXT_NEWS, `CITY` = vCITY, `SUBURB` = vSUBURB, `COUNTRY` = vCOUNTRY, `NEW_STATUS` = vNEW_STATUS, `DATE_OF_NEWS` = vDATE_OF_NEWS, `HOUR_OF_NEWS` = vHOUR_OF_NEWS, `CREATION_DATE` = sysdate(), `COMMENTS_EDITOR` = vCOMMENTS_EDITOR
		WHERE `NEWS_ID` = vNEWS_ID;
	END IF;
    IF vOption = 'delete' THEN
		DELETE FROM NEWS
		WHERE `NEWS_ID` = vNEWS_ID;
    END IF;
    IF vOption = 'terminada' THEN
		UPDATE NEWS
			SET `NEW_STATUS` = vNEW_STATUS
		WHERE `NEWS_ID` = vNEWS_ID;
    END IF;
    IF vOption = 'publicada' THEN
		UPDATE NEWS
			SET `NEW_STATUS` = vNEW_STATUS
		WHERE `NEWS_ID` = vNEWS_ID;
    END IF;
     IF vOption = 'revision' THEN
		UPDATE NEWS
			SET `NEW_STATUS` = vNEW_STATUS, `COMMENTS_EDITOR` = vCOMMENTS_EDITOR
		WHERE `NEWS_ID` = vNEWS_ID;
    END IF;
    IF vOption = 'likeMas' THEN
		UPDATE NEWS 
			SET `LIKES` = `LIKES`+1
		WHERE `NEWS_ID` = vNEWS_ID;
    END IF;
	IF vOption = 'likeMenos' THEN 
		UPDATE NEWS 
			SET `LIKES`= `LIKES`-1
		WHERE `NEWS_ID` = vNEWS_ID;
	END IF;
END $$
DELIMITER ;

ALTER TABLE NEWS AUTO_INCREMENT = 1;
SELECT * FROM NEWS;

CREATE TABLE IF NOT EXISTS NEWS_IMAGE (
	
    `N_IMAGE_ID` INT NOT NULL AUTO_INCREMENT COMMENT "Llave primaria de la tabla NEWS_IMAGE",
	`NEWS_ID` INT NOT NULL COMMENT "Id de la noticia a la que pertenece",
    `NEWS_TITLE` MEDIUMBLOB COMMENT "Imagenes titular de la noticia",
    `NEWS_IMAGE` MEDIUMBLOB COMMENT "Imagenes de la noticia",
    `NEWS_TYPE` VARCHAR(10) COMMENT "Tipo de imagen",
    PRIMARY KEY (`N_IMAGE_ID`)
);

DELIMITER $$
CREATE PROCEDURE SP_NEWS_IMAGE(
	IN vOption VARCHAR(20),
    IN vN_IMAGE_ID INT,
    IN vNEWS_ID INT,
	IN vNEWS_TITLE MEDIUMBLOB,
    IN vNEWS_IMAGE MEDIUMBLOB,
    IN vNEWS_TYPE VARCHAR(10)
) BEGIN
	IF vOption = 'titulo' THEN
		set @news=(SELECT MAX(NEWS_ID) FROM NEWS);
		INSERT INTO NEWS_IMAGE(`NEWS_ID`, `NEWS_TITLE`, `NEWS_TYPE`) 
		VALUES(@news, vNEWS_TITLE, vNEWS_TYPE);
    END IF;
	IF vOption = 'insertar' THEN
		set @news=(SELECT MAX(NEWS_ID) FROM NEWS);
		INSERT INTO NEWS_IMAGE(`NEWS_ID`, `NEWS_IMAGE`, `NEWS_TYPE`) 
		VALUES(@news, vNEWS_IMAGE, vNEWS_TYPE);
    END IF;
    IF vOption = 'insertImg' THEN
		INSERT INTO NEWS_IMAGE(`NEWS_ID`, `NEWS_IMAGE`, `NEWS_TYPE`) 
		VALUES(vNEWS_ID, vNEWS_IMAGE, vNEWS_TYPE);
    END IF;
    IF vOption = 'updateTitle' THEN
		UPDATE NEWS_IMAGE
			SET `NEWS_ID` = vNEWS_ID, `NEWS_TITLE` = vNEWS_TITLE, `NEWS_TYPE` = vNEWS_TYPE
		WHERE `NEWS_ID` = vNEWS_ID AND `NEWS_TITLE` = vNEWS_TITLE;
    END IF;
    IF vOption = 'update' THEN
		UPDATE NEWS_IMAGE
			SET `NEWS_ID` = vNEWS_ID, `NEWS_IMAGE` = vNEWS_IMAGE, `COLOR` = vColor
		WHERE `NEWS_ID` = vNEWS_ID AND `NEWS_IMAGE` = vN_IMAGE_ID;
    END IF;
    IF vOption = 'delete' THEN
		DELETE FROM NEWS_IMAGE
		WHERE `NEWS_ID` = vNEWS_ID;
    END IF;
END	$$
DELIMITER ;

CREATE TABLE IF NOT EXISTS NEWS_CLAVE (

	`N_CLAVE_ID` INT NOT NULL AUTO_INCREMENT COMMENT "Llave primaria de la tabla NEWS_CLAVE",
	`NEWS_ID` INT NOT NULL COMMENT "Id de la noticia a la que pertenece",
    `NEWS_CLAVE` VARCHAR(100) COMMENT "Palabras clave ",
    PRIMARY KEY (`N_CLAVE_ID`)
);

DELIMITER $$
CREATE PROCEDURE SP_NEWS_CLAVE(
	IN vOption VARCHAR(20),
    IN vN_CLAVE_ID INT,
    IN vNEWS_ID INT,
    IN vNEWS_CLAVE VARCHAR(100)
) BEGIN
	IF vOption = 'insertar' THEN
		set @news=(SELECT MAX(NEWS_ID) FROM NEWS);
		INSERT INTO NEWS_CLAVE(`NEWS_ID`, `NEWS_CLAVE`) 
		VALUES(@news, vNEWS_CLAVE);
    END IF;
    IF vOption = 'editInsert' THEN
		INSERT INTO NEWS_CLAVE(`NEWS_ID`, `NEWS_CLAVE`) 
		VALUES(vNEWS_ID, vNEWS_CLAVE);
    END IF;
    IF vOption = 'update' THEN
		UPDATE NEWS_CLAVE
			SET `NEWS_ID` = vNEWS_ID, `NEWS_CLAVE` = vNEWS_CLAVE
		WHERE `NEWS_ID` = vNEWS_ID AND `N_CLAVE_ID` = vN_CLAVE_ID;
    END IF;
    IF vOption = 'delete' THEN
		DELETE FROM NEWS_CLAVE
		WHERE `NEWS_ID` = vNEWS_ID;
    END IF;
END	$$
DELIMITER ;


CREATE TABLE IF NOT EXISTS NEWS_CATEGORIES (
	
    `N_CATE_ID` INT NOT NULL AUTO_INCREMENT COMMENT "Llave primaria de la tabla NEWS_CATEGORIES",
	`NEWS_ID` INT NOT NULL COMMENT "Id de la noticia a la que pertenece",
    `DESCRIPTION` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT "Categorias de la noticia",
    `COLOR` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci COMMENT "",
    PRIMARY KEY (`N_CATE_ID`)
);

#-- DELETE FROM NEWS_IMAGE;
ALTER TABLE NEWS_IMAGE AUTO_INCREMENT = 1;
SELECT * FROM NEWS_IMAGE;	
#-- DELETE FROM NEWS_CLAVE;
ALTER TABLE NEWS_CLAVE AUTO_INCREMENT = 1;
SELECT * FROM NEWS_CLAVE;
#-- DELETE FROM NEWS_CATEGORIES;
ALTER TABLE NEWS_CATEGORIES AUTO_INCREMENT = 1;
SELECT * FROM NEWS_CATEGORIES;

DELIMITER $$
CREATE PROCEDURE SP_NEWS_CATEGORIES(
	IN vOption VARCHAR(20),
    IN vN_CATE_ID INT,
    IN vNEWS_ID INT,
    IN vDESCRIPTION VARCHAR(100),
    IN vColor VARCHAR(100)
) BEGIN
	IF vOption = 'insertar' THEN
		set @news=(SELECT MAX(NEWS_ID) FROM NEWS);
		INSERT INTO NEWS_CATEGORIES(`NEWS_ID`, `DESCRIPTION`, `COLOR`) 
		VALUES(@news, vDESCRIPTION, vColor);
    END IF;
    IF vOption = 'editInsert' THEN
		INSERT INTO NEWS_CATEGORIES(`NEWS_ID`, `DESCRIPTION`, `COLOR`) 
		VALUES(vNEWS_ID, vDESCRIPTION, vColor);
    END IF;
    IF vOption = 'update' THEN
		UPDATE NEWS_CATEGORIES
			SET `NEWS_ID` = vNEWS_ID, `DESCRIPTION` = vDESCRIPTION, `COLOR` = vColor
		WHERE `NEWS_ID` = vNEWS_ID AND `N_CATE_ID` = vN_CATE_ID;
    END IF;
    IF vOption = 'delete' THEN
		DELETE FROM NEWS_CATEGORIES
		WHERE `NEWS_ID` = vNEWS_ID;
    END IF;
END	$$
DELIMITER ;

CREATE TABLE IF NOT EXISTS NEW_HISTORY(
	
    `HISTORY_TEXT` VARCHAR(100) NOT NULL COMMENT "Lo que paso",
    `CREATED_BY` INT NOT NULL COMMENT "Usuario hizo el historial",
    `HISTORY_DATE` DATETIME NOT NULL COMMENT "Fecha de alta del historial"
);

DELIMITER $$
CREATE TRIGGER T_NEW_HISTORY AFTER INSERT ON NEWS
FOR EACH ROW
BEGIN
	set @reportero=(SELECT MAX(NEWS_ID) FROM news);
	set @creador=(SELECT (CREATED_BY) FROM news WHERE NEWS_ID = @reportero);
	INSERT INTO `integral_news`.`NEW_HISTORY` ( `HISTORY_TEXT`, `CREATED_BY`, `HISTORY_DATE`)
	VALUES ( CONCAT ('Noticia creada por', @creador), sysdate());

END $$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER T_NEW_UPDATE AFTER UPDATE ON NEWS
FOR EACH ROW
BEGIN
	
    set @reportero=(SELECT MAX(NEWS_ID) FROM news);
	set @creador=(SELECT (CREATED_BY) FROM news WHERE NEWS_ID = @reportero);
    IF OLD.`NEW_STATUS` = '1' AND NEW.`NEW_STATUS` = '2' THEN
		INSERT INTO `integral_news`.`NEW_HISTORY` ( `HISTORY_TEXT`, `CREATED_BY`, `HISTORY_DATE`)
		VALUES ( CONCAT ('Noticia terminada por',  @creador), sysdate());
    END IF;

END $$
DELIMITER ;

DROP TRIGGER T_NEW_UPDATE;
DROP TRIGGER T_NEW_HISTORY;

#-----------------------------------------------------------------------------------------
#-----------------------------------------------------------------------------------------
#-----------------------------------------------------------------------------------------

#-----------------------------------------CATEGORIAS--------------------------------------

CREATE TABLE CATEGORIES (
  `CATEGORY_ID` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPTION` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `COLOR` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT 'Green',
  `ORDER` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`CATEGORY_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;


DELIMITER $$
CREATE PROCEDURE SP_CATEGORIES(
	vOpcion VARCHAR(20),
	vId INT,
	vDescription VARCHAR(100),
    vColor VARCHAR(100)
) BEGIN
	IF vOpcion = 'insertar' THEN
		INSERT INTO CATEGORIES(`DESCRIPTION`, `COLOR`) 
		VALUES(vDescription, vColor);
    END IF;
    IF vOpcion = 'update' THEN
		UPDATE CATEGORIES
			SET `DESCRIPTION` = vDescription, `COLOR` = vColor
		WHERE `CATEGORY_ID` = vId;
    END IF;
    IF vOpcion = 'delete' THEN
		DELETE FROM CATEGORIES
		WHERE `CATEGORY_ID` = vId;
    END IF;
END	$$
DELIMITER ;

SELECT * FROM CATEGORIES;

CREATE TABLE IF NOT EXISTS COLORS (
	`COLOR_ID` INT NOT NULL AUTO_INCREMENT COMMENT "", 
	`COLOR`VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci COMMENT "color de la categoria",
    PRIMARY KEY (COLOR_ID)
);

SELECT * FROM COLORS;
#-----------------------------------------------------------------------------------------
#-----------------------------------------------------------------------------------------
#-----------------------------------------------------------------------------------------

#-----------------------------------------COMENTARIOS--------------------------------------

CREATE TABLE `COMMENT` (
  `ID_COMMENT` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Llave del comentario',
  `FK_NEWS` int(11) NOT NULL COMMENT 'Llave foranea de la noticia',
  `FK_USER` int(11) NOT NULL COMMENT 'Llave foranea del usuario',
  `FK_COMMENT` int(11) DEFAULT NULL COMMENT 'Llave foranea del comentario',
  `CONTENT` varchar(1000) NOT NULL COMMENT 'Contenido del comentario',
  `DATE_CREATION` date NOT NULL,
  `USER_DELETED` TINYINT NOT NULL DEFAULT '0' COMMENT "Si el reportero del comentario fue eliminado o no",
  PRIMARY KEY (`ID_COMMENT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

SELECT * FROM `COMMENT`;


DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_NEWS_COMMENTS`(
    IN vOption	VARCHAR(20),
    IN vFK_USER	INT,
    IN vFK_NEWS INT,
    IN vCONTENT	VARCHAR(200),
    IN vID_COMMENT INT
    )
BEGIN
	IF vOption = 'Insertar' THEN
		INSERT INTO COMMENT(`FK_NEWS`,`FK_USER`,`FK_COMMENT`,`CONTENT`,`DATE_CREATION`)
		VALUES (vFK_NEWS, vFK_USER, vID_COMMENT, vCONTENT, sysdate());
	END IF;
	IF vOption = 'Eliminar' THEN
		DELETE FROM COMMENT WHERE `FK_COMMENT` = vID_COMMENT OR `FK_COMMENT` = vID_COMMENT;
	END IF;
	IF vOption = 'EliminarSOLO' THEN
		DELETE FROM COMMENT WHERE `FK_COMMENT` = vID_COMMENT;
	END IF;
END$$
DELIMITER ;

#-----------------------------------------------------------------------------------------
#-----------------------------------------------------------------------------------------
#-----------------------------------------------------------------------------------------

#-----------------------------------------LIKES-------------------------------------------

CREATE TABLE `NEWS_LIKES` (
	`ID_NEW_LIKE` INT NOT NULL AUTO_INCREMENT COMMENT  "Llave primaria de likes", 
	`NEWS_FK` INT(11) COMMENT "Llave foranea a la tabla NEWS",
	`LIKE` INT(11) DEFAULT '0' COMMENT "Darle like a una noticia",
	`USER_FK` INT(11) COMMENT "Llave foranea a la tabla USERS",
    CONSTRAINT UC_NEWS_LIKES UNIQUE (`USER_FK`, `NEWS_FK`),
	PRIMARY KEY (`ID_NEW_LIKE`)
);

DELIMITER $$
CREATE PROCEDURE `SP_NEWS_LIKES`(
    IN vOption	char(20),
    IN vNEWS_FK	int,
    IN vUSER_FK	int
    )
BEGIN
	IF vOption = 'Gusta' THEN
		INSERT INTO NEWS_LIKES(`NEWS_FK`,`USER_FK`,`LIKE`)
		VALUES (vNEWS_FK,vUSER_FK,1);
		CALL SP_NEWS('likeMas',vNEWS_FK,null,null,null,null,null,null,null,null,null,null,null,null,null,null);      
	END IF;

	IF vOption = 'NoGusta' THEN
		DELETE FROM NEWS_LIKES WHERE `NEWS_FK`= vNEWS_FK AND `USER_FK`= vUSER_FK;  
		CALL SP_NEWS('likeMenos',vNEWS_FK,null,null,null,null,null,null,null,null,null,null,null,null,null,null);        
	END IF;
END$$
DELIMITER ;

SELECT * FROM NEWS_LIKES;
