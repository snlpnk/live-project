# Live with Websocket Chat System

[![Maintainer](http://img.shields.io/badge/maintainer-@snlpnk-blue.svg?style=flat-square)](https://twitter.com/sanolpunk)
[![Source Code](http://img.shields.io/badge/source-snlpnk/live-project-blue.svg?style=flat-square)](https://github.com/snlpnk/live-project)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/snlpnk/live-project.svg?style=flat-square)](https://packagist.org/packages/snlpnk/live-project)
[![Latest Version](https://img.shields.io/github/release/snlpnk/live-project.svg?style=flat-square)](https://github.com/snlpnk/live-project/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Build](https://img.shields.io/scrutinizer/build/g/snlpnk/live-project.svg?style=flat-square)](https://scrutinizer-ci.com/g/snlpnk/live-project)
[![Quality Score](https://img.shields.io/scrutinizer/g/snlpnk/live-project.svg?style=flat-square)](https://scrutinizer-ci.com/g/snlpnk/live-project)
[![Total Downloads](https://img.shields.io/packagist/dt/snlpnk/live-project.svg?style=flat-square)](https://packagist.org/packages/csnlpnk/live-project)

###### System developed for the creation of rooms for live events transmitted via YouTube, but with its own access control and chat.


Sistema desenvolvido para a criação de salas para eventos ao vivo transmitidos via YouTube, porém com controle próprio de acesso e chat.

### Highlights

- Simple installation (Instalação simples)

## Documentation

###### Just configure the DEFINES in src / Config.php and execute the SQL file to create the tables in your database and READY:

Basta configurar as DEFINES em src/Config.php e executar o arquivo SQL para criar as tabelas no seu banco de dados e PRONTO:

#### Configurarion:

```php
<?php
/**
 * DATABASE
 */
define("CONF_DB_HOST", "localhost");
define("CONF_DB_USER", "root");
define("CONF_DB_PASS", "");
define("CONF_DB_NAME", "live");
/*
 * CONFIGURAÇÕES DA LIVE
 */
define("LIVE_BASE", "https://www.localhost/live-project");
define("LIVE_OFFER", "COMPRAR AGORA"); 
/*
 * ACTIVECAMPAIGN CONFIG
 */
define('ACTIVE_CAMPAIGN', 1); 
define('ACTIVE_CAMPAIGN_URL', ''); 
define('ACTIVE_CAMPAIGN_KEY', ''); 
define('ACTIVE_CAMPAIGN_LISTS', '1'); 
define('ACTIVE_CAMPAIGN_TAGS', 'Leads'); 
/*
 * SITE CONFIG
 */
define('SITE_NAME', 'LiveProject'); 
define('SITE_SUBNAME', 'Lives Interativas'); 
define('SITE_DESC', 'Plataforma de lives com interação.'); 
define('SITE_COLOR', 'person');
/*
 * SOCIAL
 */
define("CONF_SOCIAL_TWITTER_CREATOR", "@creator");
define("CONF_SOCIAL_TWITTER_PUBLISHER", "@creator");
define("CONF_SOCIAL_FACEBOOK_APP", "5555555555");
define("CONF_SOCIAL_FACEBOOK_PAGE", "pagename");
define("CONF_SOCIAL_FACEBOOK_AUTHOR", "author");
define("CONF_SITE_DOMAIN", "www.localhost");
```

### Others

###### The system also has lead registration in ActiveCampaign and in the database.

O sistema também conta com cadastro de leads no ActiveCampaign e no banco de dados.

## Contributing

Please see [CONTRIBUTING](https://github.com/snlpnk/live-project/blob/master/CONTRIBUTING.md) for details.

## Support

###### Security: If you discover any security related issues, please email meu@email.com.br instead of using the issue tracker.

Se você descobrir algum problema relacionado à segurança, envie um e-mail para thiago.alexandre@html10.com.br em vez de usar o rastreador de problemas.

Thank you

## Credits

- [Thiago Alexandre](https://github.com/snlpnk) (Developer)
- [All Contributors](https://github.com/snlpnk/live-project/contributors) (This Rock)

## License

The MIT License (MIT). Please see [License File](https://github.com/snlpnk/live-project/blob/master/LICENSE) for more information.