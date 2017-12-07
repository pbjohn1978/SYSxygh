#!/bin/bash
import os
import MySQLdb as mdb
import socket 
print("Starting Install...")
#start MySQL section
if(os.system("sudo service mysql start") == 0):
	print("MySql is now started.")
else:
	print("there is a problem with starting MySQL, please turn it on manually than rerun this script.")


#start Apache section
if(os.system("sudo systemctl start apache2") == 0):
	print("Apache is now started.")
else:
	print("there is a problem with starting Apache, please turn it on manually than rerun this script.")

#Chmod files that need it for website scripts
file1 = os.path.isfile("/var/www/html/SYSxygh/sysxygh/classes/bTRzRFCqrqiVKTYh8TtQ.sh")
file2 = os.path.isfile("/var/www/html/SYSxygh/sysxygh/classes/Rme6jc7n7zpCMJLprV1X.py")
file3 = os.path.isfile("/var/www/html/SYSxygh/sysxygh/classes/w3Y1anVD77Qoki2Cdvnn.py")
dire1 = os.path.isdir("/var/www/html/SYSxygh/sysxygh")

if(file1 & file2 & file3 & dire1):
	if(os.system("sudo chmod 777 /var/www/html/SYSxygh/sysxygh/classes/bTRzRFCqrqiVKTYh8TtQ.sh") == 0 &
	   os.system("sudo chmod 777 /var/www/html/SYSxygh/sysxygh/classes/Rme6jc7n7zpCMJLprV1X.py") == 0 &
	   os.system("sudo chmod 777 /var/www/html/SYSxygh/sysxygh/classes/w3Y1anVD77Qoki2Cdvnn.py") == 0 &
	   os.system("sudo chmod 777 /var/www/html/SYSxygh/sysxygh")):
		print("Files have nessary permitions...")
	else:
		print("There has been an error granting permitions to the nessary SYSxygh files.")
else:
	print("the nessary files for SYSxygh have not been put in the /var/www/html directory... ")
	print("please copy the SYSxygh files to /var/www/html than run this script again...")

#creating the Database for SYSxygh
db = mdb.connect()
c = db.cursor()
c.execute("DELETE FROM mysql.user WHERE user='sysxyghWebGUI'")
c.execute("DROP DATABASE IF EXISTS sysxygh;")
c.execute("CREATE DATABASE sysxygh;")
c.execute("GRANT ALL PRIVILEGES ON sysxygh.* to sysxyghWebGUI@'%' IDENTIFIED BY 'YixkmYBVQO88BaqF5dGNyC9xbt5DD1VmWYkrESMfJvfqPtnKvxkInhPiut45';")
c.close()

os.system("sudo mysql -u sysxyghWebGUI -pYixkmYBVQO88BaqF5dGNyC9xbt5DD1VmWYkrESMfJvfqPtnKvxkInhPiut45 sysxygh < /var/www/html/SYSxygh/sysxygh.sql") 

file4 = os.path.isfile("/var/www/html/SYSxygh/sysxygh/sysxygh.jsproj")
file5 = os.path.isfile("/var/www/html/SYSxygh/sysxygh/sysxygh.jsproj.usr")
file6 = os.path.isfile("/var/www/html/SYSxygh/sysxygh/sysxygh.sln")
file7 = os.path.isfile("/var/www/html/SYSxygh/sysxygh/sysxygh.sql")
file8 = os.path.isfile("/var/www/html/SYSxygh/sysxygh/taco.json")

if(file4 & file5 & file6 & file7 & file8):
    os.system("sudo rm /var/www/html/SYSxygh/sysxygh/sysxygh.jsproj")
    os.system("sudo rm /var/www/html/SYSxygh/sysxygh/sysxygh.jsproj.usr")
    os.system("sudo rm /var/www/html/SYSxygh/sysxygh/sysxygh.sln")
    os.system("sudo rm /var/www/html/SYSxygh/sysxygh/sysxygh.sql")
    os.system("sudo rm /var/www/html/SYSxygh/sysxygh/taco.json")


print("")
print("")
s = socket.socket(socket.AF_INET, socket.SOCK_DGRAM)
s.connect(("8.8.8.8", 80))
ipAddress = s.getsockname()[0]
s.close()

print( 'Your IP is: ' + str(ipAddress) )
print('Place this url in your favorite browser: http://' + str(ipAddress) + '/SYSxygh/sysxygh/home.php')
print("")
print("username: admin")
print("password: sysxygh")
print("")
print("You should change your password from the default as soon as you can.")
print("Install Complete...")























