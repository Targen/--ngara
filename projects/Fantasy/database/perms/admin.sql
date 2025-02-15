-- El rol administrador hereda todo del usuario normal



-- Tablas de lectura y escritura (que no lo fueran ya para el usuario normal):
GRANT
        SELECT,
        INSERT,
        UPDATE,
        DELETE,
        TRUNCATE
ON
        "Fantasy"."Estadio",
        "Fantasy"."Equipo",
        "Fantasy"."Jugador",
        "Fantasy"."Juego",
        "Fantasy"."Estadística de bateo",
        "Fantasy"."Estadística de pitcheo",
        "Fantasy"."Historial_Bateo",
        "Fantasy"."Contenido"
TO "Fantasy (administrador)";

-- Secuencias correspondientes:
GRANT
        USAGE,
        SELECT,
        UPDATE
ON SEQUENCE
        "Fantasy"."Estadio_id_seq",
        "Fantasy"."Equipo_id_seq",
        "Fantasy"."Jugador_id_seq",
        "Fantasy"."Juego_id_seq",
        "Fantasy"."Contenido_id_seq",
        "Fantasy"."Estadística de bateo_id_seq",
        "Fantasy"."Estadística de pitcheo_id_seq",
        "Fantasy"."Historial_Bateo_id_seq"
TO "Fantasy (administrador)";
