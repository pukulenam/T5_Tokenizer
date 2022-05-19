# Hide all debugging logs from tensorflow
import os
os.environ["TF_CPP_MIN_LOG_LEVEL"] = "2"

from transformers import AutoTokenizer, AutoModelForSeq2SeqLM
import re
import json
import sys
import base64

x = json.loads(base64.b64decode(sys.argv[1]))
news = x[':news']

tokenizer = AutoTokenizer.from_pretrained("assamim/t5-small-pukulenam-summarization")
model = AutoModelForSeq2SeqLM.from_pretrained("assamim/t5-small-pukulenam-summarization", from_tf=True)


WHITESPACE_HANDLER = lambda k: re.sub('\s+', ' ', re.sub('\n+', ' ', k.strip()))

input_ids = tokenizer(
    [WHITESPACE_HANDLER(news)],
    return_tensors="pt",
    padding="max_length",
    truncation=True,
    max_length=512
)["input_ids"]

output_ids = model.generate(
    input_ids=input_ids,
    max_length=84,
    no_repeat_ngram_size=2,
    num_beams=4
)[0]

summary = tokenizer.decode(
    output_ids,
    skip_special_tokens=True,
    clean_up_tokenization_spaces=False
)

print(summary)
