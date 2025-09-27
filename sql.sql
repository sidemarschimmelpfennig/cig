SELECT COLUMN_NAME FROM information_schema.columns WHERE TABLE_NAME = 'products' --todas as colunas dessa tabla em  todos os bancos disponiveis
SELECT COLUMN_NAME
FROM information_schema.columns
WHERE TABLE_SCHEMA = DATABASE()  -- pega o banco atualmente em uso
  AND TABLE_NAME = 'products';




  