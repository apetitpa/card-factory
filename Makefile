.PHONY: install test phpstan psalm cs clean

install:
	composer install

test:
	vendor/bin/phpunit

phpstan:
	vendor/bin/phpstan analyse -l 9 src tests

psalm:
	vendor/bin/psalm src tests

cs: phpstan psalm

clean:
	rm -rf vendor/
	rm composer.lock
