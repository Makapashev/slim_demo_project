init: down-clear-dev docker-pull docker-build up-dev api-init
restart: down-dev up-dev
create-migrations: validate-entities dev-create-migrations
api-init: composer-install migrate fixtures

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
	docker container exec -it demo_bank1_cli php slim orm:validate-schema --skip-sync
dev-create-migrations:
	docker container exec -it demo_bank1_cli php slim migrations:diff
migrate:
	docker container exec -it demo_bank1_cli php slim migrations:migrate --no-interaction
composer-install:
	docker container exec -it demo_bank1_cli composer install
php-cli:
	docker container exec -it demo_bank1_cli sh
fixtures:
	docker container exec -it demo_bank1_cli php slim app:fixtures-load