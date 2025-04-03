# 6 b) Sistema de registro e inicio de sesión

## Comandos

- `composer require laravel/ui `
- `php artisan ui vue --auth`

**Vídeo 51**:
- `php artisan make:middleware RoleMiddleware`
- `php artisan make:model Role -m`. **ATENCIÓN**: Este comando borrará y creará las tablas declaradas en los archivos `migrate`.
- `php artisan migrate:refresh`
- `php artisan make:middleware IsAdmin`

**Vídeo 52**:
- `php artisan make:controller AdminController`