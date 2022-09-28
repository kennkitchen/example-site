# FromScratch
This is a work in-progress to develop a fairly simple PHP framework. Ultimately I plan to use this as an instructional 
tool, either for blog posts or a training class.

## What's Here
Not a lot! But... a lot. Twig templates, a controller for static pages, and a very basic router. Oh and a borrowed theme 
from W3 Schools!

### Structure
* .htaccess - needed for Apache
* index.php - should never get accessed but if it does it redirects to webroot
* www (webroot)
  * index.php - everything goes through here
  * css/js/images - asset files
* Controllers
  * AppController - currently this just sets up Twig
  * PageController - processes all static pages
* Routes
  * Request Class (sanitizes and standardizes)
  * Router Class (sends things on their merry way)
* templates (Twig templates)

### Demo Site
[framework.webinology.cloud](https://framework.webinology.cloud)

## Webserver
Make sure the webroot is set to www.
### Apache
For Apache, the following .htaccess is required:
```shell
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteBase /
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule . /index.php [L]
</IfModule>
```
### Nginx
Mostly just works.