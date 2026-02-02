#!/bin/bash

read -p "Entra un número: " n1
read -p "Entra un altre número: " n2
read -p "Entra una operació (+,-,*,/): " operacio

if [ "$operacio" = "+" ]; then
        #envia a través del mètode HTTP GET
        curl "http://localhost/rest-php-calc/calculadora.php?num1=${n1}&num2=${n2}"

elif [ "$operacio" = "-" ]; then
        #envia a través del mètode HTTP POST
        curl -X POST http://localhost/rest-php-calc/calculadora.php \
             -H "Content-Type: application/json" \
             -d "{\"num1\": $n1, \"num2\": $n2}"

elif [ "$operacio" = "*" ]; then
        #envia a través del mètode HTTP PUT
        curl -X PUT http://localhost/rest-php-calc/calculadora.php \
             -H "Content-Type: application/json" \
             -d "{\"num1\": $n1, \"num2\": $n2}"

elif [ "$operacio" = "/" ]; then
        #envia a través del mètode HTTP DELETE
        curl -X DELETE http://localhost/rest-php-calc/calculadora.php \
             -H "Content-Type: application/json" \
             -d "{\"num1\": $n1, \"num2\": $n2}"

else
        echo "ERROR: Has d'escriure una operació vàlida."

fi
