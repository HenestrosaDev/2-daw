#!/bin/bash
ldapadd -x -D cn=admin,dc=ejemplo,dc=com -W -H ldapi:/// -f 1.ldif && ldapadd -x -D cn=admin,dc=ejemplo,dc=com -W -H ldapi:/// -f 2.ldif 
# Si se desean eliminar los ficheros tras su ejecución: && rm 1.ldif 2.ldif
