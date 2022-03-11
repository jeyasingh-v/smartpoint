# Prerequisite
- 	Php: 7.4.3
-	Composer: 2.2.5
-	mysql:8.0

-	PHP Extension: BCMath, Ctype, Fileinfo, JSON, Mbstring, OpenSSL, PDO, Tokenizer, XML, Mysql

# Setup instructions

-   Install Composer, PHP, Mongodb, PHP Extension
- 	composer install
-	npm install && npm run dev
- 	Create .env
		
	```sh

		APP_NAME=Laravel
		APP_ENV=local
		APP_KEY=base64:a9ssNz+RATu51mJLcFiP6sVIXCbkhT/DM9efOrhkkqs=
		APP_DEBUG=true
		APP_URL=http://localhost

		LOG_CHANNEL=stack
		LOG_DEPRECATIONS_CHANNEL=null
		LOG_LEVEL=debug

		DB_CONNECTION=mysql
		DB_HOST=127.0.0.1
		DB_PORT=3306
		DB_DATABASE=smartpoint
		DB_USERNAME=root
		DB_PASSWORD=root-123

		BROADCAST_DRIVER=log
		CACHE_DRIVER=file
		FILESYSTEM_DRIVER=local
		QUEUE_CONNECTION=sync
		SESSION_DRIVER=file
		SESSION_LIFETIME=120

		MEMCACHED_HOST=127.0.0.1

		REDIS_HOST=127.0.0.1
		REDIS_PASSWORD=null
		REDIS_PORT=6379

		MAIL_MAILER=smtp
		MAIL_HOST=mailhog
		MAIL_PORT=1025
		MAIL_USERNAME=null
		MAIL_PASSWORD=null
		MAIL_ENCRYPTION=null
		MAIL_FROM_ADDRESS=null
		MAIL_FROM_NAME="${APP_NAME}"

		AWS_ACCESS_KEY_ID=
		AWS_SECRET_ACCESS_KEY=
		AWS_DEFAULT_REGION=us-east-1
		AWS_BUCKET=
		AWS_USE_PATH_STYLE_ENDPOINT=false

		PUSHER_APP_ID=
		PUSHER_APP_KEY=
		PUSHER_APP_SECRET=
		PUSHER_APP_CLUSTER=mt1

		MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
		MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

	```
-	Run php artisan migrate

- 	CLI Command to GET, POST, DELETE
	```sh
		php artisan empdata:SET 1 'Jeya SIngh v' '192.168.1.2'
		php artisan empdata:GET '192.168.1.2'
		php artisan empdata:UNSET '192.168.1.2'
		php artisan empdata:GET '192.168.1.2'

		php artisan empwebhistory:SET 192.168.1.2 'http://google.com'
		php artisan empwebhistory:GET 192.168.1.2
		php artisan empwebhistory:UNSET 192.168.1.2
		php artisan empwebhistory:GET 192.168.1.2
	```
# Tlint Setup
- 	Set Path 
		export PATH="$PATH:$HOME/.config/composer/vendor/bin"
- Run tlint command in project root folder
