# Precisa
- Redis

# Instalação
```sh
composer require laravel/horizon
php artisan horizon:install
```

# Configs
- Em app.php
```php
App\Providers\HorizonServiceProvider::class,
```
- config/horizon.php

# Horizon service provider
- Gate
    - ao subir pra prod pode passar um ou masi arrays com email dos users que podem ter acesso aos recursos do horizon
    - Variavel ambiente definida como local, qualquer pessoa pode visualizar
