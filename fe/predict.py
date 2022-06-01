# Hide all debugging logs from tensorflow
import os
os.environ["TF_CPP_MIN_LOG_LEVEL"] = "2"

from transformers import AutoTokenizer, TFAutoModelForSeq2SeqLM
import re
import json
import sys
import base64

x = json.loads(base64.b64decode(sys.argv[1]))
news = x[':news']

tokenizer = AutoTokenizer.from_pretrained("./model/mt5_small_text_summarization")
model = AutoModelForSeq2SeqLM.from_pretrained("./model/mt5_small_text_summarization", from_tf=True)

# Regex for news
WHITESPACE_HANDLER = lambda k: re.sub('\s+', ' ', re.sub('\n+', ' ', k.strip()))

# ---------- 001 ----------

# input_ids = tokenizer(
#     [WHITESPACE_HANDLER(news4)],
#     return_tensors="pt",
#     padding="max_length",
#     truncation=True,
#     max_length=512
# )["input_ids"]

# output_ids = model.generate(
#     input_ids=input_ids,
#     max_length=50,
#     no_repeat_ngram_size=2,
#     num_beams=5
# )[0]

# summary = tokenizer.decode(
#     output_ids,
#     skip_special_tokens=True,
#     clean_up_tokenization_spaces=False
# )

# print(summary)

# ---------- 002 ----------

input_ids = tokenizer.encode(WHITESPACE_HANDLER(news1), return_tensors='pt')
summary_ids = model.generate(input_ids,
            min_length=20,
            max_length=200,
            num_beams=7,
            repetition_penalty=2.5,
            length_penalty=1.0,
            early_stopping=True,
            no_repeat_ngram_size=2,
            use_cache=True,
            do_sample = True,
            temperature = 0.8,
            top_k = 50,
            top_p = 0.95)

summary_text = tokenizer.decode(summary_ids[0], skip_special_tokens=True)
print(summary_text)
