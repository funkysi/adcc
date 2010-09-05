rm -f /usr/local/psa/home/vhosts/arnoldanddistrictcameraclub.org.uk/httpdocs/backup/version2/adcc_imgs_site.tar.gz
rm -f /usr/local/psa/home/vhosts/arnoldanddistrictcameraclub.org.uk/httpdocs/backup/version2/adcc_live_sm.tar.gz

tar -cf /usr/local/psa/home/vhosts/arnoldanddistrictcameraclub.org.uk/httpdocs/backup/version2/adcc_live_sm.tar httpdocs/home httpdocs/purpose httpdocs/admin httpdocs/news httpdocs/committee httpdocs/css httpdocs/rss httpdocs/db httpdocs/download httpdocs/error httpdocs/gall httpdocs/include httpdocs/links httpdocs/location httpdocs/membership httpdocs/scripts httpdocs/schedule httpdocs/.htaccess httpdocs/favicon.ico httpdocs/fsi.php httpdocs/index.php httpdocs/robots.txt httpdocs/sitemap.php httpdocs/temp.txt httpdocs/version.php httpdocs/competition

tar -cf  /usr/local/psa/home/vhosts/arnoldanddistrictcameraclub.org.uk/httpdocs/backup/version2/adcc_imgs_site.tar httpdocs/imgs/site


gzip -9 /usr/local/psa/home/vhosts/arnoldanddistrictcameraclub.org.uk/httpdocs/backup/version2/adcc_imgs_site.tar
gzip -9 /usr/local/psa/home/vhosts/arnoldanddistrictcameraclub.org.uk/httpdocs/backup/version2/adcc_live_sm.tar

/usr/local/bin/mysqldump --user=adcc2 --password=cvZydwq web12-adcc2 >  	/usr/local/psa/home/vhosts/arnoldanddistrictcameraclub.org.uk/httpdocs/backup/version2/adcc_live.sql
