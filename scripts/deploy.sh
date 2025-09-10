#!/bin/sh
pkg=`ls *deb`
scp -P $PORT $pkg $USER@$DOMAIN:/root/$pkg
ssh -p $PORT $USER@$DOMAIN dpkg -i /root/$pkg
ssh -p $PORT $USER@$DOMAIN rm -v /root/$pkg
