#!/usr/bin/python
import sys
import threading
import commands
from queue import Queue

print_lock = threading.Lock()
subNet = sys.argv[1]

q = Queue()

def portscan(threadNum):
	global subNet
	cmd = "./classes/bTRzRFCqrqiVKTYh8TtQ.sh " + subNet + str(threadNum)
	try:
		result = str( commands.getstatusoutput(cmd) ) 
		resList = result.split("'")
		if resList[1] == "is up":
			with print_lock:
				print(subNet + str(threadNum))
	except:
		pass

def threader():
	while True:
		worker = q.get()
		portscan(worker)
		q.task_done()

for x in range(200):
	t = threading.Thread(target=threader)
	t.daemon = True
	t.start()
	
for worker in range(1, 255):
	q.put(worker)

q.join()

	
