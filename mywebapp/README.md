## adjust env variables:

You can override configurations from mywebapp_env like this:

```bash
export MWA_DB_NAME='mwa_db'
```
Be careful though. some variables must be kept in sync. For instance, if you change `$MWA_DB_PASS` you will run into trouble. Unless you apply the changes on `$MYSQL_ROOT_PASSWORD`, too.

## create a network
```bash
docker network create learndocker
```

## run a mysql machine:
```bash
docker container run --network learndocker --env-file mywebapp_env --rm --name mydbms -d mysql:5.7
```

## run mywebapp machine:
```bash
docker container run --network learndocker --env-file mywebapp_env --rm --name mywebapp -e MWA_DB_USER -e MWA_DB_PASS -e MWA_DB_NAME -p 80:80 -d mahyard/mywebapp:latest
```
