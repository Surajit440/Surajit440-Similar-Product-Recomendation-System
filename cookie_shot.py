from collections import Counter
import sys
import numpy as np
import pickle

def element_lengths(array):
    length_list = []
    for element in array:
        length_list.append(len(element))
    return length_list


def recommend(product):
    try:
        index = np.where(df_final.index == product)[0][0]
        si = sorted(list(enumerate(similar_products[index])), key=lambda x: x[1], reverse=True)[0:9]
        for i in si:
            print(df_final.index[i[0]]+',')

    except IndexError:
        print("Product '{product}' not found in recommendations.")

similar_products = pickle.load(open('similar_products.pkl', 'rb'))
with open('df_final.pkl', 'rb') as f:
    df_final = pickle.load(f)

arg1 = sys.argv[1]  # Remove space concatenation if not needed
#arg1 = arg1[1:-1]
array = arg1.split(',')
element_frequencies = Counter(word for word in array)
most_frequent = element_frequencies.most_common(1)[0][0]
#second_frequent = element_frequencies.most_common(2)[1][0]
#third_frequent = element_frequencies.most_common(3)[2][0]

#print (element_frequencies)
#print(element_lengths(array))
recommend(most_frequent)
