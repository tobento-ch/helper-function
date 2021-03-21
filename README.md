# HelperFunction Service

With the HelperFunction Service you can easily manage your helper functions.

## Table of Contents

- [Getting started](#getting-started)
	- [Requirements](#requirements)
	- [Highlights](#highlights)
	- [Example](#example)  
- [Credits](#credits)
___

# Getting started

Add the latest version of the HelperFunction service running this command.

```
composer require tobento/helper-function
```

## Requirements

- PHP 8.0 or greater

## Highlights

- Framework-agnostic, will work with any project

## Example

Here is a example of how to use the HelperFunction service.

```php
// Create Functions.
$functions = new Functions();

// Set any data for later usage for your functions.
$functions->set('sitename', 'Your Sitename');

// Register a function file.
$functions->register(__DIR__.'/functions.php');

// Calling the function registered.
var_dump(sitename()); // string(13) "Your Sitename"

// Get the key set.
$keys = $functions->getKeys(); // ['sitename']
```

functions.php file example.

```php
use Tobento\Service\HelperFunction\Functions;

if (!function_exists('sitename'))
{
    function sitename(): string
    {
        // Get the data from the Functions.
        return Functions::get('sitename');
    }
}
```

# Credits

- [Tobias Strub](https://www.tobento.ch)
- [All Contributors](../../contributors)