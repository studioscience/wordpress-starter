#!/bin/sh

wp db import backup.sql

wp search-replace 'https://studiostarter1.wpengine.com' 'http://127.0.0.1:8000' \
    --recurse-objects \
    --skip-columns=guid \
    --skip-tables=wp_users
wp search-replace 'studiostarter1.wpengine.com' '127.0.0.1:8000' \
    --recurse-objects \
    --skip-columns=guid \
    --skip-tables=wp_users
