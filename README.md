Requirements
---

* PHP ~~5.6~~ 5.4
* NodeJS
* Grunt CLI
* Bower

Install
---

Go to the project folder and execute commands:

* `npm install`
* `bower install`
* `grunt prod`

In `php.ini` enables short tag *<?* - `short_open_tag = On`

Usage
---

* run `grunt` command in work directory, which listen all file changes
* run built-in PHP server `php -S localhost:80`

Work steps development
---

* install NodeJS
* `npm init` in project folder and fill it
* `npm install grunt --save`
* `npm install -g grunt-cli` (if not install yet)
* `npm install -g bower` (if not install yet)
* `bower init` and fill it
* `bower install bootstrap#v4.0.0-alpha.2 --save`
* ~~add LiveWatcher in IDE for SCSS (with `$FileParentDir$\` in *Arguments*)~~
* `bower install components-font-awesome --save`
* `bower install roboto-fontface --save`
* `npm install jit-grunt --save`
* `npm install time-grunt --save`
* `npm install load-grunt-config --save`
* `npm install grunt-contrib-clean --save`
* `npm install grunt-contrib-copy --save`
* `npm install grunt-contrib-sass --save`
* `npm install grunt-contrib-uglify --save`
* `npm install grunt-contrib-watch --save`
* delete `grunt-contrib-sass` folder in `node_modules` (`npm unistall` doesn't work)
* `npm install grunt-sass --save`

How to
---

### Add translate
In file `app/Resources/translate.json` add
```json
"KEY": {
    "ru": "Русский",
    "en": "English"
}
```
In view get translation by **key**
```php
$this->translate('KEY');
```
If translation isn't found, system print *key*

### Add technology
In file `app/Resources/technologies.json` add string to array

### Add project
In file `app/Resources/projects.json` add
```json
{
    "description": {
      "ru": "Русский коммент",
      "en": "English comment"
    },
    "link": "//site.com",
    "img": "site.png"
  }
```
*img* must have 500x500 dimensions

**P.S.** If `link` is not defined, button "Open" would be hide

### Add key-value item
In file `app/config/config.ini` add
```ini
key = value
```
And use this as
```php
$app->getConfig('key');
```
