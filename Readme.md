# Настройка сервера
https://www.digitalocean.com/community/tutorials/how-to-install-the-apache-web-server-on-ubuntu-20-04-ru
```shell
sudo apt install -y apache2
```

# Проверка веб-сервера
```shell
sudo systemctl status apache2
sudo systemctl reload apache2
```

Можно проверить какой у сервера ip
```shell
curl -4 icanhazip.com
```

# Запуск сертбота
Мы подтверждаем право на домен при помощи веб-сервера. Можно подтвердить с помощью txt записи в dns, но сейчас подтверждаем именно как веб сервер.
```shell
certbot certonly --webroot --agree-tos --email kolelan@yandex.ru --webroot-path /var/www/html/ -d xn--h1adlijh.xn--p1ai
```

```shell
Welcome to Ubuntu 20.04.3 LTS (GNU/Linux 5.4.0-94-generic x86_64)

 * Documentation:  https://help.ubuntu.com
 * Management:     https://landscape.canonical.com
 * Support:        https://ubuntu.com/advantage
Last login: Thu Jan 13 10:34:43 2022 from 31.173.84.80
root@194-58-97-60:~# certbot certonly --webroot --agree-tos --email kolelan@yandex.ru --webroot-path /var/www/html/ -d xn--h1adlijh.xn--p1ai
Saving debug log to /var/log/letsencrypt/letsencrypt.log
Plugins selected: Authenticator webroot, Installer None

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
Would you be willing to share your email address with the Electronic Frontier
Foundation, a founding partner of the Let's Encrypt project and the non-profit
organization that develops Certbot? We'd like to send you email about our work
encrypting the web, EFF news, campaigns, and ways to support digital freedom.
- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
(Y)es/(N)o: Y
Obtaining a new certificate
Performing the following challenges:
http-01 challenge for xn--h1adlijh.xn--p1ai
Using the webroot path /var/www/html for all unmatched domains.
Waiting for verification...
Cleaning up challenges

IMPORTANT NOTES:
 - Congratulations! Your certificate and chain have been saved at:
   /etc/letsencrypt/live/xn--h1adlijh.xn--p1ai/fullchain.pem
   Your key file has been saved at:
   /etc/letsencrypt/live/xn--h1adlijh.xn--p1ai/privkey.pem
   Your cert will expire on 2022-04-13. To obtain a new or tweaked
   version of this certificate in the future, simply run certbot
   again. To non-interactively renew *all* of your certificates, run
   "certbot renew"
 - Your account credentials have been saved in your Certbot
   configuration directory at /etc/letsencrypt. You should make a
   secure backup of this folder now. This configuration directory will
   also contain certificates and private keys obtained by Certbot so
   making regular backups of this folder is ideal.
 - If you like Certbot, please consider supporting our work by:

   Donating to ISRG / Let's Encrypt:   https://letsencrypt.org/donate
   Donating to EFF:                    https://eff.org/donate-le

```
После успешного выполнения команды, сертификаты будут созданы в каталоге /etc/letsencrypt/live/xn--h1adlijh.xn--p1ai, а также симлинки на них в каталоге /etc/letsencrypt/live/xn--h1adlijh.xn--p1ai. При настройке приложений, стоит указывать пути до симлинков, так как при обновлении файлы в первом каталоге будут меняться, во втором — нет. Есть в интернете такая информация, что публичный ключ будет с именем cert.pem, а приватный — privkey.pem, но мы видим что у нас там целый набор:

```shell
root@194-58-97-60:/etc/letsencrypt/live/xn--h1adlijh.xn--p1ai# ls
cert.pem  chain.pem  fullchain.pem  privkey.pem  README
```

Если вы посмотрите в папку /etc/letsencrypt/live/xn--h1adlijh.xn--p1ai#, то увидите там четыре файла:

- /etc/letsencrypt/live/xn--h1adlijh.xn--p1ai/cert.pem - файл сертификата, его необходимо прописать в параметре SSLCertificateFile;
- /etc/letsencrypt/live/xn--h1adlijh.xn--p1ai/chain.pem - файл цепочки сертификата, обычно прописывается в параметре SSLCertificateChainFile;
- /etc/letsencrypt/live/xn--h1adlijh.xn--p1ai/privkey.pem - приватный ключ сертификата, должен быть прописан в SSLCertificateKeyFile;
- /etc/letsencrypt/live/xn--h1adlijh.xn--p1ai/fullchain.pem - в нём объединено содержимое cert.pem и chain.pem, можно использовать вместо этих обоих файлов.

Для обычного сайта у нас виртуальный хост существует. Осталось создать виртуальный хост для SSL версии. Тут кроме стандартных настроек надо добавить четыре параметра.
```text
SSLEngine on
SSLCertificateFile /путь/к/сертификату.pem
SSLCertificateChainFile /путь/к/сертификату/цепочки.pem
SSLCertificateKeyFile /путь/к/приватному/ключу.pem
```
