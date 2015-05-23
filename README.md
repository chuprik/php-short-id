# PHP Short ID creator

The library help you generate short id like youtube, vimeo, bit.ly, etc. Short generation (creation) based on numerical ID. 

## Simple scenarios of using

```php
require('vendor/autoload.php');

$shortId = new \kotchuprik\short_id\ShortId();
```
 
### Creating short ID for a record from in a database

1. when an app created a record in an your database with ID 424242
2. $shortId->encode(424242) encodes it to 'bLTs'
3. you updated the record for ID 424242 and set short_id of the record to 'bLTs'

```php
$id = $shortId->encode(422424);     // $id will be 'bLTs'

// or with $neededLength = 6
$id = $shortId->encode(422424, 6);  // $id will be 'babMwC'
```

### Searching record in a database 

1. when someone requests rLHWfKd
2. $shortId->decode('rLHWfKd') decodes it to 424242
3. you found the record for ID 424242 in an your database

```php
$id = $shortId->decode('bLTs');      // $id will be 424242

// or with $neededLength = 6
$id = $shortId->decode('babMwC', 6); // $id will be 424242
```
