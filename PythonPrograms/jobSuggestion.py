import pandas as pd
import numpy as np
from sklearn import svm
import json
import sys

arrayofValues=[]

sys.argv.pop(0);
for eachArg in sys.argv:
    arrayofValues.append(int(eachArg))

df =pd.read_csv("P:\Git\EduPath\PythonPrograms\jobsuggestions.csv")

feature_names  = ["Mathematics","Sciences","Languages","Arts","Physical Education","Social Studies","History","Practical Experience"]
prediction_name = ["Job"]

x = df[feature_names].values
y = df[prediction_name].values.ravel()

clf = svm.SVC(kernel='poly',degree=8)
clf.fit(x, y)
it=clf.predict([arrayofValues])
#print(it)
print(json.dumps(it[0]))
