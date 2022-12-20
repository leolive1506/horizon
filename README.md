# Precisa
- Redis na máquina
- Extensão redis php
```sh
sudo apt install php8.1-redis
# check
php -m | grep redis
```


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

- Env
```sh
QUEUE_CONNECTION=redis
```

# Horizon service provider
- Gate
    - ao subir pra prod pode passar um ou masi arrays com email dos users que podem ter acesso aos recursos do horizon
    - Variavel ambiente definida como local, qualquer pessoa pode visualizar

# Job
- Muito usado para trabalhar com coisas pesadas
    - permite criar tarefas em fila que podem ser processadas em segundo plano
- se você despachar um job sem definir para qual fila ele deve ser despachado, o job será colocado na fila default definida config/queue.php:
```php
use App\Jobs\ProcessPodcast;

// This job is sent to the default connection's default queue...
ProcessPodcast::dispatch();
 
// This job is sent to the default connection's "emails" queue...
ProcessPodcast::dispatch()->onQueue('emails');
```
- Laravel queue worker permite que especificar quais filas devem ser processadas por prioridade
    - Ex: enviar jobs para uma fila alta, executar um worker que dê a eles maior prioridade de processamento:
```sh
php artisan queue:work --queue=high,default
```
- Os job que falharem são salvo na tabela failed_jobs

# Email de forma assincrona
- Para colocar pra fila os email basta implementar ShouldQueue
```php
class TestMail extends Mailable implements ShouldQueue
```


# Inversão de depencia no laravel
- config/app.php
```php
public function boot()
{
    $this->app->singleton(
        InterfaceQueIraUser::class,
        ClasseQueDeveSerInstanciadaNoLugar::class
    );
}
```


# Dicas gerais
## Criar marca d água com intervation make
```php
        $fullPath = Storage::path($path);

        Image::make($fullPath)
            ->insert(public_path('default.png'))
            ->save($fullPath);
```
