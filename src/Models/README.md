## Model

### get

```php
Example::get();

Example::query()->where('id', 1)->get();
 ```  

### `toArray' или 'toJson'

```php
Example::query()->where('id', 1)->get()->toArray();
Example::query()->where('id', 1)->get()->toJson();

Example::query()->limit(1)->select()->toArray();
Example::query()->limit(1)->select()->toJson();
```