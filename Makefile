init: down-clear-dev docker-pull docker-build up-dev docker-logs

restart: down-dev up-dev

up-dev:
	docker-compose up -d

down-dev:
	docker-compose down --remove-orphans
down-clear-dev:
	docker-compose down -v --remove-orphans
docker-pull:
	docker-compose pull
docker-build:
	docker-compose build --build-arg USER_ID=1000 --build-arg GROUP_ID=1000
docker-logs:
	docker-compose logs -f
test:
	docker container exec -it demo_bank1_cli ./vendor/bin/phpunit
validate-entities:
	docker container exec -it demo_bank1_cli php slim orm:validate-schema