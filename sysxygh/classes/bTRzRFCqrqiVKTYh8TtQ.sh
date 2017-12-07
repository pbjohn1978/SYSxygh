#/bin/bash
host=$1
ping=`ping -c 1 $host | grep bytes | wc -l`
if [ "$ping" -gt 1 ];then
	echo "is up";
else
	echo "is down";
fi

