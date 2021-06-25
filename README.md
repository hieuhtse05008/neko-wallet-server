### RUN PROJECT WITH DOCKER

#### 1. SETUP
    - Edit file hosts -> 127.0.0.1 <yourdomainlocal>
    - Copy file .env.example -> .env
    - Run file: init.sh
#### 2. START DOCKER
    - Run file: start.sh
    (If you setup docker at the first time, you don't need start docker)
#### 3. STOP DOCKER
    - Run file: stop.sh

#### 4. CONNECT DOCKER
    - Run file: connect.sh

#### EDIT SOURCE CODE BEFORE RUN AUTO GENERATE CODE
1.  Edit file RepositoryGenerator.php (/vendor/infyomlabs/laravel-generator/src/Generators/RepositoryGenerator.php)\
    Line 23:\
    Before: `$this->fileName = $this->commandData->modelName . 'Repository.php';`\
    After: `$this->fileName = $this->commandData->modelName . 'RepositoryEloquent.php';`
2.  Edit file FactoryGenerator.php (/vendor/infyomlabs/laravel-generator/src/Generators/FactoryGenerator.php)\
    Line 71 add code:\
    `if (in_array($field->name,["creator_id", "updated_by", "deleted_by", "created_at", "updated_at","deleted_at"])) continue;`
#### HOW TO USE AUTO GENERATE CODE
1. Run generate code from database\
   `php artisan code:api-generate <model_name> --tableName=<table_name_in_database>`
2. Run generate code \
   `php artisan code:api-generate <model_name>`
3. Rollback (Not rollback Transformer, Presenter, Repository)\
   `php artisan infyom:rollback <model_name> api`

#### HOW TO USE AUTO GENERATE DOC API
1. Run command \
   `php artisan l5-swagger:generate`
   link: /api/documentation
