
INSERT INTO `personas` (`cedula`, `p_nombre`, `s_nombre`, `p_apellido`, `s_apellido`, `fecha_nacimiento`, `lugar_nacimiento`, `genero`, `estado_civil`, `email`, `grado_academico`) VALUES ('V27919560', 'Elber', 'Alonso', 'Rondón', 'Hernández', '2001-05-05', 'Mérida', 'M', 'Soltero', 'earh_2001@outlook.com', 'Universitario');


INSERT INTO `usuarios` (`cedula_persona`, `rol`, `privilegios`, `contraseña`, `pregunta_seg_1`, `respuesta_1`, `pregunta_seg_2`, `respuesta_2`) VALUES ('V27919566', 'Desarrollador', '0', '12345', 'Ciudad donde naciste', 'merida', 'b', 'b');
