import requests
import json

import sys
x = sys.argv[1:]
API_URL = "https://api-inference.huggingface.co/models/csebuetnlp/mT5_multilingual_XLSum"
headers = {"Authorization": f"Bearer {'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'}"}

def query(payload):
	response = requests.post(API_URL, headers=headers, json=payload)
	return response.json()
	
output = query({
	"inputs" : ' '.join(x)
})

print(output[0]['summary_text'])
