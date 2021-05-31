<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# Projeto
Projeto de API de endereços para o Brasil, caso seja utilizado um CEP de outro pais não irá retornar o endereço.

# Tecnologias
* Docker
* Laravel
* Composer
* Git
* MariaDB

# Instalação
* Altere o nome do arquivo de .env.example para .env
* Execute o seguite comando: sudo docker-compose up --build -d
* Após o build acesse o docker "teste-revendamais-backend" como seguinte comando
    * sudo docker exec -it teste-revendamais-backend bash
    * winpty docker exec -it teste-revendamais-backend bash (windows)
    * App do docker windows basta clicar no icone '>_' CLI (windows)

## Comandos de permissões
Comandos para liberar permissões nas pastas

* chown -R www-data:www-data bootstrap/cache
* chown -R www-data:www-data storage
* chmod -R 775 storage
* chmod -R 775 bootstrap/cache

## Comandos outros
Execute os comandos seguintes comandos na ordem

* composer install
* php artisan key:generate
* php artisan optimize
* php artisan migrate --seed

## Documentação
https://documenter.getpostman.com/view/4893249/TzXzCcXw#intro
