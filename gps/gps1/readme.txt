#  gpstracker 1.0
#	Alok Sinha
#	asinha@g8.net
#     Modified websnarf tool portlistener to meet my requirements
#  Released as under GPL license

GPS tracker is an application that runs on linux *but should run on any os, with Perl, Apache, Mysql, PHP*, designed to track and trace gps devices such 
as TK-103, TK-102 and other devices that gives the output data in this format.

##,imei:354777031492395,A;##,imei:354777031492395,A;imei:354777031492395,tracker,1008081105,+919810159444,F,050546.000,A,2830.6607,N,07713.9468,E,0.25,;##,imei:354777031492395,A;
##,imei:354777031492395,A;##,imei:354777031492395,A;##,imei:354777031492395,A;

GPS Tracker has three parts

1. Listener to the data - portlistener.pl - A perl script that listens to the incoming data
2. Data parser - parser.php - data is parsed from the raw file and into db
3. Display and layout - *.php, files that are responsible for display of the tracks

A quick and dirty application created in less than 3 evenings (over and above my regular intensive job), so do not expect clean code and/or clean docuumented stuff, I have
tried to keep lot of comments at many places, hope you can get it running on your system.

Alok Sinha
asinha@g8.net
08-Aug-10

Features
---------

- Track device real time
- Customised devices - can handle more than one device, each with its own color
- Easy links for today, yesterday.
- Show distance travelled
- Show gas/fuel used in price
- Show equivalent far by auto, ac cab, cab etc
- many more.... will document them soon.
  

Php files
----------
index.php				root page for the app
	raw.php				Loads all data into, given variables
	lib.php				All functions are written here
	extract_db_php			Extracts data from db and readies for the show
	makemap.php			Makes the page layout, 
		form1.php		the time footer form
		scripts.php		google map, markers, etc comes from here.

parse.php				Independetn file, is called by portlistener.pl, reads data from /tmp/l.txt into db file


perl files
----------
portlistener.pl				This application listens to the port, waits for the incoming data and then uploads the data into /tmp/l.txt
					

db files
--------
trackpoint				Stores trackpoints parsed from l.txt
snapon					When snapon is enabled, this allows you to create your own snapon POI
gpstracker-config			Config file, must be populated for work. see the description colum to see what field effects what value
device_info				when more than one device is used, this determines custom information regarding the said device


Dependencies
--------------
	php				Pref version 5, but, I have not used any php5 related features. MUST also have the command line version. MUST have libmysql support.
	perl				i guess the most rudimentary will also work
	mysql				Rudimentary
	google api key			http://www.google.com/uds/solutions/wizards/mapsearch.html, a cheat site, where you can get your own google key, on the fly ;-)
	phpmyadmin			This app will make your life easy, higly recommended, tho, you can use your deft fingers on command line for achieving same results.


Installation
------------
	Unzip all contents in a web accessible directory
	Make sure, all files owned by web user
	Ensure data.xml file is writeable by web user.

	After you have done the below mentioned configuration
	Run portlistener.pl
		./portlistener.pl
	Now send sms to the device to set adminip to your hostip and port
	
	You may want to setup portlistener.pl to be run every time the system boots up.			

Configuration
--------------
	Get yourself googleapi key for the url that you are going to use.
	- raw.php			db related config chages + *MUST provide imei number*
	- portlistener.php		line 18-24, 
					line 257 - path, where the parser.php is stored
	- device_info.sql		db file, information regarding devices
	- gpstracker-config.sql		configuation for gpstracker *MUST configure path*
	- snapon.sql			points on map, that are to be used as snapon
When in doubt, leave defaults, *imei, application path, database details MUST be changed to meet yr requirement

Debugging
=========
1. tail /tmp/l.txt to see, if the device is talking to the server. It shoud show connection records from device
2. Check to see, if the data in the db is imported correctly.



