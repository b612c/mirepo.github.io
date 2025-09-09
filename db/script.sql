DROP DATABASE dbcrud3;
CREATE DATABASE dbcrud3;
USE dbcrud3;

CREATE TABLE usuario(
    idusu bigint(11),
    ndoc bigint(10), 
    nomusu varchar(20),
    email varchar(255),
    tel int(10),
    pass varchar(255),
    direc varchar(255),
    fecnac date,
    actper int(1),
    sexo varchar(1),
    estado bigint(11)
);

CREATE TABLE dominio(
    domid bigint(11),
    nomdom varchar(255)
);

CREATE TABLE valor(
    valid bigint(11),
    nomval varchar(255),
    domid bigint(11) 
);

CREATE TABLE modulo(
    modid bigint(11),
    modnm varchar(255),
    modimg varchar(255),
    modact int(1),
    pgid bigint(11)
);
INSERT INTO modulo (modid, modnm, modimg, modact, pgid) VALUES
(1, 'Configuración', '', 1, 1001);


CREATE TABLE pagina(
    pgid bigint(11),
    pgnom varchar(255),
    pgarc varchar(255),
    pgmos int(1),
    pgord int(10),
    pgmen varchar(50),
    icono varchar(255),
    modid bigint(11)
);
INSERT INTO pagina (pgid, pgnom, pgarc, pgmos, pgord, pgmen, icono, modid) VALUES
(1001, 'Usuarios', 'views/vusu.php', 1, 1, 'home.php', '', 1);


CREATE TABLE perfil(
    pefid bigint(11),
    pefnm varchar(255),
    modid bigint(11),
    pgid bigint(11)
);

CREATE TABLE pfxus(
    idusu bigint(11),
    pefid bigint(11)
);

CREATE TABLE pgxpf(
    pgid bigint(11),
    pefid bigint(11)
);


ALTER TABLE usuario
    ADD PRIMARY KEY (idusu);

ALTER TABLE dominio
    ADD PRIMARY KEY (domid);

ALTER TABLE valor
    ADD PRIMARY KEY (valid),
    ADD KEY fk_val_domid (domid);

ALTER TABLE modulo 
    ADD PRIMARY KEY (modid);

ALTER TABLE pagina 
    ADD PRIMARY KEY (pgid),
    ADD KEY fk_pg_modid (modid);

ALTER TABLE perfil
    ADD PRIMARY KEY (pefid),
    ADD KEY fk_pf_modid (modid);

ALTER TABLE pfxus
    ADD KEY fk_pfxus_idusu (idusu),
    ADD KEY fk_pfxus_pefid (pefid);

ALTER TABLE pgxpf
    ADD KEY fk_pgxpef_pgid (pgid),
    ADD KEY fk_pgxpef_pefid (pefid);


ALTER TABLE usuario
    MODIFY idusu bigint(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE dominio
    MODIFY domid bigint(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE valor
    MODIFY valid bigint(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE modulo
    MODIFY modid bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 2;

ALTER TABLE perfil
    MODIFY pefid bigint(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE valor 
    ADD CONSTRAINT fk_val_domid FOREIGN KEY (domid) REFERENCES dominio (domid);

ALTER TABLE pagina
    ADD CONSTRAINT fk_pg_modid FOREIGN KEY (modid) REFERENCES modulo (modid);

ALTER TABLE perfil
    ADD CONSTRAINT fk_pf_modid FOREIGN KEY (modid) REFERENCES modulo (modid);

ALTER TABLE pfxus
    ADD CONSTRAINT fk_pfxus_idusu FOREIGN KEY (idusu) REFERENCES usuario (idusu),
    ADD CONSTRAINT fk_pfxus_pefid FOREIGN KEY (pefid) REFERENCES perfil (pefid);

ALTER TABLE pgxpf
    ADD CONSTRAINT fk_pgxpef_pgid FOREIGN KEY (pgid) REFERENCES pagina (pgid),
    ADD CONSTRAINT fk_pgxpef_pefid FOREIGN KEY (pefid) REFERENCES perfil (pefid);


