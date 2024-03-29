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
define("LIVE_BASE", "https://www.localhost/live-project"); // URL do projeto (sem a barra no final)
define("LIVE_OFFER", "COMPRAR AGORA"); // Texto do botão exibido durante a transmissão da live
/*
 * ACTIVECAMPAIGN CONFIG
 */
define('ACTIVE_CAMPAIGN', 1); // Ativa cadastro em newsletter
define('ACTIVE_CAMPAIGN_URL', ''); // URL da conta ActiveCampaign
define('ACTIVE_CAMPAIGN_KEY', ''); // KEY da conta ActiveCampaign
define('ACTIVE_CAMPAIGN_LISTS', '1'); // ID das listas separados por vírgula ('1' OU '1,2')
define('ACTIVE_CAMPAIGN_TAGS', 'Leads'); // Tags separadas por vírgula
/*
 * SITE CONFIG
 */
define('SITE_NAME', 'LiveProject'); // Nome do site
define('SITE_SUBNAME', 'Lives Interativas'); // Subtitulo do site
define('SITE_DESC', 'Plataforma de lives com interação.'); // Descrição do site
define('SITE_COLOR', 'person'); // (yellow, green, blue, red, purple, pink)
/*
 * SOCIAL
 */
define("CONF_SOCIAL_TWITTER_CREATOR", "@creator");
define("CONF_SOCIAL_TWITTER_PUBLISHER", "@creator");
define("CONF_SOCIAL_FACEBOOK_APP", "5555555555");
define("CONF_SOCIAL_FACEBOOK_PAGE", "pagename");
define("CONF_SOCIAL_FACEBOOK_AUTHOR", "author");
define("CONF_SITE_DOMAIN", "www.localhost");