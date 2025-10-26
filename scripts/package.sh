#!/bin/sh
set -e

name=cv
timestamp=$(date '+%s')

dirname="$name"_"$timestamp"_amd64
mkdir -p $dirname/DEBIAN $dirname/srv/http/rirekisho.tsuku.ro
chmod 755 $dirname/DEBIAN

cat << EOF > $dirname/DEBIAN/control
Package: $name
Version: $timestamp
Architecture: all
Maintainer: Vasileios Pasialiokis <vas@tsuku.ro>
Description: personal CV
EOF

cp public/* $dirname/srv/http/rirekisho.tsuku.ro

dpkg-deb --build --root-owner-group $dirname
