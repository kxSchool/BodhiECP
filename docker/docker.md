docker network create -d bridge php-net
docker run -d -p 3306:3306 --privileged=true  -e MYSQL_ROOT_PASSWORD=123456 --name mysql  --network php-net mysql:5.7 docker-entrypoint.sh mysqld
docker run -d --name phpfpm --network php-net -v /data:/data php:5.6-fpm
	docker exec -it php bash
	cd /usr/local/bin  
	./docker-php-ext-install pdo_mysql  
	./docker-php-ext-install mysql
	./docker-php-ext-install mysqli
	docker-php-ext-install bcmath
	docker-php-ext-install mbstring
	apt-get update && apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev
	docker-php-ext-install -j$(nproc) iconv
	docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/
	docker-php-ext-install -j$(nproc) gd
	pecl install redis-4.0.1 && pecl install xdebug-2.6.0 && docker-php-ext-enable redis xdebug

docker run --name nginx -d --network php-net -p 80:80 -v /data:/data nginx:latest
	apt-get update
	apt-get install vim
	# 安装 ifconfig, ping
	apt update
	apt install net-tools iputils-ping
	# 安装依赖(安装gd扩展等必须要先安装系统依赖)
	apt install libfreetype6-dev libmcrypt-dev libpng-dev libjpeg-dev libpng-dev sendmail zlib1g-dev



docker exec -it 89c8174d2db0 /bin/bash
 
server {
    listen       80;
    listen  [::]:80;
    server_name  ci.bodhitest.com;
    location / {
        root   /data/BodhiEC/test/CodeIgniter3.0.6;
        index  index.php;
        try_files $uri $uri/ /index.php;
    }   
    error_page   500 502 503 504  /50x.html;
    location = /50x.html {
        root   /data/BodhiEC/test/CodeIgniter3.0.6;
    }
    location ~ \.php$ {
        root           /data/BodhiEC/test/CodeIgniter3.0.6;
        fastcgi_pass   172.18.0.3:9000;
        fastcgi_index  index.php;
        fastcgi_param  SCRIPT_FILENAME  /data/BodhiEC/test/CodeIgniter3.0.6/$fastcgi_script_name;
        include        fastcgi_params;
    }

}



docker-php-ext-install gd &&  docker-php-ext-configure gd   --enable-gd-native-ttf    --with-jpeg-dir=/usr/lib  --with-freetype-dir=/usr/include/freetype2 &&   docker-php-ext-install gd

chown -R www-data:www-data BodhiEC
chmod -R 755 BodhiEC