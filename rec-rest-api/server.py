from flask import Flask,request
from flask_restful import Resource, Api
from rec_item import authors_recommendations

app = Flask(__name__)
api = Api(app)

class RecommendItem(Resource):
    def get(self):
	    request_title = request.args.get('title', default = 1, type = str)
	    #request_title = request.form['title']
	    return authors_recommendations(request_title)

class RecommendTaste(Resource): #TODO: get taste
    def get(self):
        return {
            'hello': 'fu'
        }

api.add_resource(RecommendItem, '/recitem')
api.add_resource(RecommendTaste, '/rectaste')

if __name__ == '__main__':
    app.run(debug = True)