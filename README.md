# Teste Bis 2 Bis

## Dump do Banco de Dados
Arquivo ./database/generate-script.sql

## Tecnologias Utilizadas
- Vue JS (frontend)
- PHP (backend)
- Docker (deploy)

## Executando o projeto
```bash
# Dando permissão a pasta de Dumps
chmod 777 php-backend/dumps

cd docker

# Dando permissões para os arquivos entrypoint
chmod +x */*.sh

docker-compose up

# Após subir os containeres, instalar o Banco de Dados
docker exec -it mysql_container sh /create-database.sh

# Acesse http://localhost no seu navegador
```

Usuário para acessar o painel administrativo:
- **Usuário**: caio.arrabal@gmail.com
- **Senha:** 123456
