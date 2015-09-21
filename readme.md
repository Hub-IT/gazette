# Gazzete Web App

## Installation
- [BowerPHP][bower_php_link]
- [Composer][composer_link]. Install back-end libraries.

## Summary of Roles
- Administrator – somebody who has access to all features of below roles, as well editing account users.
- Editor – somebody who can publish and manage posts including the posts of other users.
- Author – somebody who can publish and manage their own posts.
- Contributor – somebody who can write and manage their own posts but cannot publish them.
- Subscriber – somebody who can only manage their profile, upvoting, and commenting on posts.

## Developers
### Tests
Gazzete Web App is build the TDD way. We first write functional tests, then integration tests, and where needed unit tests.
#### Database 
> Use a separate database for tests.  

##### Useful commands for psql
- Login to psql: `psql -U homestead -h localhost` # password: secret
- List all databases `\l`
- Create database for app `CREATE DATABASE gazzete`
- Create database for tests `CREATE DATABASE gazzete_testing` > REQUIRED!
- Select database `\c gazzete`
- List all tables on the selected database `\dt`
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
