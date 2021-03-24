# Backend

Install dependencies

    pip install -r requirements.txt

Docker-compose

    docker-compose up db

Create database

    psql -U postgres -h 0.0.0.0 -p 5432

    CREATE DATABASE "app-financial";
    \q

Migrade database

    python manage.py migrate

Run server

    python manage.py runserver


## API Docs

* http:localhost:8000/

## Dependencies

* https://www.djangoproject.com/
* https://www.django-rest-framework.org/
* https://django-environ.readthedocs.io/
* https://django-rest-framework-simplejwt.readthedocs.io
* https://drf-yasg.readthedocs.io/
