# irantalent
Job Position Test

<h4>Run & Test :</h4>
```
1. docker pull mariadb:10.4 
   docker pull php:7.4-apache
   docker pull elasticsearch:7.9.3 
2. docker build -t irantalentphp:7.4-apache .
3. docker stack deploy -c Stack.yml irantalent
4. docker network create somenetwork
5. docker run -d --name elasticsearch --net somenetwork -p 9200:9200 -p 9300:9300 -e "discovery.type=single-node" elasticsearch:7.9.3
6. you can see http://localhost:8080/api?token=1
      here, see migrate button, click it and refresh page
7. for run database seeder, go to below address for once :
      http://localhost:8080/api/seed?token=1
```

---

<h4>API Address :</h4>
__http://localhost:8080__<br />
/api/?page=1 *(GET)*<br />
/api/view/<id> *(GET)*<br />
/api/create *(POST)*<br />
/api/update/<id> *(PUT)*<br />
/api/delete/<id> *(DELETE)*<br />
/api/search?title=&category_title=&location_title=&education_title=&gender&age=&lived_at=&salary=&expired_at=&created_at= *(GET)*
