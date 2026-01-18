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