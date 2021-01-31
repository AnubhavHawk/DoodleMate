from flask import Flask, render_template, request, redirect, session, url_for, flash
from flask_mysqldb import MySQL
from flask_cors import CORS, cross_origin


import numpy as np
from PIL import Image
import base64
import re
import io


app = Flask(__name__)

app.config['SECRET_KEY'] = 'secret_key'

# Set up the database connection
app.config['MYSQL_HOST']="localhost"
app.config['MYSQL_USER']='root'
app.config['MYSQL_PASSWORD']=''
app.config['MYSQL_DB']='doodlemate'

# Enable CORS for remote server (PHP)
app.config['CORS_HEADERS'] = 'Content-Type'
cors = CORS(app, resources={r"/": {"origins": "http://localhost:80"}})


mysql=MySQL(app)
@app.route('/img', methods=['POST', 'GET'])
@cross_origin(origin='localhost',headers=['Content- Type','Authorization'])
def get_image():
    userId = request.values['userId']
    gameCode = request.values['game_code']
    scoreColumn = request.values['scoreColumn']
    # print(userId, gameCode, scoreColumn)

    # Get image from the request
    # image_b64 = request.values['img']
    # image_data = re.sub('^data:image/.+;base64,', '', image_b64)
    # image_PIL = Image.open(io.StringIO(image_b64))
    # image_np = np.array(image_PIL)
    # print('Image received: {}'.format(image_np.shape))

    # use ML to predict the accuracy
    # 
    # 
    # 

    # Store the computed result into the database for that user and Game
    cur=mysql.connection.cursor()
    score = np.random.randint(50, 101)
    if(scoreColumn == '1'):
        oldScoreSQL = f"SELECT score1 from game WHERE game_code = '{gameCode}'"
        cur.execute(oldScoreSQL)
        oldScore = cur.fetchall()

        score += oldScore[0][0]
        sql = f"UPDATE game SET score1 = '{score}' WHERE game_code = '{gameCode}'"
        
    elif(scoreColumn == '2'):
        oldScoreSQL = f"SELECT score2 from game WHERE game_code = '{gameCode}'"
        cur.execute(oldScoreSQL)
        oldScore = cur.fetchall()
        
        score += oldScore[0][0]
        sql = f"UPDATE game SET score2 = '{score}' WHERE game_code = '{gameCode}'"

    try:
        cur.execute(sql)
        mysql.connection.commit()
        return "Score Updated"
    except:
        return "Failed to update score"


if(__name__ == '__main__'):
    app.run(debug=True)