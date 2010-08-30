#cd /var/www/html/private/trunk/
find -type f |
while read file
do    
if [ "`head -c 3 -- "$file"`" == $'\xef\xbb\xbf' ]    
then        
echo "found BOM in: $file"    
fi
done
