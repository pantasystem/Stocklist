flag=true

while $flag; do

<<<<<<< HEAD
  sleep 1

  if (docker-compose logs | grep bind-address > /dev/null 2>&1) ; then
    flag=false
    echo "mysql ready"
  fi
=======
    sleep 1

    if (docker-compose logs | grep bind-address > /dev/null 2>&1) ; then
    echo "Mysql Ready"
		flag=false
	fi
>>>>>>> 94bf2f76d4e17e20978d3a41ac6ed0e90fcd7bae

done
