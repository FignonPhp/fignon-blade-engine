# Fignon Blade Engine

This is a simple class to encapsulate the Laravel Blade template engine and use it easily in the Fignon Framework.

In your Fignon project, run:

```bash
composer require fignon/fignon-blade-engine
```

Then, use it like this:

```php
//app.php (or index.php) depending of how you call you entry point
declare(strict_types=1);

include_once __DIR__ . "/../vendor/autoload.php";

use Fignon\Tunnel;
use App\Features\Features;
use Fignon\Extra\BladeEngine;

$app = new Tunnel();
$app->set('env', 'development');
// ... other middlewares

// View engine initialization
$app->set('views', dirname(__DIR__) . '/templates');
$app->set('views cache', dirname(__DIR__) . '/var/cache');
$app->set('view engine options', []); // Add options to the view engine
$app->engine('blade', new BladeEngine()); 

$app->set('case sensitive routing', true);
//  ... other middlewares


// You can then use it to render
(new Features($app))->bootstrap();

$app->listen();
```

Other view engine integration to Fignon are:

- [The Twig Engine](https://github.com/FignonPhp/fignon-twig-engine)
- [The Plates Engine](https://github.com/FignonPhp/fignon-plate-engine)
- [The Smarty Engine](https://github.com/FignonPhp/fignon-smarty-engine)

