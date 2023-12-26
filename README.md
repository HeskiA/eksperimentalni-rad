# Eksperimentalni rad - IPVO

- Tema: Relational vs document database: response time for writes (single field vs whole document) and reads (that query entire complex tree like document, e.g. LI profile) from relational vs document DB

## Upute za pokretanje i benchmark

Nakon kloniranja repozitorija, pokrenuti kontejnere naredbom:

```
docker-compose up -d
```

Nakon pokretanja kontejnera, potrebno je pokrenuti sljedeće naredbe kako bi se generirali testni podaci (Faker):

```
docker exec -it <id sail/app kontejnera> bash
php artisan migrate
php artisan db:seed --class=ProfileSeeder
```

Kako bi testirali da sve funkcionira i da je API dostupan, možemo testirati korištenjem cUrl-a:

```
curl localhost/api/profile/1
```

Za pokretanje benchmarka, potrebno je ući u ljusku Apache Benchmark (ab) kontejnera gdje je postavljen ab alat:

```
docker exec -it <id ab kontejnera> sh
ab -n 100 -c 5 laravel.test/api/education 
```

Ako je sve u redu, izlaz mora izgledati ovako:

```
/ # ab -n 100 -c 5 laravel.test/api/education 
This is ApacheBench, Version 2.3 <$Revision: 1903618 $>
Copyright 1996 Adam Twiss, Zeus Technology Ltd, http://www.zeustech.net/
Licensed to The Apache Software Foundation, http://www.apache.org/

Benchmarking laravel.test (be patient).....done
```




