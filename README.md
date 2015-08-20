# Input
OO way to interact with user input

```php
use Azi\Input;

$input = Input::all();

$name = Input::post('name');
$search = Input::get('search');

$email = Input::request('email'); 

if(Input::exists('email)){
  // send an email to user
}
```
