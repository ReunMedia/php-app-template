#
# Reun media PHP dev container Dockerfile
#
# @author Reun Media <company@reun.eu>
# @copyright 2024 Reun Media
#
# @see https://github.com/ReunMedia/php-app-template
#
# @version 1.0.1
#

FROM mcr.microsoft.com/devcontainers/php:1-8.3-bookworm

# Install additional PHP extensions
#ADD --chmod=0755 https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
#RUN install-php-extensions intl bcmath

# Append custon Xdebug configuration
RUN --mount=type=bind,source=xdebug-append.ini,target=/tmp/xdebug-append.ini \
  cat /tmp/xdebug-append.ini >> /usr/local/etc/php/conf.d/xdebug.ini
