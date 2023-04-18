CREATE DATABASE senatimat;
USE senatimat;

CREATE TABLE escuelas
(
	idescuela 		INT AUTO_INCREMENT PRIMARY KEY,
	escuela 			VARCHAR(50) 	NOT NULL,
	CONSTRAINT uk_escuela_esc UNIQUE (escuela)
)ENGINE = INNODB;

INSERT INTO escuelas (escuela) VALUES
	('ETI'), -- 1
	('Administración'), -- 2
	('Metal mecánica'); -- 3

SELECT * FROM escuelas ORDER BY 1;

-- ***** SEGUNDA TABLA ***** --

CREATE TABLE carreras
(
	idcarrera 		INT AUTO_INCREMENT PRIMARY KEY,
	idescuela 		INT 			NOT NULL,
	carrera 			VARCHAR(100)NOT NULL,
	CONSTRAINT fk_idescuela_car FOREIGN KEY (idescuela) REFERENCES escuelas (idescuela),
	CONSTRAINT uk_carrera_car UNIQUE (carrera)
)ENGINE = INNODB;

INSERT INTO carreras (idescuela, carrera) VALUES
	(1, 'Diseño Gráfico Digital'),
	(1, 'Ingeniería de Software con IA'),
	(1, 'Cyberseguridad'),
	(2, 'Administración de empresas'),
	(2, 'Administración Industrial'),
	(2, 'Prevencionista de Riesgo'),
	(3, 'Soldador Universal'),
	(3, 'Mecánico de mantenimiento'),
	(3, 'Soldador estructuras metálicas');

SELECT * FROM carreras ORDER BY 1;

-- ****** TERCERA TABLA ******* --
CREATE TABLE sedes
(
	idsede 		INT AUTO_INCREMENT PRIMARY KEY,
	sede 			VARCHAR(40)		NOT NULL,
	CONSTRAINT uk_sede_sde UNIQUE (sede)
)ENGINE = INNODB;

INSERT INTO sedes (sede) VALUES
	('Chincha'),
	('Pisco'),
	('Ica'),
	('Ayacucho');

SELECT * FROM sedes ORDER BY 1;

-- ******* CUARTA TABLA ********* --
CREATE TABLE estudiantes
(
	idestudiante 		INT AUTO_INCREMENT PRIMARY KEY,
	apellidos			VARCHAR(40)		NOT NULL,
	nombres 			VARCHAR(40)		NOT NULL,
	tipodocumento 		CHAR(1)			NOT NULL DEFAULT 'D',
	nrodocumento		CHAR(8)			NOT NULL,
	fechanacimiento		DATE 			NOT NULL,
	idcarrera 			INT 			NOT NULL,
	idsede 				INT 			NOT NULL,
	fotografia 			VARCHAR(100)	NULL,
	fecharegistro		DATETIME 		NOT NULL DEFAULT NOW(),
	fechaupdate 		DATETIME 		NULL,
	estado 				CHAR(1)			NOT NULL DEFAULT '1',
	CONSTRAINT uk_nrodocumento_est UNIQUE (tipodocumento, nrodocumento),
	CONSTRAINT fk_idcarrera_est FOREIGN KEY (idcarrera) REFERENCES carreras (idcarrera),
	CONSTRAINT fk_idsede_est FOREIGN KEY (idsede) REFERENCES sedes (idsede)
)ENGINE = INNODB;

INSERT INTO estudiantes 
	(apellidos, nombres, nrodocumento, fechanacimiento, idcarrera, idsede) VALUES
	('Martinez', 'Carlos', '44445555', '2000-01-01', 1, 1),
	('Ochoa', 'Fiorella', '77778888', '2000-10-10', 4, 2),
	('Perez', 'Roxana', '88881111', '2001-03-03', 7, 3),
	('Quintana', 'Tania', '33334444', '2001-05-05', 9, 4);

SELECT * FROM estudiantes;

CREATE TABLE cargos
(
	idcargo		INT AUTO_INCREMENT PRIMARY KEY,
	cargo		VARCHAR(50)	NOT NULL,
	CONSTRAINT uk_cargoo_cgo UNIQUE (cargo)
)ENGINE = INNODB;

INSERT INTO cargos(cargo) VALUES
		('Instructor'),
		('Jefe Centro'),
		('Asist. Administrativo'),
		('Asist. Académico'),
		('Coordinador ETIA'),
		('Coordinador CIS');
		
SELECT * FROM cargos;


CREATE TABLE colaboradores
(
	idcolaborador		INT AUTO_INCREMENT PRIMARY KEY,
	apellidos			VARCHAR(40)	NOT NULL,
	nombres				VARCHAR(40)	NOT NULL,
	idcargo				INT 		NOT NULL,
	idsede				INT 		NOT NULL,
	telefono			CHAR(9)		NOT NULL,
	tipocontrato		CHAR(1)		NOT NULL,
	cv					VARCHAR(100)NULL, -- P = Parcial | C = Completo
	direccion			VARCHAR(40)	NOT NULL,
	fecharegistro		DATETIME	NOT NULL DEFAULT NOW(),
	fechaupdate 		DATETIME	NULL,
	estado				CHAR(1)		NOT NULL DEFAULT '1',
	CONSTRAINT fk_idcargo_col FOREIGN KEY (idcargo) REFERENCES cargos (idcargo),
	CONSTRAINT fk_idsede_col FOREIGN KEY (idsede) REFERENCES sedes (idsede)
)ENGINE = INNODB;

INSERT INTO colaboradores (apellidos, nombres, idcargo, idsede, telefono, tipocontrato, direccion) VALUES
		('Choque Perez', 'Miguel', 1, 1, '963741852', 'C', 'Avenida Siempreviva 742');


DELIMITER $$
CREATE PROCEDURE spu_colaboradores_listar()
BEGIN
	SELECT colaboradores.`idcolaborador`, CONCAT(colaboradores.`apellidos`," ",colaboradores.`nombres`)AS 'personas', cargos.`cargo`, sedes.sede, colaboradores.`telefono`, 
		CASE
			WHEN colaboradores.`tipocontrato` = 'P' THEN 'Parcial'
			WHEN colaboradores.`tipocontrato` = 'C' THEN 'Completo'
		END 'tipocontrato',colaboradores.`cv`, colaboradores.`direccion`, colaboradores.`fecharegistro`
		FROM colaboradores
		INNER JOIN cargos ON cargos.`idcargo` = colaboradores.`idsede`
		INNER JOIN sedes  ON sedes.idsede = colaboradores.`idsede` 
		WHERE colaboradores.estado = '1';
END $$

CALL spu_colaboradores_listar;

DELIMITER $$
CREATE PROCEDURE spu_colaboradores_registrar
(				
	IN _apellidos 		VARCHAR(40),
	IN _nombres 		VARCHAR(40),
	IN _idcargo			INT,
	IN _idsede			INT,
	IN _telefono		CHAR(9),
	IN _tipocontrato 	CHAR(1),
	IN _cv				VARCHAR(100),
	IN _direccion 		VARCHAR(40)
)
BEGIN
	-- Validar el contenido de _fotografia
	IF _cv = '' THEN 
		SET _cv = NULL;
	END IF;

	INSERT INTO colaboradores 
	(apellidos, nombres, idcargo, idsede, telefono, tipocontrato, cv, direccion) VALUES
	(_apellidos, _nombres, _idcargo, _idsede, _telefono, _tipocontrato, _cv, _direccion);
END $$

DELIMITER $$
CREATE PROCEDURE spu_cargos_listar()
BEGIN
	SELECT * FROM cargos ORDER BY 1;
END $$

DELIMITER $$
CREATE PROCEDURE spu_colaboradores_eliminar(IN _idcolaborador INT)
BEGIN
	DELETE FROM colaboradores 
	WHERE idcolaborador = _idcolaborador;
END $$


DELIMITER $$
CREATE PROCEDURE spu_getNombre(IN _idcolaborador INT)
BEGIN
	SELECT cv FROM colaboradores 
	WHERE idcolaborador = _idcolaborador;
END $$

CALL spu_getNombre(10);



