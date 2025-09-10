#!/bin/sh
set -e

name=cv
build=/tmp/build
timestamp=$(date '+%s')

mkdir -p public
php src/index.php > public/index.html

mkdir -p $build
dirname=$build/"$name"_"$timestamp"_amd64
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
cp $build/*deb .
