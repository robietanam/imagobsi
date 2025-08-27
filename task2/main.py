_TEST = [
    {
        "id" : 1, "name": "Alice", "category": "A", "sub_category" : "X"
    },
    {
        "id" : 1, "name": "Alice", "category": "B", "sub_category" : "X"
    },
    {
        "id" : 1, "name": "Alice", "category": "C", "sub_category" : "X"
    }
]

from flask import Flask, request
from typing import List

app = Flask(__name__)


@app.route('/', methods=["POST"])
def index():
    if request.is_json:
            data = request.json
            
            return parser(data)
    else:
        return "Data is not in JSON"

def parser(array : List):
    result = {}
    for _arr in array:
        res = {}
        res[_arr['sub_category']] =  [
                {
                    "id":  _arr['id'], "name": _arr['name'],}
                ]
            
        
        result[_arr['category']] = res

    return result



if __name__ == '__main__':
    app.run(debug=True) # debug=True enables debug mode for development
    # parser(_TEST)