rm -f /usr/local/psa/home/vhosts/arnoldanddistrictcameraclub.org.uk/httpdocs/backup/version2/adcc_imgs.tar.gz
rm -f /usr/local/psa/home/vhosts/arnoldanddistrictcameraclub.org.uk/httpdocs/backup/version2/adcc_live_sm.tar.gz
tar -cf  /usr/local/psa/home/vhosts/arnoldanddistrictcameraclub.org.uk/httpdocs/backup/version2/adcc_imgs.tar -C /usr/local/psa/home/vhosts/arnoldanddistrictcameraclub.org.uk/httpdocs/ imgs
tar -cf  /usr/local/psa/home/vhosts/arnoldanddistrictcameraclub.org.uk/httpdocs/backup/version2/adcc_live_sm.tar -C /usr/local/psa/home/vhosts/arnoldanddistrictcameraclub.org.uk/ httpdocs --exclude 'backup' --exclude 'imgs'
gzip -9 /usr/local/psa/home/vhosts/arnoldanddistrictcameraclub.org.uk/httpdocs/backup/version2/adcc_imgs.tar
gzip -9 /usr/local/psa/home/vhosts/arnoldanddistrictcameraclub.org.uk/httpdocs/backup/version2/adcc_live_sm.tar

/usr/local/bin/mysqldump --user=adcc --password=cvZydwq web12-adcc >  	/usr/local/psa/home/vhosts/arnoldanddistrictcameraclub.org.uk/httpdocs/backup/version2/adcc_live.sql