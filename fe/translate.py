#!/usr/bin/env python
import os
import json
os.environ["GOOGLE_APPLICATION_CREDENTIALS"] = "/home/gabriel/t5tokenizer-25d8df0d690b.json" 

# operation final
import mysql.connector


import time

mydb = mysql.connector.connect(
  host="catfeeder.gabrielkheisa.xyz",
  user="t5tokenizer",
  password="t5tokenizer",
  database="t5tokenizer"
)

def translate_text(target, text):
    """Translates text into the target language.

    Target must be an ISO 639-1 language code.
    See https://g.co/cloud/translate/v2/translate-reference#supported_languages
    """
    import six
    from google.cloud import translate_v2 as translate

    translate_client = translate.Client()

    if isinstance(text, six.binary_type):
        text = text.decode("utf-8")

    # Text can also be a sequence of strings, in which case this method
    # will return a sequence of results for each text.
    result = translate_client.translate(text, target_language=target)

    #print(u"Text: {}".format(result["input"]))
    #print(u"Translation: {}".format(result["translatedText"]))
    return result["translatedText"]
    #print(u"Detected source language: {}".format(result["detectedSourceLanguage"]))

def checkindo():
  mycursor = mydb.cursor()
  sql = "SELECT * FROM translate WHERE indonesia = '' "

  mycursor.execute(sql)

  myresult = mycursor.fetchall()

  if not myresult:
    print("No problem")
    return

  for x in myresult:
    user_empty = x[1]
    text = x[3] # Fetch from English
    if (len(user_empty)) <= 2: 
      print("Ok")
      return
    else:
      print("User " + user_empty + " kosong, terjemahkan " + text)
      sql = "UPDATE translate SET indonesia = \'"+ translate_text("id",str(text)) +"\' WHERE user_sesid = \'" + str(user_empty)  +"\'"
      mycursor.execute(sql)
      myresult = mycursor.fetchall()
      mydb.commit()
      return

def checkenglish():
  mycursor = mydb.cursor()

  sql = "SELECT * FROM translate WHERE english = '' "

  mycursor.execute(sql)

  myresult = mycursor.fetchall()

  if not myresult:
    print("No problem")
    return

  for x in myresult:
    user_empty = x[1]
    text = x[2] # Fetch from Indonesia
    print(x)
    if (len(user_empty)) <= 2: 
      print("Ok")
      return
    else:
      print("User " + user_empty + " kosong, terjemahkan " + text)
      sql = "UPDATE translate SET english = \'"+ translate_text("en",str(text)) +"\' WHERE user_sesid = \'" + str(user_empty)  +"\'"
      mycursor.execute(sql)
      myresult = mycursor.fetchall()
      mydb.commit()
      return



while(1):
  mydb = mysql.connector.connect(
  host="catfeeder.gabrielkheisa.xyz",
  user="t5tokenizer",
  password="t5tokenizer",
  database="t5tokenizer"
  )
  checkindo()
  checkenglish()
  time.sleep(1)


# translate_text("en",text)

