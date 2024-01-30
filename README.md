# Teste de Habilidades em Laravel

## Objetivo
Avaliar as habilidades do candidato em Laravel, compreensão e análise de requisitos, capacidade de inovação, determinação na busca de soluções e responsabilidade na tomada de decisões.

## Instalação
1. Baixar repositório ( git clone git@github.com:w3sistemas/bukly-test-laravel.git )
1. Rodar o comando ( composer install ) para instalar as dependências necessárias.
1. Rodar as migrates ( php artisan migrate )
1. Rodar o Seeders para as migrates ( php artisan db:seed )
1. Subir servidor local ( php artisan serve ) e acessar http://127.0.0.1:8000.
2. Realizar login na plataforma com as credênciais ( Usuário: admin@bukly.vom, Senha: 123456)

## API

Testar API listar hotéis
http://127.0.0.1:8000/api/hotels ( GET )

Testar API gravar hotel
http://127.0.0.1:8000/api/hotels ( POST Json )

Exemplo de POST

{
"name": "Nome do Hotel",
"address": "Endereço do Hotel",
"city": "Cidade",
"state": "UF",
"zip_code": "CEP",
"website": "http://www.bukly.com"
}
