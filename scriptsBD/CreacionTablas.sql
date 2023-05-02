CREATE TABLE CAT_TipoUsuario(
ID_TIPO_USUARIO TINYINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
tipoUsuario VARCHAR(30) DEFAULT '') ENGINE=INNODB COMMENT 'Tabla creada el 22-04-2023 por Ing. Julia Leticia Sanchez Sanchez.';

CREATE TABLE CAT_ISR(
ID_ISR TINYINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
Rango MEDIUMINT UNSIGNED DEFAULT 0,
Porcentaje TINYINT UNSIGNED DEFAULT 0) ENGINE=INNODB COMMENT 'Tabla creada el 22-04-2023 por Ing. Julia Leticia Sanchez Sanchez.';

CREATE TABLE CAT_Jornada(
ID_JORNADA TINYINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
horasXdia TINYINT UNSIGNED DEFAULT 0,
diasXsemana TINYINT UNSIGNED DEFAULT 0) ENGINE=INNODB COMMENT 'Tabla creada el 22-04-2023 por Ing. Julia Leticia Sanchez Sanchez.';

CREATE TABLE Usuario(
ID_USUARIO TINYINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
correoElectronico VARCHAR(50) DEFAULT '',
contrasenia VARCHAR(255) DEFAULT '1234',
FK_ID_TIPO_USUARIO TINYINT UNSIGNED DEFAULT 0,
estatus VARCHAR(10) DEFAULT 'activo',
usuarioAlta MEDIUMINT UNSIGNED DEFAULT 1,
fechaAlta DATETIME DEFAULT CURRENT_TIMESTAMP,
usuarioModificacion MEDIUMINT UNSIGNED DEFAULT 0,
fechaUltimaModificacion DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
usuarioBaja MEDIUMINT UNSIGNED DEFAULT 0,
fechaBaja DATETIME DEFAULT '2000-01-01 00:00:00',
INDEX (FK_ID_TIPO_USUARIO DESC, fechaAlta DESC, fechaUltimaModificacion DESC, fechaBaja DESC),
FOREIGN KEY (FK_ID_TIPO_USUARIO) REFERENCES CAT_TipoUsuario(ID_TIPO_USUARIO) ON DELETE RESTRICT ON UPDATE CASCADE) 
ENGINE=INNODB COMMENT 'Tabla creada el 22-04-2023 por Ing. Julia Leticia Sanchez Sanchez. Valores por defecto: 1)contrasenia="1234" 2)estatus="activo" 
3)usuarioAlta=1 <<Administrador>> 4)fechaAlta=CURRENT_TIMESTAMP 5)usuarioModificacion=0 
6)fechaUltimaModificacion=CURRENT_TIMESTAMP <<Al crear y al actualizar>> 7)usuarioBaja=0 
8)fechaBaja="2000-01-01 00:00:00" El estatus queda de la siguiente forma: estatus=["activo" | "inactivo"]';

CREATE TABLE Rol(
ID_ROL TINYINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
rol VARCHAR(50) DEFAULT '',
FK_ID_JORNADA TINYINT UNSIGNED DEFAULT 0,
pagoXhora SMALLINT UNSIGNED DEFAULT 0,
pagoXentrega SMALLINT UNSIGNED DEFAULT 0,
bonoXhora SMALLINT UNSIGNED DEFAULT 0,
porcVales TINYINT UNSIGNED DEFAULT 0,
estatus VARCHAR(10) DEFAULT 'activo',
usuarioAlta MEDIUMINT UNSIGNED DEFAULT 1,
fechaAlta DATETIME DEFAULT CURRENT_TIMESTAMP,
usuarioModificacion MEDIUMINT UNSIGNED DEFAULT 0,
fechaUltimaModificacion DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
usuarioBaja MEDIUMINT UNSIGNED DEFAULT 0,
fechaBaja DATETIME DEFAULT '2000-01-01 00:00:00',
INDEX (FK_ID_JORNADA DESC, fechaAlta DESC, fechaUltimaModificacion DESC, fechaBaja DESC),
FULLTEXT INDEX (rol),
FOREIGN KEY (FK_ID_JORNADA) REFERENCES CAT_Jornada(ID_JORNADA) ON DELETE RESTRICT ON UPDATE CASCADE) 
ENGINE=INNODB COMMENT 'Tabla creada el 22-04-2023 por Ing. Julia Leticia Sanchez Sanchez. Valores por defecto: 1)estatus="activo" 
2)usuarioAlta=1 <<Administrador>> 3)fechaAlta=CURRENT_TIMESTAMP 4)usuarioModificacion=0 
5)fechaUltimaModificacion=CURRENT_TIMESTAMP <<Al crear y al actualizar>> 6)usuarioBaja=0 
7)fechaBaja="2000-01-01 00:00:00". El estatus queda de la siguiente forma: estatus=["activo" | "inactivo"]';

CREATE TABLE Empleado(
ID_EMPLEADO VARCHAR(18) NOT NULL PRIMARY KEY,
nombre VARCHAR (50) DEFAULT '',
primerApellido VARCHAR (50) DEFAULT '',
segundoApellido VARCHAR (50) DEFAULT '',
FK_ID_ROL TINYINT UNSIGNED DEFAULT 0,
estatus VARCHAR(10) DEFAULT 'activo',
usuarioAlta MEDIUMINT UNSIGNED DEFAULT 1,
fechaAlta DATETIME DEFAULT CURRENT_TIMESTAMP,
usuarioModificacion MEDIUMINT UNSIGNED DEFAULT 0,
fechaUltimaModificacion DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
usuarioBaja MEDIUMINT UNSIGNED DEFAULT 0,
fechaBaja DATETIME DEFAULT '2000-01-01 00:00:00',
INDEX (FK_ID_ROL DESC, fechaAlta DESC, fechaUltimaModificacion DESC, fechaBaja DESC),
FOREIGN KEY (FK_ID_ROL) REFERENCES Rol(ID_ROL) ON DELETE RESTRICT ON UPDATE CASCADE) 
ENGINE=INNODB COMMENT 'Tabla creada el 22-04-2023 por Ing. Julia Leticia Sanchez Sanchez. Valores por defecto: 1)estatus="activo" 
2)usuarioAlta=1 <<Administrador>> 3)fechaAlta=CURRENT_TIMESTAMP 4)usuarioModificacion=0 
5)fechaUltimaModificacion=CURRENT_TIMESTAMP <<Al crear y al actualizar>> 6)usuarioBaja=0 
7)fechaBaja="2000-01-01 00:00:00". El estatus queda de la siguiente forma: estatus=["activo" | "inactivo"]';

CREATE TABLE Sueldo(
ID_SUELDO MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
anio SMALLINT UNSIGNED DEFAULT 0,
mes TINYINT UNSIGNED DEFAULT 1 CHECK (mes >= 1 AND mes <= 12),
horasTrabajadas SMALLINT UNSIGNED DEFAULT 0,
sueldoBase MEDIUMINT UNSIGNED DEFAULT 0,
montoXentregas MEDIUMINT UNSIGNED DEFAULT 0,
montoXbonos MEDIUMINT UNSIGNED DEFAULT 0,
FK_ID_ISR TINYINT UNSIGNED DEFAULT 0,
montoXretenciones MEDIUMINT UNSIGNED DEFAULT 0,
montoXvales MEDIUMINT UNSIGNED DEFAULT 0,
montoSueldo MEDIUMINT UNSIGNED DEFAULT 0,
FK_ID_EMPLEADO VARCHAR(18) DEFAULT '',
estatus VARCHAR(10) DEFAULT 'activo',
usuarioAlta MEDIUMINT UNSIGNED DEFAULT 1,
fechaAlta DATETIME DEFAULT CURRENT_TIMESTAMP,
usuarioModificacion MEDIUMINT UNSIGNED DEFAULT 0,
fechaUltimaModificacion DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
usuarioBaja MEDIUMINT UNSIGNED DEFAULT 0,
fechaBaja DATETIME DEFAULT '2000-01-01 00:00:00',
INDEX (FK_ID_EMPLEADO DESC, FK_ID_ISR DESC, anio DESC, mes DESC, fechaAlta DESC, fechaUltimaModificacion DESC, fechaBaja DESC),
FOREIGN KEY (FK_ID_ISR) REFERENCES CAT_ISR(ID_ISR) ON DELETE RESTRICT ON UPDATE CASCADE,
FOREIGN KEY (FK_ID_EMPLEADO) REFERENCES Empleado(ID_EMPLEADO) ON DELETE RESTRICT ON UPDATE CASCADE) 
ENGINE=INNODB COMMENT 'Tabla creada el 22-04-2023 por Ing. Julia Leticia Sanchez Sanchez. Valores por defecto: 1)mes=1, 2)estatus="activo" 
3)usuarioAlta=1 <<Administrador>> 4)fechaAlta=CURRENT_TIMESTAMP 5)usuarioModificacion=0 
6)fechaUltimaModificacion=CURRENT_TIMESTAMP <<Al crear y al actualizar>> 7)usuarioBaja=0 
8)fechaBaja="2000-01-01 00:00:00". El estatus queda de la siguiente forma: estatus=["activo" | "inactivo"]. El mes debe tener valores entre 1 y 12.';
