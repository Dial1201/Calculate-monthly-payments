# Knowledge Management

## Using composer from Docker
```sh
docker run --rm --interactive --tty \
--volume $PWD:/app \
composer <command>
```
e.g. adding a dependency:
```sh
docker run --rm --interactive --tty \
--volume $PWD:/app \
composer require symfony/web-server-bundle --dev
```
<https://hub.docker.com/_/composer/>
