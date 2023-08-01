
# coding: utf-8

# In[1]:


import pandas as pd


# In[2]:


df=pd.read_csv("uploads/test.csv")
df.head()


# In[3]:

'''
df=pd.DataFrame({'Horizontal Dilution of Precision':[9.935046],'G(x)':[0.98],'G(y)':[0.64],'G(z)':[9.68],
                 'G(calibrated)':[0.08],'Acceleration Sensor(Total)(g)':[-0.01],'Acceleration Sensor(X axis)(g)':[0.09],
                 'Acceleration Sensor(Y axis)(g)':[0.06],'Acceleration Sensor(Z axis)(g)':[0.88],
                 'Engine Load(%)':[29.41],'Engine RPM(rpm)':[901.0]})
df.head()
'''

# In[4]:


import joblib


# In[5]:


model=joblib.load("model.joblib")
le=joblib.load("label.joblib")


# In[6]:


pred=le.inverse_transform(model.predict(df))[0]
#print("Result:",pred)


# In[7]:


bad_score,good_score=model.predict_proba(df)[0]


# In[8]:


bad_score*100


# In[9]:


g=good_score*100+(25)

out=round(g,2)
print(out)

