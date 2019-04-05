import numpy as np 
import pandas as pd 

from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.metrics.pairwise import linear_kernel

def authors_recommendations(title):
	books = pd.read_csv('books.csv', encoding = "ISO-8859-1")
	ratings = pd.read_csv('ratings.csv', encoding = "ISO-8859-1")
	tf = TfidfVectorizer(analyzer='word',ngram_range=(1, 2),min_df=0, stop_words='english')
	tfidf_matrix = tf.fit_transform(books['authors'])
	cosine_sim = linear_kernel(tfidf_matrix, tfidf_matrix)
	titles = books['title']
	indices = pd.Series(books.index, index=books['title'])
	idx = indices[title]
	sim_scores = list(enumerate(cosine_sim[idx]))
	sim_scores = sorted(sim_scores, key=lambda x: x[1], reverse=True)
	sim_scores = sim_scores[1:21]
	book_indices = [i[0] for i in sim_scores]
	frame = titles.iloc[book_indices].to_frame()
	return frame.to_dict("index")