# -*- coding: utf-8 -*-

# Data processing
import pandas as pd
import numpy as np
import scipy.stats
import os

# Visualization
import seaborn as sns

# Similarity
from sklearn.metrics.pairwise import cosine_similarity

os.chdir('D:\\Project\\Alato\\storage\\app\\public\\docs')

ratings = pd.read_csv('ratings.csv')
workouts = pd.read_csv('workout.csv')


# Merge ratings and workouts datasets
df = pd.merge(ratings, workouts, on='workoutId', how='inner')

# Aggregate by workout
agg_ratings = df.groupby('title').agg(mean_rating=('rating', 'mean'),
                                      number_of_ratings=('rating', 'count')).reset_index()

# Keep the movie with over 100 ratings
agg_ratings_GT100 = agg_ratings[agg_ratings['number_of_ratings'] >= 1]

# Merge data
df_GT100 = pd.merge(df, agg_ratings_GT100[['title']], on='title', how='inner')

# Create user-item matrix
matrix = df_GT100.pivot_table(index='userId', columns='title', values='rating')

# Normalize user-item matrix
matrix_norm = matrix.subtract(matrix.mean(axis=1), axis = 'rows')
matrix_norm.index = matrix_norm.index.astype(int)
# Item similarity matrix using Pearson Correlation
user_similarity = matrix_norm.T.corr()
# Item similarity matrix using Cosine Similarity
user_similarity_cosine = cosine_similarity(matrix_norm.fillna(0))

import os

# Get the user ID from the environment variable
user_id = int(os.environ.get('USER_ID', 0))

# Get the number of recommendations from the environment variable
num_recommendations = int(os.environ.get('NUM_RECOMMENDATIONS', 3))

# Pick a user ID
picked_userid = user_id

# Remove picked user ID from the candidate list
user_similarity.drop(index=picked_userid, inplace=True)

# Number of similar users
n = 10

# User similarity threashold
user_similarity_threshold = 0.3

# Get top n similar users
similar_users = user_similarity.loc[user_similarity[picked_userid]>user_similarity_threshold][picked_userid].sort_values(ascending=False)[:n]

print(f'The similar users for user {picked_userid} are', similar_users)

# Workouts that the target user has watched
picked_userid_watched = matrix_norm[matrix_norm.index == picked_userid].dropna(axis=1, how='all')

# Workouts that similar users watched. Remove Workouts that none of the similar users have watched
similar_user_workouts = matrix_norm[matrix_norm.index.isin(similar_users.index)].dropna(axis=1, how='all')

# Remove the watched Workout from the movie list
similar_user_workouts.drop(picked_userid_watched.columns,axis=1, inplace=True, errors='ignore')


# A dictionary to store item scores
item_score = {}

# Loop through items
for i in similar_user_workouts.columns:
  # Get the ratings for Workout i
  workout_rating = similar_user_workouts[i]
  # Create a variable to store the score
  total = 0
  # Create a variable to store the number of scores
  count = 0
  # Loop through similar users
  for u in similar_users.index:
    # If the Workout has rating
    if pd.isna(workout_rating[u]) == False:
      # Score is the sum of user similarity score multiply by the Workout rating
      score = similar_users[u] * workout_rating[u]
      # Add the score to the total score for the Workout so far
      total += score
      # Add 1 to the count
      count +=1
  # Get the average score for the item
  item_score[i] = total / count

# Convert dictionary to pandas dataframe
item_score = pd.DataFrame(item_score.items(), columns=['workout', 'workout_score'])

# Sort the Workouts by score
ranked_item_score = item_score.sort_values(by='workout_score', ascending=False)

# Select top m Workouts
m = num_recommendations
row = ranked_item_score.head(m)





#     ranked_item_score = [
#     {
#         "title": str(title),
#         "id": str(workouts.loc[workouts['title'] == title, 'workoutId'].values[0]),
#         "rating": "null" if pd.isna(rating) else str(rating)
#     }
#     for title, rating in rating_prediction.items()
# ]

# import json
import json
recommended_workouts = row.to_dict('records')
# Convert the recommended_workout list to a JSON string
recommended_workout_json = json.dumps(recommended_workouts)

# Print the JSON string for debugging
print(recommended_workout_json)

