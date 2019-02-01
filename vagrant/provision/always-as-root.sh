#!/usr/bin/env bash

source /app/vagrant/provision/common.sh

#== Provision script ==

info "Provision-script user: `whoami`"

info "Restart web-stack"
service php7.2-fpm restart
service nginx restart
service mysql restart

info "Don't forget \"mysql SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));\""
info "And alias yiiM='php /app/yii'"