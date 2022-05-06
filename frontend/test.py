#!/usr/bin/env python3
import requests
import json
import sys
import base64

data = json.loads(base64.b64decode(sys.argv[1]))

news = data[':news']

API_URL = "https://api-inference.huggingface.co/models/csebuetnlp/mT5_multilingual_XLSum"
headers = {"Authorization": f"Bearer {'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'}"}

def query(payload):
	response = requests.post(API_URL, headers=headers, json=payload)
	return response.json()
	
output = query({
	"inputs" : ' '.join(news)
})

print(output[0]['summary_text'])
