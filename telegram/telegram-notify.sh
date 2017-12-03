#! /bin/bash
#Autor: Adail Horst (the.spaww@gmail.com)
#Site: http://www.spinola.net.br 
### Script de integracao com o Telegram ### 
#set -x
ENTER="
";
USERID="$1";

ARQUIVO="botinfo.txt";
if [ -f "$ARQUIVO" ]; then
  KEY=$(cat $ARQUIVO);
else
  KEY="CHAVE_DO_MEU_BOT";
fi

TIMEOUT="5";

TEXT="como ta eu sou o bot";

URL="https://api.telegram.org/bot$KEY/sendMessage"

RESPONSE=`curl -s --max-time $TIMEOUT -d "chat_id=$USERID&disable_web_page_preview=1&parse_mode=markdown&text=$TEXT" $URL`;
