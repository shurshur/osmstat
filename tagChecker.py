# -*- coding: utf-8 -*-
allTags = {
  'name':(''),
  'addr:housenumber':(''),
  'name':(''),
  'name:ru':(''),
  'source':(''), 
  'created_by':(''),
  'address':(''),
  'address:a6':(''),
  'addr:street':(''),
  'address:a2':(''),
  'addr:postcode':(''),
  'cladr:code':(''),
  'cladr:name':(''),
  'name:en':(''),
  'int_name':(''),
  'alt_name':(''),

}


def TagIsAllowed (tag):
 if tag in allTags: 
   return 1
 else:
   return 0
   
