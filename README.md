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

## API Endpointovi

Za dohvaćanje podataka iz relacijske baze:

- laravel.test/api/profile/\<id_profila\>  (GET metoda, dohvaća iz više tablica sve podatke koji su potrebni za LinkedIn profil i vraća ih u JSON formatu)
- laravel.test/api/user - GET metoda - vraća sve retke iz tablice Users
- laravel.test/api/user/\<id_usera\> - GET metoda - vraća jednog usera po ID-ju
- laravel.test/api/user/\<id_usera\> - PUT metoda - ažurira usera, u tijelu zahtjeva je potrebno poslati JSON s novim podacima
- laravel.test/api/contactinfo - GET metoda - vraća sve retke iz tablice ContactInfo
- laravel.test/api/contactinfo/\<id\> - GET metoda - vraća jedan objekt po ID-ju
- laravel.test/api/contactinfo/\<id\> - PUT metoda - ažurira objekt, u tijelu zahtjeva je potrebno poslati JSON s novim podacima
- laravel.test/api/education - GET metoda - vraća sve retke iz tablice Education
- laravel.test/api/education/\<id\> - GET metoda - vraća jedan objekt po ID-ju
- laravel.test/api/education/\<id\> - PUT metoda - ažurira objekt, u tijelu zahtjeva je potrebno poslati JSON s novim podacima
- laravel.test/api/industry - GET metoda - vraća sve retke iz tablice Industry
- laravel.test/api/industry/\<id\> - GET metoda - vraća jedan objekt po ID-ju
- laravel.test/api/industry/\<id\> - PUT metoda - ažurira objekt, u tijelu zahtjeva je potrebno poslati JSON s novim podacima
- laravel.test/api/position - GET metoda - vraća sve retke iz tablice Position
- laravel.test/api/position/\<id\> - GET metoda - vraća jedan objekt po ID-ju
- laravel.test/api/position/\<id\> - PUT metoda - ažurira objekt, u tijelu zahtjeva je potrebno poslati JSON s novim podacima
- laravel.test/api/region - GET metoda - vraća sve retke iz tablice Region
- laravel.test/api/region/\<id\> - GET metoda - vraća jedan objekt po ID-ju
- laravel.test/api/region/\<id\> - PUT metoda - ažurira objekt, u tijelu zahtjeva je potrebno poslati JSON s novim podacima

Za dohvaćanje podataka iz dokumentne baze vrijedi isto, ali uz prefiks mongo, npr:

- laravel.test/api/mongoprofile/\<id profila\>
- laravel.test/api/mongocontactinfo/\<id\>
- itd...


