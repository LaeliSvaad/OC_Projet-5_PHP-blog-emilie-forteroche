<?php

/**
 * Classe utilitaire : cette classe ne contient que des méthodes statiques qui peuvent être appelées
 * directement sans avoir besoin d'instancier un objet Utils.
 * Exemple : Utils::redirect('home'); 
 */
class Utils {
    /**
     * Convertit une date vers le format de type "Samedi 15 juillet 2023" en francais.
     * @param DateTime $date : la date à convertir.
     * @return string : la date convertie.
     */
    public static function convertDateToFrenchFormat(DateTime $date) : string
    {
        // Attention, s'il y a un soucis lié à IntlDateFormatter c'est qu'il faut
        // activer l'extention intl_date_formater (ou intl) au niveau du serveur apache. 
        // Ca peut se faire depuis php.ini ou parfois directement depuis votre utilitaire (wamp/mamp/xamp)
        $dateFormatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::FULL, IntlDateFormatter::FULL);
        $dateFormatter->setPattern('EEEE d MMMM Y');
        return $dateFormatter->format($date);
    }

    /**
     * Redirige vers une URL.
     * @param string $action : l'action que l'on veut faire (correspond aux actions dans le routeur).
     * @param array $params : Facultatif, les paramètres de l'action sous la forme ['param1' => 'valeur1', 'param2' => 'valeur2']
     * @return void
     */
    public static function redirect(string $action, array $params = []) : void
    {
        $url = "index.php?action=$action";
        foreach ($params as $paramName => $paramValue) {
            $url .= "&$paramName=$paramValue";
        }
        header("Location: $url");
        exit();
    }

    /**
     * Cette méthode retourne le code js a insérer en attribut d'un bouton.
     * pour ouvrir une popup "confirm", et n'effectuer l'action que si l'utilisateur
     * a bien cliqué sur "ok".
     * @param string $message : le message à afficher dans la popup.
     * @return string : le code js à insérer dans le bouton.
     */
    public static function askConfirmation(string $message) : string
    {
        return "onclick=\"return confirm('$message');\"";
    }

    /**
     * Cette méthode protège une chaine de caractères contre les attaques XSS.
     * De plus, elle transforme les retours à la ligne en balises <p> pour un affichage plus agréable. 
     * @param string $string : la chaine à protéger.
     * @return string : la chaine protégée.
     */
    public static function format(string $string) : string
    {
        // Etape 1, on protège le texte avec htmlspecialchars.
        $finalString = htmlspecialchars($string, ENT_QUOTES);

        // Etape 2, le texte va être découpé par rapport aux retours à la ligne, 
        $lines = explode("\n", $finalString);

        // On reconstruit en mettant chaque ligne dans un paragraphe (et en sautant les lignes vides).
        $finalString = "";
        foreach ($lines as $line) {
            if (trim($line) != "") {
                $finalString .= "<p>$line</p>";
            }
        }
        
        return $finalString;
    }

    /**
     * Cette méthode permet de récupérer les paramètres de l'URL de la page précédente, pour une utilisation facile avec la méthode redirect.
     * @return Array : un tableau contenant à l'index 0 la valeur du paramètre "action" de l'url, et à l'index 1 un tableau associatif contenant le reste des paramètres.
     */
    public static function getPreviousURLParams() : Array{

        //On récupère les composants de l'URL de la page précédente dans un tableau
       $url_array = parse_url($_SERVER['HTTP_REFERER']);

       //Traitement de la chaîne de caractères concernant les paramètres de l'URL: chaque paramètre GET est isolé dans un tableau
       $params_array = explode("&", $url_array["query"]);

       //On récupère la valeur du paramètre action pour pouvoir la passer en paramètre de la méthode statique
       $action = $params_array[0];
       array_splice($params_array, 0, 1);
       $paramsAssoc = Utils::numericToAssociativeArray($params_array);
       $action = explode("=", $action);
       return [$action[1], $paramsAssoc];
    }

    /**
     * Cette méthode permet de convertir le tableau numérique de paramètres d'une url en tableau associatif,
     * rendant possible son utilisation dans la méthode redirect ci-dessus.
     * @param Array $array : le tableau indexé contenant les paramètres.
     * @return Array : le tableau associatif des paramètres de l'url: $paramName => $paramValue.
     */
    private static function numericToAssociativeArray(Array $array) : Array{
        $len = count($array);
        for ($i = 0; $i < $len; $i++) {
            $currentLine = explode("=", $array[$i]);
            $associativeArray[$currentLine[0]] = $currentLine[1];
        }
        return $associativeArray;
    }
    /**
     * Cette méthode permet de récupérer une variable de la superglobale $_REQUEST.
     * Si cette variable n'est pas définie, on retourne la valeur null (par défaut)
     * ou celle qui est passée en paramètre si elle existe.
     * @param string $variableName : le nom de la variable à récupérer.
     * @param mixed $defaultValue : la valeur par défaut si la variable n'est pas définie.
     * @return mixed : la valeur de la variable ou la valeur par défaut.
     */
    public static function request(string $variableName, mixed $defaultValue = null) : mixed
    {
        return $_REQUEST[$variableName] ?? $defaultValue;
    }

}