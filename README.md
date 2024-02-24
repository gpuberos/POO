# POO (Programmation Orientée Objet)

## Les objets

### C'est quoi ?

Un objet est une instance d’une classe. Une classe est une structure qui définit les propriétés (aussi appelées attributs) et les méthodes (fonctions) que tous les objets de cette classe auront.

**En résumé** :

On crée une classe dans cette classe on va pouvoir définir des propriétés, ces propriétés sont des variables spécifiques ou des caractéristiques et ensuite on peut faire des méthodes (c'est comme des fonctions). Ces méthodes peuvent prendre des paramètres et elles peuvent manipuler l'instance en utilisant le mot clé `$this` qui fera toujours référence à l'objet sur lequel la méthode est utilisé.

> [!TIP]
> **Bonne pratique** : on crée un fichier PHP par classe.

> [!NOTE]
> PHP a la capacité de créer des propriétés dynamiquement, cependant, il n’est pas recommandé de le faire car cela peut rendre le code plus difficile à comprendre.

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
$date->days
$date->months
$date->years

```

### Méthodes

Sur notre objet on va pouvoir y appliquer des méthodes particulières. C'est exactement la même chose qu'une fonction sauf qu'elle s'applique sur un objet, sur une instance d'objet.

```php
$date->days()
$date->months()
$date->addDays(2)
$date->format('d/m/Y')

```

## Design patterns

### Comment organiser ses objets