/*
    Name:       Proyecto Estadias UTL
    
    Version:    1.0
    Date:       15/04/2020 06:50:00 p.m.
    Author:     Huerta Medina Andy Mariano
    Email:      utlandymariano@gmail.com
    Comments:   -----
*/

USE DB_SE_Becas;

DROP PROCEDURE IF EXISTS insertar_empleado;

#Procedimiento almacenado para insertar un Empleado:
DELIMITER $$
CREATE PROCEDURE insertar_empleado (IN v_nombre          VARCHAR(45),
                                    IN v_numero         INT(20),
                                    IN v_puesto         VARCHAR(45),
                                    IN v_departamento   VARCHAR(45),
                                    IN v_correo         VARCHAR(45),
                                    IN v_telefono       VARCHAR(24),
                                    IN v_ext            VARCHAR(10), 
                                    IN v_tipo           VARCHAR(45),                       
                                    OUT v_idUsuario     INT(11),
                                    OUT v_contrasenia   VARCHAR(45))
BEGIN
    #Insertamos en la tabla [Usuarios]:
    INSERT INTO Usuarios (TipoUsuario)
                VALUES (v_tipo);

    #Recuperamos el ID generado en la tabla [Usuarios]:
    SET v_idUsuario = LAST_INSERT_ID();

    #Insertamos en la tabla [Empleados]:
    INSERT INTO Empleados (NomEmpleado, NumEmpleado, Puesto_Cargo, Departamento,
                           CorreoElectronico, Telefono, Ext, IdUsuario)
                VALUES (v_nombre, v_numero, v_puesto, v_departamento,
                        v_correo, v_telefono, v_ext, v_idUsuario);
    
    #Generamos la contrasenia del usuario:
    SET v_contrasenia = CONCAT("Utl-", v_numero);
    
    #Actualizamos en la tabla [Usuarios]:
    UPDATE Usuarios SET Contrasenia = v_contrasenia
                    WHERE IdUsuario = v_idUsuario;
END 
$$
DELIMITER ;

CALL insertar_empleado('Juan hernandez Perez', 17001801, 'Comunicacion', 'Sistemas', 'utlandymariano@gmail.com', 
                        '4773777084', '477', 'Administrador', @usuario, @contrasenia);
                        