# SSPanel Vela
Forked from [SSPanel UIM](https://github.com/Anankke/SSPanel-Uim)
Web panel for Shadowsocks & ShadowsocksR and V2Ray, based on ss-panel-v3-mod.

## Requirements
- ✅ PHP 8.0+
- ✅ Composer
- ✅ MariaDB / MySQL
- ✅ Nginx (or other web server supports PHP-CGI)

## Installation

### Clone the “froseiun/dev” branch of this repository
```bash
git clone -b froseiun/dev git@github.com:froseiun/sspanel-vela.git
```
### Set git filemode to false
```bash
git config core.filemode false
```
### Install PHP Composer packages
```bash
wget https://getcomposer.org/installer -O composer.phar

php composer.phar
php composer.phar install
```
### Change folder permissions and ownership

## Usage

### Create Database and import database file
`sql/glzjin_all.sql`

### Edit config files

Example config files:

`config/.config.example.php`

`config/appprofile.example.php`

Rename to:

`config/.config.php`

`config/appprofile.php`

Follow the notes and edit it.

### Create Admin User
`php xcat User createAdmin`

### Other Configurations
```bash
php xcat User resetTraffic
php xcat Tool initQQWry
php xcat Tool initdownload
```

### Set up cron jobs
```bash
30 22 * * * php /[webroot]/xcat SendDiaryMail
0 0 * * * php -n /[webroot]/xcat Job DailyJob
*/1 * * * * php /[webroot]/xcat Job CheckJob
```

## Development (Linux)
Notice: default config for dev setup is insecure. Do not use in production.

Run the following code to set up testing containers.

```shell
cp ./config/.config.example.php ./config/.config.php
sed -i "s/^\$_ENV\['debug'\].*/\$_ENV\['debug'\] = true;/" ./config/.config.php
sed -i "s/^\$_ENV\['db_host'\].*/\$_ENV\['db_host'\] = 'mariadb:3306';/" ./config/.config.php
sed -i "s/^\$_ENV\['db_username'\].*/\$_ENV\['db_username'\] = 'sspanel';/" ./config/.config.php
sed -i "s/^\$_ENV\['baseUrl'\].*/\$_ENV\['baseUrl'\] = 'https:\/\/localhost:8081';/" ./config/.config.php
touch ./vendor/autoload.php
wget https://github.com/metowolf/qqwry.dat/releases/latest/download/qqwry.dat -O ./storage/qqwry.dat

cp ./config/appprofile.example.php ./config/appprofile.php
mkdir -p certs
openssl req -x509 -nodes -days 3650 -newkey rsa:4096 -sha256 -keyout ./certs/nginx.key -out ./certs/nginx.crt -subj '/CN=localhost'
docker compose up --build
```

The website will be served at https://localhost:8081 with admin login credential: `a@a.com` / `sspanel`

## Donate

### Anankke

[Anankke 很可爱请给 Anankke 钱](https://t.me/anankke/7)

### galaxychuck

[moecloud-美國VPS](https://lite.moe/aff.php?aff=56)

### laurieryayoi

[dmit-美国香港服务器](https://www.dmit.io/aff.php?aff=912)

### M1Screw

[Vultr-不用我多解釋了吧](https://www.vultr.com/?ref=8941355-8H)

## License
[MIT](https://raw.githubusercontent.com/froseiun/sspanel-vela/froseiun/dev/LICENSE)
