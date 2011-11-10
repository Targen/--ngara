CREATE OR REPLACE FUNCTION "Fantasy"."autenticar"(IN "nombre de usuario" text, IN "password" text) RETURNS integer
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
                "Fantasy"."Usuario"."nombre"  = $1                           AND
                "Fantasy"."Usuario"."id"      = "Fantasy"."passwd"."usuario" AND
                "Fantasy"."passwd"."password" = $2
$BODY$;



CREATE OR REPLACE FUNCTION "Fantasy"."registrar"(IN "nombre de usuario" text, IN "password" text) RETURNS void
        VOLATILE
        STRICT
        SECURITY DEFINER
        LANGUAGE SQL
AS $BODY$
        INSERT INTO "Fantasy"."passwd"
        SELECT
                "Fantasy"."Usuario"."id",
                $2
        FROM
                "Fantasy"."Usuario"
        WHERE
                "nombre" = $1
$BODY$;
