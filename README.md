# Teste Bis 2 Bis

## Dump do Banco de Dados
Arquivo ./database/generate-script.sql

## Tecnologias Utilizadas
- Vue JS (frontend)
- PHP (backend)
- Docker (deploy)

## Executando o projeto
```bash
cd docker
docker-compose up

# Após subir os containeres, instalar o Banco de Dados
docker exec -it mysql_container sh /create-database.sh
```