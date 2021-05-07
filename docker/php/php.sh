flag=true

while $flag; do

    echo "wait"
    sleep 1

    if (docker-compose logs | grep bind-address > /dev/null 2>&1) ; then
		flag=false
	fi

done
