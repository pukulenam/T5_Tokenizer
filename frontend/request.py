import requests

url = 'http://catfeeder.gabrielkheisa.xyz/posting.php'

params = dict(
    api_key='8c51ece6',
    device_status='0'
)

resp = requests.get(url=url, params=params)

# hasil di http://catfeeder.gabrielkheisa.xyz/viewing.php