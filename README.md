# POO (Programmation Orientée Objet)

La POO est un paradigme de programmation qui permet d'organiser le code en utilisant des objets.

## Les objets

### C'est quoi ?

Un objet est une instance d'une classe. Une classe est une structure qui définit les propriétés (aussi appelées attributs) et les méthodes (fonctions) que tous les objets de cette classe auront.

**En résumé** :

On crée une classe dans cette classe on va pouvoir définir des propriétés, ces propriétés sont des variables spécifiques ou des caractéristiques et ensuite on peut faire des méthodes (c'est comme des fonctions). Ces méthodes peuvent prendre des paramètres et elles peuvent manipuler l'instance en utilisant le mot clé `$this` qui fera toujours référence à l'objet sur lequel la méthode est utilisé.

> [!TIP] > **Bonne pratique** : on crée un fichier PHP par classe.

> [!NOTE]
> PHP a la capacité de créer des propriétés dynamiquement, cependant, il n'est pas recommandé de le faire car cela peut rendre le code plus difficile à comprendre.

**Exemple avec les dates** :

**Code procédural (utilise les fonctions de PHP)**

```php
// Définit le fuseau horaire par défaut utilisé par toutes les fonctions de date/heure
date_default_timezone_set('Europe/Paris');

// Définit une date sous forme de chaîne de caractères
$date = "2024-02-24";

// Ajoute 3 mois et 2 jours à la date et la convertit en format 'Y-m-d'
// Transforme un texte anglais en timestamp (String to Time)
// https://www.php.net/manual/fr/function.strtotime.php
$new_date = date('Y-m-d', strtotime($date . " +3 months +2 day"));

// Affiche la nouvelle date au format 'd/m/Y'
echo date('d/m/Y', strtotime($new_date)); // 26/05/2024
```

**Fonctions** :

```php
// Fonction pour ajouter un certain nombre de jours à une date
// On utilise les accolades {$days} pour délimiter clairement le nom de la variable
function add_days($date, $days)
{
    return date('Y-m-d', strtotime($date . " +{$days} day"));
}

// Fonction pour ajouter un certain nombre de mois à une date
function add_months($date, $months)
{
    return date('Y-m-d', strtotime($date . " +{$months} month"));
}

// Fonction pour formater une date selon un format spécifié
function format_date($date, $format)
{
    return date($format, strtotime($date));
}

// Executions des fonctions

// Définit le fuseau horaire par défaut utilisé par toutes les fonctions de date/heure
date_default_timezone_set('Europe/Paris');

// Définit une date sous forme de chaîne de caractères
$date = "2024-02-24";

// Ajoute 2 jours à la date
$date = add_days($date, 2);

// Ajoute 3 mois à la date
$date = add_months($date, 3);

// Affiche la date au format 'd/m/Y'
echo format_date($date, 'd/m/Y');
```

**Objets** :

```php
// Définition de la classe MaDate
class MaDate {
    // Propriété privée pour stocker la date
    private $date;

    // Constructeur de la classe qui initialise la date
    public function __construct($date) {
        // Crée un nouvel objet DateTime à partir de la date fournie
        $this->date = new DateTime($date);
    }

    // Méthode pour ajouter un certain nombre de jours à la date
    // https://www.php.net/manual/fr/datetime.modify
    public function addDays($days) {
        // Modifie la date en ajoutant le nombre de jours spécifié
        $this->date->modify("+{$days} day");
    }

    // Méthode pour ajouter un certain nombre de mois à la date
    public function addMonths($months) {
        // Modifie la date en ajoutant le nombre de mois spécifié
        $this->date->modify("+{$months} month");
    }

    // Méthode pour formater la date selon un format spécifié
    public function format($format) {
        // Retourne la date formatée selon le format spécifié
        return $this->date->format($format);
    }
}

// Crée un nouvel objet MaDate avec la date "2024-02-24"
$date = new MaDate("2024-02-24");

// Ajoute 2 jours à la date
$date->addDays(2);

// Ajoute 3 mois à la date
$date->addMonths(2);

// Affiche la date au format 'd/m/Y'
$date->format('d/m/Y');
```

La classe `MaDate` encapsule un objet `DateTime` de PHP. Elle fournit des méthodes pour ajouter des jours `addDays` et des mois `addMonths` à la date, et pour formater `format` la date.

`$this` est une référence à l'objet courant `MaDate` (l'instance de la classe dans laquelle la méthode est appelée). On l'utilise pour accéder aux propriétés et méthodes de l'objet. En résumé : pour connaitre sur quel objet je suis on utilise une variable particulière `$this`, elle fait référence à l'instance en cours.

Lorsqu'on veut accéder à quelque chose dans l'objet on utilise `->`

`date` est une propriété de l'objet `MaDate`. Cette propriété contient un autre objet qui est une instance de la classe `DateTime`. Donc quand on utilise `$this->date` on accède à la propriété `date` de l'objet `MaDate`.

`modify` est une méthode de l'objet `DateTime` en PHP. Cette méthode modifie l'objet `DateTime` en ajoutant des jours, mois...

**Source** :

- https://www.php.net/manual/fr/datetime.modify

### Instanciation

On crée une nouvelle version de l'objet. `$date1` et `$date2` sont 2 instances (Objets), les 2 variables sont du même type mais chaque variables seront indépendantes.

`MaDate` c'est le nom de ma classe, `$date1` et `$date2` sont les objets (instancié).

```php
$date1 = new MaDate("2024-02-24");
$date2 = new MaDate();
```

```php
$arr1 = array();
$arr2 = array(1, 2, 3);
```

### Propriétés

Sur nos objets on va avoir nos propriétés, nos objets vont avoir leurs variables comme un tableau va avoir des index.
Un objet va pouvoir avoir différent attributs ou différente propriétés. Ce sont des variables à l'intérieur de notre objet.

```php
$date->days;
$date->months;
$date->years;

```

### Constructeur

La méthode **constructeur** sert à initialisé les propriétés de l'objet. On peut passer des valeurs au constructeur et on peut utiliser ces valeurs pour définir les propriétés de l'objet. Le nom de la méthode en PHP est `__construct`.

```php
class Personne {
    public $nom;

    public function __construct($nom) {
        $this->nom = $nom;
    }
}

$personne = new Personne("Merlin");
echo $personne->nom;  // Affiche "Merlin"
```

La classe `Personne` a un constructeur qui prend un argument `$nom`. Lorsqu'on crée un nouvel objet `Personne`, on passe la chaîne de caractère `"Merlin"` au constructeur. Le constructeur assigne cette valeur à la propriété `nom` de l'objet. Donc après la création de l'objet, `$personne->nom` vaut `"Merlin"`.

### Destructeur

La méthode **destructeur** sert à libérer les ressources (détruire la classe) par exemple ferme une connexion à une base de données ou supprimer des fichiers temporaires. Dans certains cas, on voudra effectuer certaines actions juste avant que nos objets ne soient détruits (sauvegarder des valeurs de propriétés mis à jour ...)

```php
class Maison {
    public function __construct() {
        return 'La maison est construite.';
    }

    public function __destruct() {
        return 'La maison est détruite.';
    }
}

// Affiche : La maison est construite.
// Quand le script se termine, il affiche : La maison est détruite.
$maMaison = new Maison();

```

## Encapsulation

L'encapsulation est le mécanisme qui regroupe les données (propriétés, etc.) et les méthodes permettant de les manipuler au sein d'une même classe. L'objectif principal est de prévenir l'accès direct à certaines propriétés, méthodes ou constantes depuis l'extérieur de la classe, garantissant ainsi l'intégrité des données. Pour cela, on utilise des modificateurs d'accès, aussi appelés niveaux de visibilité, qui sont représentés par les mots-clés `public`, `private` et `protected`.

### Visibilités et portées des variables

Il existe **3 niveaux de visibilité** pour les variables (ou propriétés) dans une classe PHP :

- **`public`** : Une propriété déclarée comme `public` est accessible à la fois à l'intérieur de la classe où elle est définie et à l'extérieur de cette classe.
- **`private`** : Une propriété déclarée comme `private` est uniquement accessible à l'intérieur de la classe où elle est définie. Elle n'est pas accessible en dehors de cette classe.
- **`protected`** : Une propriété déclarée comme `protected` est accessible à l'intérieur de la classe où elle est définie (classe parente) ainsi que dans toutes les classes qui héritent de cette classe.

> [!NOTE]
> Bien que l'attribution d'un niveau de visibilité des propriétés dans une classe ne soit pas obligatoire en PHP, il est fortement recommandé de le faire. Si aucun niveau de visibilité n'est explicitement défini pour une propriété alors elle sera automatiquement défini comme `public`.
>
> On définira généralement nos méthodes avec le mot clé `public` et nos propriétés avec les mots clés `protected` ou `private`.

#### Getter & Setter

Avec l'encapsulation, chaque objet contrôle son propre état interne par des méthodes (getters et setters)

> [!IMPORTANT]
> Par défaut en général on déclare les propriétés (ou variables) d'une classe comme `private`.

Pour permettre un accès contrôlé à ces propriétés, on utilise généralement des méthodes spéciales appelées "accesseurs" et "mutateurs", ou plus communément "getters" et "setters".

- Un **getter** est une méthode qui renvoie la valeur d'une propriété privée.
- Un **setter** est une méthode qui définit la valeur d'une propriété privée.

```php
class Personne {
    private $nom;

    // Getter pour 'nom'
    public function getNom() {
        return $this->nom;
    }

    // Setter pour 'nom'
    public function setNom($nom) {
        $this->nom = $nom;
    }
}

$personne = new Personne();
$personne->setNom("Merlin");  // Utilise le setter pour définir 'nom'
echo $personne->getNom();  // Utilise le getter pour afficher 'nom'
```

## Classes étendues et héritage

Créer une classe "fille" grâce au mot clé `extends` qui va hériter de toutes les propriétés et méthodes de son parent par défaut (celle qui ne sont pas définie en `private`).

> [!WARNING]
> Afin d'être utilisées, les classes doivent déjà être connues et la classe mère doit être définie avant l'écriture d'un héritage (inclure les classes mères et fille dans le fichier de script principal en commençant par la mère).

**user.class.php**

```php
// Classe mère
class User
{
    // Déclaration des propriétés de notre classe Utilisateur
    // Private : propriétés accessible uniquement depuis l'intérieur de la classe
    protected $user_name;
    protected $user_pass;

    public function __construct($n, $p)
    {
        $this->user_name = $n;
        $this->user_pass = $p;
    }

    public function __destruct()
    {
        //Du code à exécuter
    }

    // Méthode getters : récupérer des valeurs
    public function getName()
    {
        // $this (pseudo-variable) qui sert à faire référence à l'objet intancié
        return $this->user_name;
    }

}
```

L'intérêt principal d'étendre des classes plutôt que d'en définir de nouvelles se trouve dans la notion d'héritage des propriétés et des méthodes : chaque classe étendue va hériter des propriétés et des méthodes (non privées) de la classe mère. Cela permettra une meilleure maintenabilité du code car en cas de changement il suffira de modifier le code de la classe mère.

**admin.class.php**

```php
// Classe étendue
class Admin extends User
{
    // On tente d'afficher $user_name qui n'existe pas dans Admin
    public function getName2()
    {
        return $this->user_name;
    }

    /*
    On surcharge la méthode getName() de User. Ici, on conserve
    le même code dans la méthode mais c'est cette méthode qui sera
    utilisée par $pierre
    */
    public function getName()
    {
        return $this->user_name;
    }
}
```

> [!NOTE]
> Lorsqu'on crée une architecture en POO PHP et qu'on laisse la possibilité à des développeurs externes de modifier ou d'étendre cette architecture, il sera nécessaire de proposer une rétrocompatibilité du code à chaque mise à jour importante.

### Méthodes

Sur notre objet on va pouvoir y appliquer des méthodes particulières. C'est exactement la même chose qu'une fonction sauf qu'elle s'applique sur un objet, sur une instance d'objet.

```php
$date->days();
$date->months();
$date->addDays(2);
$date->format('d/m/Y');

```

#### Méthodes statiques

Une **propriété** ou **méthode statique** n'appartient pas à une **instance spécifique** d'une classe (c'est à dire à un objet), mais plutôt à **la classe elle-même**. Contrairement aux propriétés et méthodes non statiques, elles ont **la même définition et la même valeur pour toutes les instances** de la classe.

> [!WARNING]
> Ne pas confondre propriétés statiques avec les **constantes de classe**. Une propriété statique peut changer de valeur, tandis qu'une constante a une valeur fixe.

Pour **déclarer** une propriété ou une méthode statique on utilise le mot-clé `static`.

Pour **accéder** à une propriété statique on utilise l'opérateur de résolution de portée `::`.

Les propriétés statiques sont utiles pour stocker des valeurs partagées par toutes les instances d'une classe, tandis que les méthodes statiques agissent sur la classe elle-même, sans nécessiter d'instanciation.

**classe avec méthode statique**

```php
class Text
{
    public static function withZero($number)
    {
        if ($number < 10) {
            return '0' . $number;
        } else {
            return $number;
        }
    }
}
```

**On accède à la méthode statique**

```php
require __DIR__ . '/classes/text.class.php';

Text::withZero(4)
```

## Design patterns

### Comment organiser ses objets

# L'architecture Modèle-Vue-Contrôleur (MVC)

Le MVC est une structure qui permet de séparer les différentes parties d'une application :

- **Modèles** : Gèrent les données et leur persistance (par exemple, accès à une base de données).
- **Vues** : Génèrent l'affichage final des pages (génération du code HTML).
- **Contrôleurs** : Réceptionnent les données entrées par l'utilisateur, communiquent avec les modèles et transmettent les informations aux vues.

Le **MVC** sépare les responsabilités entre **modèles**, **vues** et **contrôleurs** pour rendre le code plus maintenable et mieux organisé.

```php
// Modèle (exemple simplifié)
class Article {
    public static function getArticles() {
        // Récupère les articles depuis la base de données
        // ...
    }
}

// Contrôleur
class ArticleController {
    public function afficherArticles() {
        $articles = Article::getArticles();
        // Appelle la vue pour afficher les articles
        // ...
    }
}

// Vue (génère le HTML)
foreach ($articles as $article) {
    echo "<h2>" . $article->titre . "</h2>";
    echo "<p>" . $article->contenu . "</p>";
}

```