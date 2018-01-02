'''
Usage:
pip install Flask (or pip3 if you are using python 3)
FLASK_APP=app.py flask run
Running on http://localhost:5000/
'''
from flask import Flask
app = Flask(__name__)

@app.route("/")
def hello():
    return """
Hello Natue
"""
