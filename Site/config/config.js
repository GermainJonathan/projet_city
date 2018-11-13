/**
 * Définit l'environnemnt serveur afin de communiquer avec l'API
 */
const environnement =  {
    port : 82,
    servicePath : "/services/",
    host : "http://localhost:"
};

/**
 * Alias servant à l'appel de l'API
 */
environnement['serviceUrl'] = environnement.host + environnement.port + environnement.servicePath ;

/**
 * Tableau contenant les chemins vers les différentes images suivant le codeQuartier
 * codeQuartier => Path image quartier
 */
const path = ['', 'assets/images/perrache/', 'assets/images/bellecour/', 'assets/images/terreaux/'];

/**
 * Tableau reprenant les libellées quartier suivant leur code
 * codeQuartier => Libellé quartier
 */
const quartier = ['', 'perrache', 'bellecour', 'terreaux'];