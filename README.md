# Rodando o projeto
```bash
cd docker
docker-compose up

# Após subir os containeres, instalar o Banco de Dados
docker exec -it mysql_container sh /create-database.sh
```