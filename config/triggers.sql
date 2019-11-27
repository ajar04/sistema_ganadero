CREATE TRIGGER calcular_peso_leche
AFTER INSERT
   ON peso_leche FOR EACH ROW

BEGIN

   DECLARE peso int(10);

   -- Find username of person performing the INSERT into table
   SELECT USER() INTO peso;

   -- Insert record into audit table
   INSERT INTO peso_leche
   ( peso_leche.peso_perdido)
   VALUES
   ( peso=peso_leche.peso_am-peso_leche.peso_pm);

END;