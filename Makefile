SHELL = /bin/bash
GITNAME = $$(git config user.name)
PROJECT= "rgr-scrapping-api"
NOW= "$$(date +%d-%m-%Y:%T)"
RGR-SCRAPPING-BACKEND:=rgr-scrapping-backend

current-dir := $(dir $(abspath $(lastword $(MAKEFILE_LIST))))

.PHONY: help
help: ## Display this help message
	@cat $(MAKEFILE_LIST) | grep -e "^[a-zA-Z_\-]*: *.*## *" | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'

.PHONY: database-reset
database-reset: ## Drop and migrate database
	docker exec -it ${RGR-SCRAPPING-BACKEND} sh -c "php bin/console doctrine:database:drop --force --if-exists"
	docker exec -it ${RGR-SCRAPPING-BACKEND} sh -c "php bin/console doctrine:database:create"
	docker exec -it ${RGR-SCRAPPING-BACKEND} sh -c "php bin/console doctrine:migrations:migrate -n"

.PHONY: clear-cache
clear-cache: ## Clear all kind of cache
	docker exec -it ${RGR-SCRAPPING-BACKEND} sh -c "php bin/console cache:clear"
	docker exec -it ${RGR-SCRAPPING-BACKEND} sh -c "php bin/console cache:warmup"
	docker exec -it ${RGR-SCRAPPING-BACKEND} sh -c "php bin/console doctrine:cache:clear-metadata"
	docker exec -it ${RGR-SCRAPPING-BACKEND} sh -c "php bin/console doctrine:cache:clear-query"
	docker exec -it ${RGR-SCRAPPING-BACKEND} sh -c "php bin/console doctrine:cache:clear-result"