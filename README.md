# FileFlow Report Exporter — Singleton Pattern (IPT10 Midterm)

This repository contains the PHP 8.1+ implementation for the IPT10 midterm research article on the **Singleton** design pattern (Gang of Four, creational).

`FileFlow\Config\AppSettings` (in `src/Config/AppSettings.php`) is the Singleton. It ensures that the program shares exactly one `AppSettings` object holding the application's configuration, which is read from `config/app.ini`.

> This repository supports the IPT10 Singleton midterm specifically. The rest of the FileFlow Report Exporter project, including the Factory Method exporters, belongs to a separate earlier laboratory activity and is not part of this submission.

## Requirements

- PHP 8.1 or newer
- Composer

## Setup

```bash
composer install
```

There are no external packages. Composer is used to register the PSR-4 autoloader for the `FileFlow\` namespace.

## Run the Demo

```bash
php bin/demo.php
```

Expected output:

```text
First call object id: <same ID>
Second call object id: <same ID>
PASS: both calls returned the exact same AppSettings instance.
Sample values read from config/app.ini:
  app_name    = FileFlow Report Exporter
  output_dir = exports/
  missing_key = default-fallback
```

The two object IDs should match, demonstrating that `getInstance()` returns the same `AppSettings` object instead of creating a new instance each time.

> **Note:** PHP assigns object IDs at runtime, so the exact number may vary. What matters is that the first and second IDs are identical.

## Syntax Check (`php -l`)

`php -l` (lint) checks a PHP file for syntax errors without executing it. The syntax-check screenshot is included as a required deliverable for this midterm.

Run:

```bash
php -l src/Config/AppSettings.php
php -l bin/demo.php
```

A successful check prints:

```text
No syntax errors detected in src/Config/AppSettings.php
```

and:

```text
No syntax errors detected in bin/demo.php
```

The screenshot of the successful syntax checks is located at:

```text
docs/php-lint-check.png
```

## Project Structure

```text
src/Config/AppSettings.php    Singleton implementation
config/app.ini                Sample configuration file it reads
bin/demo.php                  Runnable proof-of-concept script
docs/                         Figures used in the research article
                              and PHP lint screenshot
composer.json                 PSR-4 autoload declaration
```

## Diagrams

The research article uses two diagrams generated with PlantUML:

```text
docs/figure1-uml-class-diagram.png
docs/figure1-uml-class-diagram.puml
docs/figure2-sequence-diagram.png
docs/figure2-sequence-diagram.puml
```

The `.puml` files are the editable PlantUML source files for the corresponding figures.
