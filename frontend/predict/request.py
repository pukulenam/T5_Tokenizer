import requests
import json

import json
with open('../json/parse.json') as f:
    data = json.load(f)

API_URL = "https://api-inference.huggingface.co/models/csebuetnlp/mT5_multilingual_XLSum"
headers = {"Authorization": f"Bearer {'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'}"}

def query(payload):
	response = requests.post(API_URL, headers=headers, json=payload)
	return response.json()
	
output = query({
	"inputs": data['input-text'],
})

print(output)

a_dict = {'summarize': 'Intinya... ' + output[0]['summary_text']}

data.update(a_dict)

with open('../json/parse.json', 'w') as f:
    json.dump(data, f)
