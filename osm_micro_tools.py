# -*- coding: utf-8 -*-
import urllib

 



def objN(objType):
   if objType == "user":
    return 1
   elif objType == "way":
    return 3
   elif objType == "node":
    return 2
   else:
    return 5
def objT(objType):
   if objType == 3:
    return "way"
   if objType == 2:
    return "node"
   if objType == 5:
    return "relation"

def linkWay (WayID):
  return "<a href=http://openstreetmap.org/browse/way/%s>%s</a>" % (WayID,WayID)
def linkBbox (bbox, box = "yes", text = "bbox"):
  return "<a href=http://openstreetmap.org/?minlat=%s&minlon=%s&maxlat=%s&maxlon=%s&box=%s>%s</a>"%(bbox + (box,text))
def linkBboxMarker (bbox, marker):
  a1,a2,a3,a4 = bbox
  a5,a6 = marker
  return "<a href=http://openstreetmap.org/?minlat=%s&minlon=%s&maxlat=%s&maxlon=%s&mlat=%s&mlon=%s&box=yes>bbox</a>"%(a1,a2,a3,a4,a5,a6)
def linkMarker (lat, lon, name):
  return "<a href='http://openstreetmap.org/?lat=%s&lon=%s&zoom=15'>%s</a>"%(lat,lon,name)
def linkWayMap (WayID):
  return "<a href=http://openstreetmap.org/?way=%s>%s</a>" % (WayID,WayID)

def linkNode (NodeID):
  return "<a href=http://openstreetmap.org/browse/node/%s>%s</a>" % (NodeID,NodeID)

def linkUser (UserID):
  return '<a href=http://openstreetmap.org/user/%s>%s</a>' % (urllib.urlencode([("",UserID)])[1:].replace("+","%20"),UserID)

def linkRelation (ID):
  return "<a href=http://openstreetmap.org/browse/relation/%s>%s</a>" % (ID,ID)

def linkRelationIcon (ID):
  return "<a href=http://openstreetmap.org/browse/relation/%s><img border=0 src=http://wiki.openstreetmap.org/images/5/59/Relation.png width=20 height=20></a>" % (ID)