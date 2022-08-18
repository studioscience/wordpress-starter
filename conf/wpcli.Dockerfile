FROM wordpress:cli

USER root
RUN apk update && \
    apk add --no-cache \
    openssh-client \
    coreutils

USER www-data

ENTRYPOINT [ "/bin/sh", "-c", "sleep infinity" ]

COPY package.json /themes/ss-starter-wordpress-theme