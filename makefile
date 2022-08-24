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

# --- Targets for syncing production data to local machine --------------------

.PHONY: sync dbsync uploadsync

sync: dbsync uploadsync mu-pluginssync

dbsync: start
	wp db export - --ssh=blackspace@blackspace.ssh.wpengine.net > backup.sql && \
		docker cp backup.sql $$(docker ps -q --filter="NAME=blackspace_wpcli"):/var/www/html/backup.sql && \
		docker cp bin/db-sync.sh $$(docker ps -q --filter="NAME=blackspace_wpcli"):/var/www/html/db-sync.sh && \
		docker exec -it $$(docker ps -q --filter="NAME=blackspace_wpcli") sh -c "./db-sync.sh"

uploadsync:
	rsync -azP blackspace@blackspace.ssh.wpengine.net:sites/blackspace/wp-content/uploads/ uploads

mu-pluginssync:
	rsync -azP --exclude-from=mu-plugins/.exclude.muplugins \
		blackspace@blackspace.ssh.wpengine.net:sites/blackspace/wp-content/mu-plugins/ mu-plugins	