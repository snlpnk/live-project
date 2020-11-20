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
define("LIVE_BASE", "https://www.localhost/live");
define("LIVE_INDEX_MODE", 1); // 1 para Active Campaign ou 2 Para Banco de Dados

/*
 * ACTIVECAMPAIGN CONFIG
 */
define('ACTIVE_CAMPAIGN', 1); //Ativa cadastro em newsletter
define('ACTIVE_CAMPAIGN_URL', 'https://vbasolutions.api-us1.com'); //URL da conta ActiveCampaign
define('ACTIVE_CAMPAIGN_KEY', '45cbc3aa38fd3789e885de2fdae3dae235e88528a215ad7cec7844f291a79d6304782a6c'); //KEY da conta ActiveCampaign
define('ACTIVE_CAMPAIGN_LISTS', '1'); //ID das listas separados por vírgula ('1' OU '1,2')
define('ACTIVE_CAMPAIGN_TAGS', 'Leads'); //Tags separadas por vírgula ('WC' OU 'WC,Mentor')

/*
 * SITE CONFIG
 */
define('SITE_NAME', 'LiveProject'); //Nome do site do cliente
define('SITE_SUBNAME', 'Lives Interativas'); //Nome do site do cliente
define('SITE_DESC', 'Plataforma de lives com interação.'); //Descrição do site do cliente
define('SITE_COPY', 'Conteúdo de Marketing, Todos os Direitos Reservados');
define('SITE_COLOR', 'person'); // (yellow, green, blue, red, purple, pink)

/*
 * Configurações básicas de funcionamento!
 */
define("OFFER_TITLE", "COMPRAR AGORA"); // COMPRAR AGORA
define("GOOGLE_FONT", "Open+Sans:100,300,400,500,700");

/*
 * Google
 */
define('SITE_SOCIAL_GOOGLE', 1);
define('SITE_SOCIAL_GOOGLE_AUTHOR', ""); //https://plus.google.com/????? (**ID DO USUÁRIO)
define('SITE_SOCIAL_GOOGLE_PAGE', ""); //https://plus.google.com/???? (**ID DA PÁGINA)

/*
 * Facebook
 */
define('SITE_SOCIAL_FB', 1);
define('SITE_SOCIAL_FB_APP', ""); //Opcional APP do facebook
define('SITE_SOCIAL_FB_AUTHOR', ""); //https://www.facebook.com/?????
define('SITE_SOCIAL_FB_PAGE', ""); //https://www.facebook.com/?????

/*
 * Twitter
 */
define('SITE_SOCIAL_TWITTER', "sanolpunk"); //https://www.twitter.com/?????