#!/usr/bin/python
# -*- coding: utf-8 -*-
# Версия с частичной поддержкой весов

import math


      # Calculate the Haversine distance between two points. This is the method
      # the library uses to calculate the cumulative distance of GPX files. 
def Distance(t1, t2):
         RADIUS = 6371 # earth's mean radius in km
         p1=[0,0]
         p2 = [0,0]
         p1[0] = t1[0]*math.pi/180.
         p1[1] = t1[1]*math.pi/180.
         p2[0] = t2[0]*math.pi/180.
         p2[1] = t2[1]*math.pi/180.

         d_lat = (p2[0] - p1[0])
         d_lon = (p2[1] - p1[1])
         
         a = math.sin(d_lat/2) * math.sin(d_lat/2) + math.cos(p1[0]) * math.cos(p2[0]) * math.sin(d_lon/2) * math.sin(d_lon/2)
         #print a, 1-a, p1, p2
         c = 2 * math.atan2(math.sqrt(a), math.sqrt(1-a))
         d = RADIUS * c
         return d

#Distance = lambda p1, p2: math.sqrt( (p2[0] - p1[0]) ** 2 + (p2[1] - p1[1]) ** 2 )

def calcHome(Points, Percent = 0.1):
	DistanceMatrix = []
	Num = len(Points)
	Threshold = int(Num * Percent)
	MaxWeight = Points[0][2]
	for Point in Points:
		if Point[2] > MaxWeight:
			MaxWeight = Point[2]
	n1 = 0
	n2 = 0
	for Point in Points:
		Points[n1][2] = (Points[n1][2] / MaxWeight) + 0.5
		n2 = 0
		CurrentColumn = []
		while n2 < n1:
			CurrentColumn.append( Distance ( Points[n1], Points[n2] ) )
			n2 += 1
		DistanceMatrix.append ( CurrentColumn )
		n1 += 1
	PointRatings = []
	n1 = 0
	for Point in Points:
		FullColumnUnderReview = []
		FullColumnUnderReview.extend( DistanceMatrix[n1] )
		FullColumnUnderReview.append(0)
		n2 = len(FullColumnUnderReview) + 1
		while n2 < Num:
			FullColumnUnderReview.append( DistanceMatrix[n2][n1] )
			n2 += 1
		n1 += 1
		FullColumnUnderReview.sort()
		PointRatings.append( FullColumnUnderReview[Threshold] )
	n1 = 0
	MinRating = PointRatings[n1]
	CentralPoint = n1
	for Rating in PointRatings:
		if Rating < MinRating:
			MinRating = Rating
			CentralPoint = n1
		n1 += 1
	n1 = 0
	DesiredPoint = [0, 0, 0]
	while n1 < Num:
		DistanceUnderReview = 0 if (n1 == CentralPoint) else (DistanceMatrix[CentralPoint][n1] if (n1 < CentralPoint) else DistanceMatrix[n1][CentralPoint])
		if DistanceUnderReview <= MinRating:
			DesiredPoint[0] += ( Points[n1][0] * Points[n1][2] )
			DesiredPoint[1] += ( Points[n1][1] * Points[n1][2] )
			DesiredPoint[2] += Points[n1][2]
		n1 += 1
	DesiredPoint[0] /= DesiredPoint[2]
	DesiredPoint[1] /= DesiredPoint[2]
	DesiredPoint.pop()
#	print ("www.openstreetmap.org/?mlat=" + str(DesiredPoint[0]) + "&mlon=" + str(DesiredPoint[1]) + "&zoom=17")
	return DesiredPoint
