# SYSxygh

I have created a Server Networking Administrator web utility that allows the
administrator to do tasks remotely as long as the server is connected to the internet. This
web utility will Create users, Update users, List users and Delete users. It can also
Upload files to the server and manage those files. There is a fully functional command
line tool built into the website that can run commands directly from the server including
grant permissions to uploaded files than execute the file. I have also built a Networking
section on the website than can gather information about the network the web server is
currently on. The networking tool gathers all ICMP (ping) responses from the network
than outputs all active IP addresses via the ARP (address resolution protocol) data
retrieved. Once the Networking tool gathers the active IP addresses it than has the option
to do a port scan to find open ports on all the “UP” IP’s. This port scan will return all the
current Open ports (1-65535) on the active IP address. To accomplish the network scan
and port scans more quickly I utilize Mult-threading so the process doesn’t take more
than 20 seconds.

# Requirements:
```
Linux ( Tested on KALI Linux which meets all requirements but not suggested for a production environment )
python installed
PHP installed (5.0+)
MySQL installed
Apache installed (2.0+)
```

# TO INSTALL:
from your command line run the following commands:
```
>-> cd /var/www/html/

>-> sudo git clone https://github.com/pbjohn1978/SYSxygh/

>-> sudo python ./SYSxygh/InstallSYSxygh.py
```
You will than see output giving the proper URL to go to and sign in to the SYSxygh web GUI.

THIS SOFTWARE COMES WITH NO WARRENTY OF ANY KIND... THIS SOFTWARE COMES WITH NO LICENCE, USE IT IF YOU WANT...
