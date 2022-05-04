import requests
import json

import sys

# Spasi di shell kan bikin jadi individual value, ini gw bikin jadi array biar bisa diambil semua valuenya make [1:]
# semua index >= 1 jadiin array
x = sys.argv[1:]

API_URL = "https://api-inference.huggingface.co/models/csebuetnlp/mT5_multilingual_XLSum"
headers = {"Authorization": f"Bearer {'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'}"}

def query(payload):
	response = requests.post(API_URL, headers=headers, json=payload)
	return response.json()

# Join dibawah buat gabungin value dari array tadi yang kepisah pisah jadi 1 kalimat utuh buat request ke api
output = query({
	"inputs" : ' '.join(x)
})

# cuma print summary_text doang
print(output[0]['summary_text'])
