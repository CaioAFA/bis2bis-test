# Teste Bis 2 Bis

## Tecnologias Utilizadas
- Vue JS (frontend)
- PHP (backend)
- Docker (deploy)

# Rodando o projeto
```bash
cd docker
docker-compose up

# Após subir os containeres, instalar o Banco de Dados
docker exec -it mysql_container sh /create-database.sh
```