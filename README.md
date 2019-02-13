# DbQueriesToolbar

Module providing DB toolbar for the [Zend Developer Tools](https://github.com/zendframework/ZendDeveloperTools).

## Installation

1. Install the module via composer by running:

   ```bash
   $ composer require --dev ydyachenko/db-queries-toolbar
   ```

2. Add the `DbQueriesToolbar` module to the module section of your application config.

3. Enable database profiler:
```php
<?php

return [
    'db' => [
        'profiler' => true,
    ],
];
```