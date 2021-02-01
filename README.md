# DoodleMate
A web application where you can communicate with your friends over a video call and doodle images. The one who draws a better doodle, gets higher score.
### [Watch demo](https://youtu.be/m41Id4gLbWQ)

<hr/>

## To Run the Application

1. Download or clone this repo
2. Create a MySQL database with name "doodlemate" and import the .sql file (doodlemate.sql) provided in the 'database' directory
3. Open root directory (www in WAMP, htdocs in XAMP) and paste all the files provided in the 'php Backend' directory inside a folder (name it as doodlemate).
4. Inside the includes folder (php Backend/includes) modify the db_connection.php file according to your database.
5. Go to Agora.io to get the: create App Id, channel name and temporary token (valid only for 24hours)
6. Open the file script.js (php backend/scripts/script.js) and Enter your token (generated on Agora.io) and channel name on line 35. client.join('<Your temporary token>', '<Your Channel Name>',....). Also enter your App Id on line 32.
- Now configure the Flask application.
1. Open the file 'img_handle.py' (inside folder 'Python Flask Backend')
2. Install the required modules using pip (Flask, numpy, PIL, etc.)
3. Configure the database credentials (for that MySQL database). Change the username and password given on line 19, 20.
4. Run the img_handle.py using python

- Now go to your browser and open localhost/doodlemate (or whatever you have named it in your root directory of PHP server)
