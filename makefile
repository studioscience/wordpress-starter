.PHONY: start stop clean cli shell

-include .env

start:
	docker-compose -p starter up -d
stop:
	docker-compose -p starter down

clean:
	docker-compose -p starter down --volumes

cli: start
	docker exec -it $$(docker ps -q --filter="NAME=ss-starter-wordpress_wpcli") bash

shell: start
	docker exec -it $$(docker ps -q --filter="NAME=ss-starter-wordpress_server") bash

tail: start
	docker logs --follow $$(docker ps -q --filter="NAME=ss-starter-wordpress_server")