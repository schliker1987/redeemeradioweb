#!/usr/bin/python
import urllib
import os

a=urllib.urlopen('http://127.0.0.1/glype/index.php')
code=a.getcode()

if code != 200:
    print "php fail..."
    os.system("sudo service php5-fpm restart")
    os.system("sudo service uwsgi restart")
    print "...", "restarted"
else:
    print "php checked..."
    print "ok"


a=urllib.urlopen('http://127.0.0.1/cgiproxy/nph-proxy.cgi')
code=a.getcode()

if code != 200:
        print "fcgi fail..."
        os.system("sudo service fcgiwrap restart")
        print "...", "restarted"
else:
        print "fcgi checked..."
        print "ok"
