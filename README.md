#Bee-PHP-Registry
A Registry pattern used to recieve singleton instance of any object. This class is design to store and retrieve objects on demand.

#### Registry::getInstance($className)
Use this method to get a single instance of any class every time you call.
Example:
```php
$singletonFoo = Registry::getInstance('Foo');
```

#### Registry::set(&$obj, $name=NULL)
Stores new object in registry.
Example:
```php
Registry::set($objFoo, 'Foo');
```

#### Registry::get($name)
Recieve an already loaded object from registry. 
(Note: It returns object by reference.)
Example:
```php
$objFoo = Registry::get('Foo');
```

#### Registry::has($name)
Checks if an object is loaded in registry.
Example:
```php
if (Registry::has('Foo'))
	// do something
```

Origin Author: Hasan Hameed <hasan.hameed07@gmail.com>
