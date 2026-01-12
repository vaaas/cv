#!/bin/sh
set -e

USER=root
HOST='[2a01:4f9:6b:fa7d::a]'
SOURCE=public
TARGET=/srv/http/rirekisho.tsuku.ro

echo 'deploying'
rsync --verbose         \
      --recursive       \
      --update          \
      -e "ssh -l $USER" \
      $SOURCE/*         \
      $HOST:$TARGET
echo 'done!'
