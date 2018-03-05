# Once upon a time ...

* Symfony mit CLI

`composer create-project "symfony/skeleton:^3.3" nevercodealon-demo-app`

* `\App\Controller\DefaultController` mit `indexAction` anlegen -> routes eintrag ändern, Response nur mit `new Response`
* `extends Controller` `$this->render()` -> Fehler
`composer req twig`

* Einfach tun was man uns sagt
* * TwigBundle wurde installiert
* * Template anlegen in `templates/default/index.html.twig`

# More Sites

* easy, Symfony ist ein MVC, Routing macht Spass, also {Task für Publikum}
* Anlegen: Seite, die einen speziellen Artikel skizzieren soll
* `ArticleController` angelegt
* `indexAction` mit Parameter `articleName`, der einem Template überreicht wird
* Route angelegt, sollte Parameter enthalten

# Dynamisches Routing

`composer req jackalope/jackalope-doctrine-dbal`
`composer req doctrine/doctrine-cache-bundle`
`composer req doctrine/phpcr-odm`

Config:

```yaml
# into doctrine.yaml
# for jackalope-doctrine-dbal
doctrine:
    dbal:
        driver:   '%env(DATABASE_DRIVER)%'
        path:     '%env(DATABASE_PATH)%'
        charset:  UTF8

# cmf configuration
doctrine_phpcr:
    # configure the PHPCR session
    session:
        backend:
             type: doctrinedbal
             connection: default
             caches:
                 meta: doctrine_cache.providers.phpcr_meta
                 nodes: doctrine_cache.providers.phpcr_nodes
             parameters:
                 jackalope.check_login_on_server: false
        workspace: '%env(PHPCR_WORKSPACE)%'
        username: '%env(PHPCR_USER)%'
        password: '%env(PHPCR_PASSWORD)%'
    # enable the ODM layer
    odm:
        auto_mapping: true
        auto_generate_proxy_classes: true

doctrine_cache:
    providers:
        phpcr_meta:
            type: file_system
        phpcr_nodes:
            type: file_system
```
`composer req doctrine/phpcr-bundle`
`composer req doctrine/doctrine-bundle`

- Init database and its repository

```yaml
  bin/console doctrine:database:create
  bin/console doctrine:phpcr:init:dbal --force
  bin/console doctrine:phpcr:workspace:create default
  bin/console doctrine:phpcr:repository:init
```

- Install routing

`composer req asset`
`composer req validator`
`composer req symfony/templating`
`composer req symfony-cmf/routing-bundle`

- Zum richtig los legen und skizzieren

`composer req doctrine/data-fixtures`

- erstelle `App\AppBundle` (symfony 4 ist Bundle-Less, oder hat es zum Ziel) und trage es in `bundles.php` ein

- erstelle erste Route im Fixture-Loader (was ist ein Fixture-Loader)
- - Nutze `NodeHelper` zum generieren eines eigenen Pfades – schließlich wollen wirs ja in einem Repo 
ablegen
- - Hole root Route und erstelle Route mit ihr als parent und defaults auf neuen Controller

# Content

`composer req security`
`composer req symfony-cmf/content-bundle`

- In `cmf_content.yaml`

```yaml
cmf_content:
    persistence:
        phpcr: ~
```

- erstelle root node für content wie beim Routing
- erstelle `StaticContent` mit name, title, body, und parentDocument
- `doctrine:phpcr:node:dump` -> man siehts
- Noch kein Bezug zur Route? Wie stellen wir das an?
- Erst mal die Erstellung der Route zum Content holen
- Zusammenführen durch `$route->setContent()`
- Alles was zum  `DynamicRoutingController` führte kann jetzt weg
- `doctrine:phpcr:node:dump` -> man sieht? Nö noch nicht
- `doctrine:phpcr:node:dump --props` nun wirds klar
- URL aufrufen
- template anlegen
- geht dann 

# Translatable

`composer req symfony-cmf/core-bundle`
```yaml
cmf_core:
    multilang:
        locales: [en,de]
lunetics_locale:
    strict_mode: true
    guessing_order:
        - router
        - cookie
        - browser
    allowed_locales: [en,de]
```
`composer req lunetics/locale-bundle`
- zu `doctrine_phpcr.odm`:
```yaml
        locales:
            en: [de]
            de: [en]
```
- content + routing + bind Translation
- load fixtures
- see nodes


