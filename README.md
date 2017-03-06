# Sinusbot | Myinstants

## Webinterface to play sounds of Myinstants (http://myinstants.com) automatically in SinusBot (http://frie.se/ts3bot/)


[![Project Version](https://img.shields.io/badge/version-v3.2-blue.svg?style=flat-square)][version]

[version]: https://github.com/arnicel/myinstants-sinusbot

## Requirements
- Sinusbot Server
- Web Server with PHP and Curl
- Client browser with Javascript activated

## Credits
- Accessing Bot Info via PHP (PHP-Class by mave1993): I add the fonction "playurl" and "volumeset" inspired by it: http://github.com/flyth/ts3soundbot/wiki/Accessing-Bot-Info-via-PHP
- Sinusbot for having bot in Teamspeak 3: http://sinusbot.com/

## Installation
- Download and put the php file on your web server. (https://github.com/arnicel/myinstants-sinusbot/releases)
- Check config.php and if necessary modify ip, port, login, password, instance uuid (automatically detect)...
- Modify permission of /private/db.json to chmod 0755 (Favorie database)
- Load index.php in your browser and enjoy!

## Question?
https://forum.sinusbot.com/threads/sinusbot-myinstants-v3-0-php-webinterface.359/

## New features v3.2
- Add ssl support to sinusbot rest api
- Fix invisible error (Script optimization)
- Add cloudflare support (Script error)
- Add button image to local ressource

## Screenshot

[![Screenshot of Sinusbot | Myinstants](http://i.imgur.com/9JUOreA.png)](http://i.imgur.com/9JUOreA.png)
