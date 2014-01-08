#!/usr/bin/python
# Ngerodi 0.0.1
# Putu Wiramaswara Widya <initrunlevel0@gmail.com>

import MySQLdb
import os
import time

# Do checking database

while True:
	db = MySQLdb.connect("127.0.0.1", "root", "root", "ngerodi")
	cursor = db.cursor(MySQLdb.cursors.DictCursor)
	
	# Fetch unprocessed data
	cursor.execute("SELECT * FROM data WHERE terproses='0'");
	data = cursor.fetchall();
	for row in data:
		# Get variable
		id = row['id']
		print "Running program id=" + str(id)
		prosesor = row['prosesor']
		# Check if file exist
		while(os.path.isfile("uploads/" + str(id) + ".c") == False and os.path.isfile("uploads/" + str(id) + ".tc") == False):
			pass

		# Compile the program
		os.system("mpicc -o uploads/" + str(id) + ".bin uploads/" + str(id) + ".c")
		
		# Run the testcase
		os.system("mpirun -n " + str(prosesor) + " uploads/" + str(id) + ".bin < uploads/" + str(id) + ".tc > uploads/" + str(id) + ".result")
		print "Executed program id=" + str(id)
		# Set terproses
		cursor.execute("UPDATE data SET terproses=1, status=1 WHERE id='" + str(id) + "'")
		db.commit()
	db.close()
