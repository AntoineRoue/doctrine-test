Relevant files to understand test cases :
- config/packages/doctrine.yaml
- src/Entity/A.php
- src/Entity/B.php
- migrations/Version20240418090239.php
- src/Controller/TestController.php

How to reproduce my test cases :

- `docker compose up -d`
- `symfony console doctrine:database:create`
- `symfony console doctrine:migrations:migrate -n`
- `symfony serve -d`
- Go to https://localhost:8000/test1 or https://localhost:8000/test2
