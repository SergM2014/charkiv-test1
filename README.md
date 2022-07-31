Application is based on Laravel Sail
how to install:

1. git clone https://github.com/SergM2014/charkiv-test1.git

2. cd charkiv-test1

3. ./vendor/bin/sail up -d

4. ./vendor/bin/sail shell

5. composer install

6. php artisan migrate --seed

go to http://localhost

 and is ready for usage.

  I should poin out the searching of price range.
 there are two fields minPrice and maxPrice. any variants for filling these Fields are possible and according to it the DB requestmechanism will be a bit diferent.

 The searching process is fullfiled by Query Builders, through Repository Design patern, no ActiveRecord aproach at all.

 the container binding and acording to it impementation of 5th Solid princples is actualised also.

 migration, factory, seeder are used.

 Json output is provided by usage of ResourceCollection.
 DatabaseException is also processed and return json responce.

 In my opinion, the architectury is good designed.

Ajax request is used, exactly fetch(). no complete reload of page. the query results are returned from server to special div to be presented.

Message system is represented. If request is successful and the datas are return successfuly, is the success message.
if request is failed from some reasons, so it is an alarm message.

front end is implemented on plain js and bootstap css file.
