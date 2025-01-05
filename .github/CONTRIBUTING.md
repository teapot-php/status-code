# CONTRIBUTING

We are using [GitHub Actions](https://github.com/features/actions) as a continuous integration system.

For details, take a look at the following workflow configuration files:

- [`workflows/integrate.yaml`](workflows/integrate.yaml)

## Coding Standards

We use [`ergebnis/composer-normalize`](https://github.com/ergebnis/composer-normalize) to normalize `composer.json`.

We are using [`friendsofphp/php-cs-fixer`](https://github.com/FriendsOfPHP/PHP-CS-Fixer) to enforce coding standards in PHP files.

Run

```sh
make coding-standards
```

to automatically fix coding standard violations.

## Static Code Analysis

We use [`phpstan/phpstan`](https://github.com/phpstan/phpstan) to statically analyze the code.

Run

```sh
make static-code-analysis
```

to run a static code analysis.

We also use the baseline feature of [`phpstan/phpstan`](https://phpstan.org/user-guide/baseline).

Run

```sh
make static-code-analysis-baseline
```

to regenerate the baseline in [`../phpstan-baseline.neon`](../phpstan-baseline.neon).

:exclamation: Ideally, the baseline should shrink over time.

## Extra lazy?

Run

```sh
make
```

to automatically enforce coding standards and run a static code analysis!


## Help

:bulb: Run

```sh
make help
```

to display a list of available targets with corresponding descriptions.
