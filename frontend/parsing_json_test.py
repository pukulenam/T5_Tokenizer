import json

# Specify the json file path first !
path = var

# Adding new json dict
add_sum = {'Summerize': 'Lorem'}

# open json file
with open(path) as f:
    data = json.load(f)

# update json file
data.update(add_sum)

# write it
with open(path, 'w') as f:
    json.dump(data, f)