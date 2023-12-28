## Create chat application with laravel and soketi
- Create presence channel and publish messages to soketi from laravel
- listen to publish messages
- console log joining and leaving users for `chat` channel

### installation
#### 1- Run docker build
```
$ docker-compose build
```

#### 2- Copy .env
```
$ cp .env.example .env
```

#### 3- Generate application key
```
$ docker-compose run jobs php artisan key:generate
```

#### 4- Install npm packages
```
$ docker-compose run jobs npm install
```

#### 5- Build mix files
```
$ docker-compose run jobs npm run dev
```

#### 6- Execute migration
```
$ docker-compose run jobs php artisan migrate
```

#### 7- Run seeder
```
$ docker-compose run jobs php artisan db:seed --class=DatabaseSeeder
```

#### 8- Starting application
```
$ docker-compose up web
```

#### 9- Open url http://localhost:8090/chat