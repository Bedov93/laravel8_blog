include .env

up:
	@docker-compose -f ${DOCKER_CONFIG} up -d
down:
	@docker-compose -f ${DOCKER_CONFIG} down
build:
	@docker-compose -f ${DOCKER_CONFIG}  up -d --build
show:
	@docker ps
php:
	@docker exec -it ${DOCKER_PHP} bash
composer-update:
	@docker exec -it ${DOCKER_PHP} composer update
composer-dumpautoload:
	@docker exec -it ${DOCKER_PHP} composer dumpautoload
nginx:
	@docker exec -it ${DOCKER_NGINX} bash
mysql:
	@docker exec -it ${DOCKER_MYSQL} bash
df:
	@docker system df
rmi:
	@docker-compose -f ${DOCKER_CONFIG} down && docker rmi $(docker images -q)
artisan:
	@docker exec -it ${DOCKER_PHP} bash -c "./artisan $(args)"
fresh:
	@make artisan args="migrate:fresh --seed"