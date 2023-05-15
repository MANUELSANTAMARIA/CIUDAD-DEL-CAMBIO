CREATE DATABASE ciudades_cambio COLLATE = utf8_unicode_ci;

CREATE TABLE tipoUsuario(
    id_tipo_us int(255) auto_increment NOT NULL,
    nombre_tipo_us varchar(100) NOT NULL,
    CONSTRAINT pk_tipo_usuario PRIMARY KEY(id_tipo_us)
)ENGINE=InnoDb;

CREATE TABLE institucion(
    id_tipo_institucion int(255) auto_increment NOT NULL,
    nombre_institucion varchar(255) NOT NULL,
    CONSTRAINT pk_tipo_institucion PRIMARY key(id_tipo_institucion)
)ENGINE=InnoDb;


CREATE TABLE usuario(
    id_us int(255) auto_increment NOT NULL,
    nombre_us varchar(50) NOT NULL,
    apellido_us varchar(50) NOT NULL,
    edad_us date NOT NULL,
    dni_us int(12) NOT NULL,
    sexo_us varchar(50) NOT NULL,
    email_us varchar(100) NOT NULL,
    contrasena_us varchar(100) NOT NULL,
    us_institucion int(255) NOT NULL,
    us_tipo int(255)  NOT NULL,
    CONSTRAINT pk_usuario PRIMARY KEY(id_us),
    CONSTRAINT uq_email_us UNIQUE(email_us),
    CONSTRAINT fk_usuario_institucion FOREIGN KEY(us_institucion) REFERENCES institucion(id_tipo_institucion),
    CONSTRAINT fk_usuario_tipoUsuario FOREIGN KEY(us_tipo) REFERENCES tipoUsuario(id_tipo_us) 
)ENGINE=InnoDb;






-- MODELA TABLA PROVINCIA, CANTON Y PARROQUI (Código del Ecuador: 593)
CREATE TABLE provincia(
    id_provincia int auto_increment NOT NULL,
    -- codigo: el código de tres dígitos de la provincia (por ejemplo, "19")
    cod_provincia varchar(3) NOT NULL,
    nombre_provincia varchar(70) NOT NULL,
    CONSTRAINT pk_id_provincia PRIMARY KEY(id_provincia)
)ENGINE=InnoDb;


CREATE TABLE canton(
    id_canton int auto_increment NOT NULL,
    -- codigo: el código de tres dígitos del cantón (por ejemplo, "1701")
    cod_canton varchar(3) NOT NULL,
    nombre_canton varchar(70) NOT NULL,
    provincia_id int(250) NOT NULL,
    CONSTRAINT pk_id_canton PRIMARY KEY(id_canton),
    CONSTRAINT fk_provincia_id FOREIGN KEY(provincia_id) REFERENCES provincia(id_provincia)
)ENGINE=InnoDb;




CREATE TABLE urbano_rurral(
  id_urbano_rurral int auto_increment NOT NULL, 
  nombre varchar(70) NOT NULL,
)ENGINE=InnoDb;


CREATE TABLE parroquia(
    id_parroquia int auto_increment NOT NULL,
    -- codigo: el código de cuatro dígitos de la parroquia (por ejemplo, "170101")
    cod_parroquia varchar(4) NOT NULL,
    nombre_parroquia varchar(70) NOT NULL,
    canton_id int(250) NOT NULL,
    urbano_rurral_id
    CONSTRAINT pk_id_parroquia PRIMARY KEY(id_parroquia),
    CONSTRAINT fk_canton_id FOREIGN KEY(canton_id) REFERENCES canton(id_canton)
    CONSTRAINT fk_urbano_rurral_id FOREIGN KEY(urbano_rurral_id) REFERENCES urbano_rurral( id_urbano_rurral)

)ENGINE=InnoDb;


CREATE TABLE estados_proyecto(
    id_estado_proyecto int auto_increment NOT NULL,
    nombre_estado_proyecto varchar(70) NOT NULL,
    CONSTRAINT pk_id_estado_proyecto PRIMARY KEY(id_estado_proyecto)
)ENGINE=InnoDb;

CREATE TABLE proyecto(
    id_proyecto int(255) auto_increment NOT NULL,
    cod_proyecto varchar(4) NOT NULL,
    nombre_proyecto varchar(70) NOT NULL,
    descripcion_proyecto varchar(255) NULL,
    fecha_proyecto date NOT NULL,
    estado_proyecto int(50) NOT NULL,
)ENGINE=InnoDb;



CREATE TABLE HITOS(
   id_hito int(255)  auto_increment NOT NULL,
   cod_hito 
)