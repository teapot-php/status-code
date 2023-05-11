.PHONY: it
it: coding-standards ## Runs the coding-standards target

.PHONY: coding-standards
coding-standards: vendor ## Fixes code style issues with squizlabs/php_codesniffer
	vendor/bin/phpcbf
	vendor/bin/phpcs

.PHONY: help
help: ## Displays this list of targets with descriptions
	@grep -E '^[a-zA-Z0-9_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}'

vendor: composer.json composer.lock
	composer validate --strict
	composer install --no-interaction --no-progress
