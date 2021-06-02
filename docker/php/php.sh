flag=true

while $flag; do

  sleep 1

  if (docker-compose logs | grep bind-address > /dev/null 2>&1) ; then
    flag=false
    echo "mysql ready"
  fi

done
