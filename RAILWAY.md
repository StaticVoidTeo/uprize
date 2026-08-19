# Railway + Laravel notes

## Filament / Livewire login button does nothing in production

**Symptom:** `/admin/login` loads. You can type in the fields. The Sign in button cannot be clicked, or clicking it does nothing. It works on `localhost`.

**Cause:** Railway terminates HTTPS at the proxy and forwards HTTP to the container. Laravel 13 only auto-trusts proxies on Laravel Cloud, Forge, and Vapor — not Railway. Without trusted proxies, Laravel thinks the request is `http://`, so Filament/Livewire script URLs are generated as `http://...` on an `https://` page. The browser blocks them as mixed content. The login form is Livewire, so without JS the button is dead.

**Fix:** in `bootstrap/app.php`:

```php
->withMiddleware(function (Middleware $middleware): void {
    $middleware->trustProxies(at: '*');
})
```

Also set `APP_URL` to the public HTTPS URL (not `http://localhost:8000`).

## PHP version must be 8.4

**Symptom:** `composer install` fails on Railway with Symfony packages requiring `php >=8.4.1` while the image has PHP 8.3.x.

**Cause:** Railpack picks PHP from `composer.json`. `"php": "^8.3"` means it installs 8.3. This project's lockfile has Symfony 8.1, which needs PHP 8.4.1+. Local PHP can be newer than what Railway chooses, so the lockfile can require 8.4 even if `composer.json` still says `^8.3`.

**Fix:** in `composer.json`:

```json
"require": {
    "php": "^8.4"
}
```

Do **not** pin PHP in `railpack.json` with `"packages": { "php": "8.4" }`. That tells **mise** to compile PHP from source (needs `bison` / `re2c`) on top of FrankenPHP, and the build dies with `configure: error: bison 3.0.0 or newer is required`.

## PHP extensions

**Symptom:** build or runtime fails looking for `intl`, `zip`, or `pdo_mysql`.

**Cause:** FrankenPHP does not include every extension. Railpack installs extras listed in `composer.json` as `ext-*` (and `railpack.json` `php.extensions`). It also adds `pdo_mysql` automatically if `DB_CONNECTION=mysql` is available **at build time**.

**Fix:** declare them in `composer.json`:

```json
"ext-intl": "*",
"ext-zip": "*",
"ext-pdo_mysql": "*"
```

and keep `railpack.json` to extensions only — no `packages.php`:

```json
{
  "$schema": "https://schema.railpack.com",
  "php": {
    "extensions": ["intl", "zip"]
  }
}
```

`ext-pdo_mysql` is the MySQL driver install. It is not the same as `"packages": { "php": "8.4" }`.
