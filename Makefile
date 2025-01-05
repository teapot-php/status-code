.PHONY: it
it: coding-standards static-code-analysis ## Runs the coding-standards and static-code-analysis targets

.PHONY: coding-standards
coding-standards: vendor ## Normalizes composer.json with ergebnis/composer-normalize and fixes code style issues with friendsofphp/php-cs-fixer
	composer normalize
	vendor/bin/php-cs-fixer fix --config=.php-cs-fixer.php --diff --show-progress=dots --verbose

.PHONY: help
help: ## Displays this list of targets with descriptions
	@grep -E '^[a-zA-Z0-9_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}'

.PHONY: static-code-analysis
static-code-analysis: vendor ## Runs a static code analysis with phpstan/phpstan
	vendor/bin/phpstan clear-result-cache --configuration=phpstan.neon
	vendor/bin/phpstan --configuration=phpstan.neon --memory-limit=-1

.PHONY: static-code-analysis-baseline
static-code-analysis-baseline: vendor ## Generates a baseline for static code analysis with phpstan/phpstan
	vendor/bin/phpstan clear-result-cache --configuration=phpstan.neon
	vendor/bin/phpstan --allow-empty-baseline --configuration=phpstan.neon --generate-baseline=phpstan-baseline.neon --memory-limit=-1

vendor: composer.json composer.lock
	composer validate --strict
	composer install --no-interaction --no-progress
