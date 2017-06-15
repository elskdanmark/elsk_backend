# Web portal for Elsk Denmark
========================

## Install
### Server Configuration
#### CORS pre-flight requests
Add the following to virtual host file or .htaccess file
AllowOverride None
Header always set Access-Control-Allow-Origin "*"
Header always set Access-Control-Allow-Methods "POST, GET, OPTIONS, DELETE, PUT"
Header always set Access-Control-Max-Age "1000"
Header always set Access-Control-Allow-Headers "X-WSSE, Content-Type, Authorization"
RewriteEngine On
RewriteCond %{REQUEST_METHOD} OPTIONS
RewriteRule ^(.*)$ $1 [R=200,L]
