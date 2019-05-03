**NumberGenerator RestAPI**

List of methods:

*generate()* - generates a number, returns the value of a number and its unique id in JSON format.

Usage example: http://127.0.0.1:8000/generate

Response example: 

![alt text](https://i.ibb.co/JHK3snT/generate.png)

*retrieve(id)* - takes as parameter a number's id, returns the value of the found number  in JSON format.

Usage example: http://127.0.0.1:8000/retrieve/18

Response example: 

![alt text](https://i.ibb.co/yB7KJGM/retrieve.png)
