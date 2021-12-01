-- administrador
-- contraseña para todas aA12345678

INSERT INTO `administrador` VALUES ('18214219', 'Antonio Rodríguez', '406862437', 'example@example.com', 'b7f786b67376a62c39cb3673e3beba8e');



-- municipalidad
INSERT INTO `municipalidad` VALUES ('00000001', 'Municipalidad de Concepción', '18214219', 'Barros Arana 2054', '714961999');



-- persona
-- contraseña para todas aA12345678

INSERT INTO `persona` VALUES ('21635901', '00000001', 'Romina Gonzales', '684670121', 'example@example.com', 'b7f786b67376a62c39cb3673e3beba8e');
INSERT INTO `persona` VALUES ('17304294', '00000001', 'Javier Saveedra', '933610849', 'example@example.com', 'b7f786b67376a62c39cb3673e3beba8e');
INSERT INTO `persona` VALUES ('17363450', '00000001', 'Sebastián Sepulveda', '646464668', 'example@example.com', 'b7f786b67376a62c39cb3673e3beba8e');
INSERT INTO `persona` VALUES ('16011528', '00000001', 'Manuel Pablete', '270574487', 'example@example.com', 'b7f786b67376a62c39cb3673e3beba8e');
INSERT INTO `persona` VALUES ('17980287', '00000001', 'Víctor Victorian', '291962521', 'example@example.com', 'b7f786b67376a62c39cb3673e3beba8e');
INSERT INTO `persona` VALUES ('15834503', '00000001', 'María Yañez', '608075596', 'example@example.com', 'b7f786b67376a62c39cb3673e3beba8e');
INSERT INTO `persona` VALUES ('17091463', '00000001', 'Josefina Rodríguez', '901614577', 'example@example.com', 'b7f786b67376a62c39cb3673e3beba8e');
INSERT INTO `persona` VALUES ('17471486', '00000001', 'Anaís Gonzales', '119180156', 'example@example.com', 'b7f786b67376a62c39cb3673e3beba8e');
INSERT INTO `persona` VALUES ('19929623', '00000001', 'Antonio Gonzales', '928510083', 'example@example.com', 'b7f786b67376a62c39cb3673e3beba8e');
INSERT INTO `persona` VALUES ('15449703', '00000001', 'Romina Saveedra', '919866955', 'example@example.com', 'b7f786b67376a62c39cb3673e3beba8e');
INSERT INTO `persona` VALUES ('18497457', '00000001', 'Javier Sepulveda', '801893602', 'example@example.com', 'b7f786b67376a62c39cb3673e3beba8e');
INSERT INTO `persona` VALUES ('15280778', '00000001', 'Sebastián Pablete', '881789608', 'example@example.com', 'b7f786b67376a62c39cb3673e3beba8e');
INSERT INTO `persona` VALUES ('18636634', '00000001', 'Manuel Victorian', '296130383', 'example@example.com', 'b7f786b67376a62c39cb3673e3beba8e');
INSERT INTO `persona` VALUES ('16223847', '00000001', 'Víctor Yañez', '896004361', 'example@example.com', 'b7f786b67376a62c39cb3673e3beba8e');
INSERT INTO `persona` VALUES ('20650020', '00000001', 'María Rodríguez', '450292870', 'example@example.com', 'b7f786b67376a62c39cb3673e3beba8e');
INSERT INTO `persona` VALUES ('17859782', '00000001', 'Josefina Gonzales', '252722811', 'example@example.com', 'b7f786b67376a62c39cb3673e3beba8e');
INSERT INTO `persona` VALUES ('15681646', '00000001', 'Anaís Saveedra', '156559191', 'example@example.com', 'b7f786b67376a62c39cb3673e3beba8e');
INSERT INTO `persona` VALUES ('19891318', '00000001', 'Antonio Saveedra', '495748262', 'example@example.com', 'b7f786b67376a62c39cb3673e3beba8e');
INSERT INTO `persona` VALUES ('19420603', '00000001', 'Romina Sepulveda', '412554382', 'example@example.com', 'b7f786b67376a62c39cb3673e3beba8e');
INSERT INTO `persona` VALUES ('19053854', '00000001', 'Javier Pablete', '227999363', 'example@example.com', 'b7f786b67376a62c39cb3673e3beba8e');



-- encargado
INSERT INTO `encargado` VALUES ('18326222', 'Sebastián Victorian', '587017544', 'example@example.com', 'b7f786b67376a62c39cb3673e3beba8e');
INSERT INTO `encargado` VALUES ('18984036', 'Manuel Yañez', '414287402', 'example@example.com', 'b7f786b67376a62c39cb3673e3beba8e');
INSERT INTO `encargado` VALUES ('20503856', 'Víctor Rodríguez', '997141376', 'example@example.com', 'b7f786b67376a62c39cb3673e3beba8e');
INSERT INTO `encargado` VALUES ('20943098', 'María Gonzales', '832560716', 'example@example.com', 'b7f786b67376a62c39cb3673e3beba8e');



-- departamento
INSERT INTO `departamento` VALUES ('SLJmU9QI', '00000001', '18326222', 'Salud');
INSERT INTO `departamento` VALUES ('FsJPSudE', '00000001', '18984036', 'Recursos Humanos');
INSERT INTO `departamento` VALUES ('hxK20uNV', '00000001', '20943098', 'Contabilidad');
INSERT INTO `departamento` VALUES ('rGNZLL5t', '00000001', '20503856', 'Laboral');



-- solicitud
INSERT INTO `solicitud` VALUES (1, 'FsJPSudE', '17859782', 'Felicitaciones', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Procesando', '2021-02-13 17:38:00');
INSERT INTO `solicitud` VALUES (2, 'SLJmU9QI', '19420603', 'Felicitaciones', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Procesando', '2021-04-20 17:58:00');
INSERT INTO `solicitud` VALUES (3, 'rGNZLL5t', '20650020', 'Sugerencia', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Nuevo', '2021-01-10 12:23:00');
INSERT INTO `solicitud` VALUES (4, 'SLJmU9QI', '19420603', 'Felicitaciones', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Resuelto', '2021-09-21 13:03:00');
INSERT INTO `solicitud` VALUES (5, 'SLJmU9QI', '15834503', 'Felicitaciones', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Procesando', '2021-03-01 08:56:00');
INSERT INTO `solicitud` VALUES (6, 'rGNZLL5t', '20650020', 'Felicitaciones', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Resuelto', '2021-04-25 11:34:00');
INSERT INTO `solicitud` VALUES (7, 'FsJPSudE', '18636634', 'Sugerencia', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Resuelto', '2021-01-26 09:58:00');
INSERT INTO `solicitud` VALUES (8, 'SLJmU9QI', '19053854', 'Reclamo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Resuelto', '2021-04-03 10:29:00');
INSERT INTO `solicitud` VALUES (9, 'rGNZLL5t', '15681646', 'Felicitaciones', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Resuelto', '2021-05-15 15:52:00');
INSERT INTO `solicitud` VALUES (10, 'FsJPSudE', '17471486', 'Sugerencia', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Resuelto', '2021-03-14 19:45:00');
INSERT INTO `solicitud` VALUES (11, 'SLJmU9QI', '17471486', 'Felicitaciones', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Resuelto', '2021-06-11 08:34:00');
INSERT INTO `solicitud` VALUES (12, 'FsJPSudE', '15681646', 'Sugerencia', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Nuevo', '2021-04-16 15:41:00');
INSERT INTO `solicitud` VALUES (13, 'FsJPSudE', '17471486', 'Reclamo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Resuelto', '2021-03-19 08:15:00');
INSERT INTO `solicitud` VALUES (14, 'hxK20uNV', '21635901', 'Felicitaciones', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Visto', '2021-04-20 08:02:00');
INSERT INTO `solicitud` VALUES (15, 'SLJmU9QI', '17091463', 'Reclamo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Resuelto', '2021-05-22 18:25:00');
INSERT INTO `solicitud` VALUES (16, 'rGNZLL5t', '21635901', 'Sugerencia', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Resuelto', '2021-08-07 12:41:00');
INSERT INTO `solicitud` VALUES (17, 'SLJmU9QI', '17859782', 'Felicitaciones', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Procesando', '2021-07-14 17:34:00');
INSERT INTO `solicitud` VALUES (18, 'hxK20uNV', '18497457', 'Reclamo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Visto', '2021-04-21 17:29:00');
INSERT INTO `solicitud` VALUES (19, 'FsJPSudE', '15280778', 'Felicitaciones', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Visto', '2021-04-09 17:45:00');
INSERT INTO `solicitud` VALUES (20, 'FsJPSudE', '17091463', 'Felicitaciones', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Resuelto', '2021-03-25 13:46:00');
INSERT INTO `solicitud` VALUES (21, 'hxK20uNV', '19053854', 'Sugerencia', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Procesando', '2021-08-23 08:20:00');
INSERT INTO `solicitud` VALUES (22, 'rGNZLL5t', '17980287', 'Reclamo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Procesando', '2021-05-11 16:01:00');
INSERT INTO `solicitud` VALUES (23, 'SLJmU9QI', '17304294', 'Reclamo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Resuelto', '2021-09-19 18:20:00');
INSERT INTO `solicitud` VALUES (24, 'hxK20uNV', '18497457', 'Reclamo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Resuelto', '2021-05-06 13:27:00');
INSERT INTO `solicitud` VALUES (25, 'rGNZLL5t', '15280778', 'Sugerencia', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Visto', '2021-07-06 11:17:00');
INSERT INTO `solicitud` VALUES (26, 'rGNZLL5t', '19420603', 'Sugerencia', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Visto', '2021-04-24 13:43:00');
INSERT INTO `solicitud` VALUES (27, 'FsJPSudE', '17304294', 'Reclamo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Procesando', '2021-11-08 14:29:00');
INSERT INTO `solicitud` VALUES (28, 'rGNZLL5t', '19053854', 'Sugerencia', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Nuevo', '2021-09-15 09:13:00');
INSERT INTO `solicitud` VALUES (29, 'SLJmU9QI', '19891318', 'Felicitaciones', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Resuelto', '2021-03-05 19:16:00');
INSERT INTO `solicitud` VALUES (30, 'SLJmU9QI', '15681646', 'Felicitaciones', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Resuelto', '2021-10-01 09:34:00');
INSERT INTO `solicitud` VALUES (31, 'rGNZLL5t', '19929623', 'Reclamo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Procesando', '2021-06-11 16:11:00');
INSERT INTO `solicitud` VALUES (32, 'hxK20uNV', '16223847', 'Sugerencia', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Nuevo', '2021-07-06 13:51:00');
INSERT INTO `solicitud` VALUES (33, 'FsJPSudE', '19420603', 'Felicitaciones', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Resuelto', '2021-02-15 12:17:00');
INSERT INTO `solicitud` VALUES (34, 'rGNZLL5t', '15681646', 'Reclamo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Visto', '2021-07-16 10:35:00');
INSERT INTO `solicitud` VALUES (35, 'hxK20uNV', '19891318', 'Felicitaciones', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Visto', '2021-05-07 17:46:00');
INSERT INTO `solicitud` VALUES (36, 'SLJmU9QI', '19053854', 'Sugerencia', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Nuevo', '2021-03-24 12:47:00');
INSERT INTO `solicitud` VALUES (37, 'FsJPSudE', '17471486', 'Felicitaciones', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Visto', '2021-02-25 11:50:00');
INSERT INTO `solicitud` VALUES (38, 'FsJPSudE', '19929623', 'Sugerencia', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Nuevo', '2021-10-03 18:43:00');
INSERT INTO `solicitud` VALUES (39, 'rGNZLL5t', '17980287', 'Reclamo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Nuevo', '2021-06-19 13:32:00');
INSERT INTO `solicitud` VALUES (40, 'SLJmU9QI', '15834503', 'Sugerencia', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Resuelto', '2021-02-01 19:48:00');
INSERT INTO `solicitud` VALUES (41, 'SLJmU9QI', '19929623', 'Reclamo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Procesando', '2021-11-03 13:31:00');
INSERT INTO `solicitud` VALUES (42, 'rGNZLL5t', '21635901', 'Felicitaciones', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Visto', '2021-03-03 17:04:00');
INSERT INTO `solicitud` VALUES (43, 'rGNZLL5t', '21635901', 'Reclamo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Visto', '2021-03-04 19:40:00');
INSERT INTO `solicitud` VALUES (44, 'FsJPSudE', '19891318', 'Sugerencia', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Procesando', '2021-05-19 15:20:00');
INSERT INTO `solicitud` VALUES (45, 'rGNZLL5t', '19929623', 'Felicitaciones', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Procesando', '2021-04-07 19:26:00');
INSERT INTO `solicitud` VALUES (46, 'SLJmU9QI', '19929623', 'Sugerencia', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Procesando', '2021-09-12 09:48:00');
INSERT INTO `solicitud` VALUES (47, 'hxK20uNV', '15280778', 'Reclamo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Resuelto', '2021-08-08 16:20:00');
INSERT INTO `solicitud` VALUES (48, 'hxK20uNV', '16011528', 'Felicitaciones', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Procesando', '2021-02-06 19:19:00');
INSERT INTO `solicitud` VALUES (49, 'rGNZLL5t', '20650020', 'Sugerencia', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Visto', '2021-04-03 11:53:00');
INSERT INTO `solicitud` VALUES (50, 'rGNZLL5t', '19891318', 'Reclamo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Procesando', '2021-08-15 09:13:00');



