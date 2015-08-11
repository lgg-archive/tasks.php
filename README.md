# PHP Task/Todo list

## Info
This is a simple task/todo list written in PHP. 
It uses a JSON text file for the tasks, and the visual side is created with the HTML5 Kickstart framework by Joshua Gatcke.

### Why use this over something like remember the milk, wunderlist or any other cloud service? 

- No ads
- Nobody selling your data
- Nobody monitoring your activity
- Data is easy to get out (no vendor lock-in) and to backup.
- Offline mode? Host it on your local machine with a LAMP/WAMP/MAMP/XAMPP server.
- Sync? Use a syncing service on the hosts ([owncloud](http://owncloud.org) and [sparkleshare](http://sparkleshare.org) are quite good) and point the program to a json file in that folder.
- Offline sync? Combine above 2 points, or put the software in a git, svn or other version control system repo.


## Changelog

### v0.1

- Added auth
- Added total task deletion
- Added task restore
- Added language choose
- Added russian language
- Added js libs to /js
- Added 2 row styles
- Refactor code
- Css improvements and fixes
- Sort language files
- Fixed security issue in readme(it was recommended 777)
- Some other improves

## Features

- Easy auth on/off
- Add/Remove/Update tasks
- Prioritize tasks
- Due date on tasks, time left/late shown
- Trash bin for deleted tasks
- No database required
- Language select(ru and en available)

## Download
Either *git clone* the github repo:

    git clone git://github.com/littleguga/tasks.php.git

## Install

Unzip the file and upload to the web-directory (public_html, /var/www/, /srv/httpd etc..) and make sure that the webserver can write to the json file(660 + chgrp www-data).
[you can get perms faq here](http://askubuntu.com/questions/46331/how-to-avoid-using-sudo-when-working-in-var-www)

## License
The MIT License (MIT)

Code by [Remy van Elst](https://raymii.org) (c) 2012

improvements by [littleguga](https://github.com/littleguga) (c) 2015

## Links
- [Original repo](https://github.com/RaymiiOrg/tasks.php)
- [HTML5 Kickstart](https://github.com/joshuagatcke/HTML-KickStart)