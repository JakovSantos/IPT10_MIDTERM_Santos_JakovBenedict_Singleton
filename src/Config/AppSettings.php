<?php
declare(strict_types=1);
namespace FileFlow\Config;

final class AppSettings
{
    private static ?AppSettings $instance = null;
    private array $values; // @var array<string, string>

    // Private constructor blocks `new AppSettings()` from outside.
    private function __construct(string $configPath)
    {
        if (!is_file($configPath)) {
            throw new \RuntimeException("Missing config: {$configPath}");
        }
        $this->values = parse_ini_file($configPath) ?: [];
    }
    private function __clone(): void {} // blocks copy-by-clone
    public function __wakeup(): void // blocks copy-by-unserialize
    {
        throw new \RuntimeException('Cannot unserialize AppSettings.');
    }
    public static function getInstance(string $path = 'config/app.ini'): self
    {
        if (self::$instance === null) {
            self::$instance = new self($path);
        }
        return self::$instance;
    }
    public function get(string $key, ?string $default = null): ?string
    {
        return $this->values[$key] ?? $default;
    }
}
