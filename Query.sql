//Los parametros de conexión a mi servidor estan en el proyecto, si van a utilizar WAMP o XAMP reemplacen los datos en la clase Connection.php->getConnection()

CREATE TABLE distrito(
	Id INT NOT NULL AUTO_INCREMENT,
	Nombre VARCHAR(150) NOT NULL,
	PRIMARY KEY (Id)
);

INSERT INTO distrito (Nombre) VALUES
    ('San Juan de Lurigancho'),
    ('Rimac');

SELECT * FROM distrito;
