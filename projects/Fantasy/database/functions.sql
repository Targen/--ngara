CREATE OR REPLACE FUNCTION "Fantasy"."autenticar"(
        IN "username" text,
        IN "password" text
) RETURNS integer
        STABLE
        STRICT
        SECURITY DEFINER
        LANGUAGE SQL
AS $BODY$
        SELECT
                "Fantasy"."Usuario"."id"
        FROM
                "Fantasy"."Usuario",
                "Fantasy"."passwd"
        WHERE
                "Fantasy"."Usuario"."id" = "Fantasy"."passwd"."usuario" AND
                "Fantasy"."Usuario"."username" = $1 AND
                "Fantasy"."passwd"."password" = $2
$BODY$;



-- TODO: manejar errores (parámetros nulos, usuario ya existente, etc)
CREATE OR REPLACE FUNCTION "Fantasy"."registrar"(
        IN "parámetro: username"            text,
        IN "parámetro: nombre completo"     text,
        IN "parámetro: dirección de e-mail" text,
        IN "parámetro: es administrador"    boolean,
        IN "parámetro: password"            text
) RETURNS integer
        VOLATILE
        STRICT
        SECURITY DEFINER
        LANGUAGE 'plpgsql'
AS $BODY$
        BEGIN
                INSERT INTO "Fantasy"."Usuario" (
                        "username",
                        "nombre completo",
                        "dirección de e-mail",
                        "es administrador",
                        "puntaje",
                        "créditos"
                ) VALUES (
                        "parámetro: username",
                        "parámetro: nombre completo",
                        "parámetro: dirección de e-mail",
                        "parámetro: es administrador",
                        0,
                        50000
                );

                INSERT INTO "Fantasy"."passwd"
                SELECT
                        "Fantasy"."Usuario"."id",
                        "parámetro: password"
                FROM
                        "Fantasy"."Usuario"
                WHERE
                        "Fantasy"."Usuario"."username" = "parámetro: username";

                RETURN (SELECT "id" FROM "Fantasy"."Usuario" WHERE "username" = "parámetro: username");
        END;
$BODY$;
