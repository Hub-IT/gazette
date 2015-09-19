## Gazzete Web App

## Installation
- [BowerPHP][bower_php_link]
- [Composer][composer_link]. Install back-end libraries.

## Developers
### Tests
Gazzete Web App is build the TDD way. We first write functional tests, then integration tests, and where needed unit tests.
#### Database 
> Use a separate database for tests.  

- `psql -U homestead -h localhost` # password: secret
- `create gazzete database` && `create gazzete_testing database`
#### TODO
- Use [selenium][selenium_link] for front-end testing:
	- Verify a user can read more posts either through the infinite scroll for small screens or manually for big screens.


### License
 - The Gazzete App is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)

### Credits
- html5shiv
- bootstrap
- fontawesome 
- fastclick 
- admin-lte
- jpanelmenu
- jquery
- Laravel

[bower_php_link]: https://github.com/Bee-Lab/bowerphp
[Composer]: https://getcomposer.org/
[selenium_link]: http://www.seleniumhq.org/
