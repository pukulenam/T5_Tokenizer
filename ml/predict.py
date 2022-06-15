# Hide all debugging logs from tensorflow
import os
os.environ["TF_CPP_MIN_LOG_LEVEL"] = "2"

from transformers import AutoTokenizer, AutoModelForSeq2SeqLM
from transformers import logging as hf_logging
import re
import json
import sys
import base64

x = json.loads(base64.b64decode(sys.argv[1]))
news = x[':news']
early_stopping = True if x[':early_stopping'] == 1 else False


# Dissable hf debuging info
hf_logging.set_verbosity_error()

tokenizer = AutoTokenizer.from_pretrained("assamim/t5-small-english")
model = AutoModelForSeq2SeqLM.from_pretrained("assamim/t5-small-english", from_tf=True)

# Regex for news
WHITESPACE_HANDLER = lambda k: re.sub('\s+', ' ', re.sub('\n+', ' ', k.strip()))
input_ids = tokenizer.encode(WHITESPACE_HANDLER(news), return_tensors='pt')
summary_ids = model.generate(input_ids,
            min_length=20,
            max_length=x[':max_length'],
            num_beams=x[':num_beam'],
            repetition_penalty=float(x[':repetition_penalty']),
            length_penalty=1.0,
            early_stopping=early_stopping,
            no_repeat_ngram_size=2,
            use_cache=True,
            do_sample = True,
            temperature = 0.8,
            top_k = 50,
            top_p = 0.95)
summary_text = tokenizer.decode(summary_ids[0], skip_special_tokens=True)
print(summary_text)
