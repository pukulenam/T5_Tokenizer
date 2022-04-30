import pycurl
import time
from io import BytesIO 


while(True):
  b_obj = BytesIO() 
  crl = pycurl.Curl() 

  # Set URL value
  crl.setopt(crl.URL, 'https://catfeeder.gabrielkheisa.xyz/viewingraw.php')

  # Write bytes that are utf-8 encoded
  crl.setopt(crl.WRITEDATA, b_obj)

  # Perform a file transfer 
  crl.perform() 

  # End curl session
  crl.close()

  # Get the content stored in the BytesIO object (in byte characters) 
  get_body = b_obj.getvalue()

  # Decode the bytes stored in get_body to HTML and print the result 
  print(get_body.decode('utf8')) 
  time.sleep(1)