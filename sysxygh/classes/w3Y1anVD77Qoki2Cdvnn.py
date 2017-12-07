#!/usr/bin/python
import socket
import threading
from queue import Queue
import sys

print_lock = threading.Lock()
target = sys.argv[1]

q = Queue()
#print("threads: " + str(threading.activeCount()))	
def portscan(port):
	s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
	s.settimeout(0.5)
	try:
		con = s.connect((target,port))
		with print_lock:
			print(port)
		con.close()
	except:
		pass

def threader():
	while True:
		portToScan = q.get()
		portscan(portToScan)
		q.task_done()

for x in range(200):
	t = threading.Thread(target=threader)
	t.daemon = True
	t.start()
	
#for worker in range(1, 65535):
for worker in range(1, 65535):
	q.put(worker)



q.join()

#print("threads: " + str(threading.activeCount()))	
	
	
	
	
	
	
